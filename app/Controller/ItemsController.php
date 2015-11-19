<?php

App::uses('AppController', 'Controller');

class ItemsController extends AppController {

    public $actsAs = array('Uploader.Attachment');
    var $uses = array('Attachment', 'Item', 'Store', 'Comment', 'Email', 'Message');

	public $name = 'Items';

    public $paginate = array(
        'limit' => 9,
        'order' => array(
            'Item.id' => 'desc'
        )
    );

    function index() {
        
        $this->Item->recursive = 2;
        
        $this->Item->bindModel(array(
            'belongsTo'=>array(
                'Store'=>array(
                    'className' => 'Store',
                )
            )
        ));
        $data['Item'] = $this->paginate('Item');
        $data['title'] = 'All Items';

        $this->set('data', $data);
    }

    function add($store_hash) {

        $conditions = array('Store.store_hash'=>$store_hash);
        $store = $this->Store->find('first', array('conditions' => $conditions));
        if(!$store) {
            throw new NotFoundException();
        }

        if(!$this->Session->read('Store.id')) {
            if($store['Store']['user_id'] != $this->_logged_user['id']) {
                $this->Session->setFlash('Session expired.', 'default', array('class'=>'message error'));
                $this->redirect('/stores/login/'.$store_hash);
                exit;
            }
        }
        if($this->request->is('Post')) {

            $data = $this->data;
            $data['Item']['store_id'] = $store['Store']['id'];
            if($this->Item->save($data)) {
                $this->Store->id = $store['Store']['id'];
                $item_count = $this->Store->field('item_count');
                $this->Store->saveField('item_count', $item_count+1);
                $this->Attachment->data = $this->data;
                $this->Attachment->saveAttachment($store_hash, $this->Item->getLastInsertId());
                $this->Session->setFlash('Item created.', 'default', array('class'=>'message success'));
                $this->redirect('/stores/view/'.$store_hash);
                exit;
            }
            $this->Session->setFlash('Failed to create item.', 'default', array('class'=>'message error'));
        }
        $this->set('title', 'Add Item');
    } 

    function __checkStorePrivilage($store, $store_hash) {
        if($store['Store']['is_private']) {
            if($store_hash != $store['Store']['store_hash']) {
                $this->Session->setFlash('The item does not exit.', 'default', array('class'=>'message notice'));
                $this->redirect($this->referer());
            }
        }
    }

    function edit($id, $store_hash=Null) {
        if($this->request->is('Put') || $this->request->is('Post')) {

            $this->Item->recursive = 1;
            $this->Item->id = $id;
            $item = $this->Item->read();
    
            // Handle deleted attachments.
            $existing_item_id_list = $this->Attachment->getFileIdListByItemId($id);
            $attachments_to_keep = array();
            if(isset($this->data['Attachment']['keep'])) {
                $attachments_to_keep = $this->data['Attachment']['keep'];
            }
            $attachments_to_del = array_diff($existing_item_id_list, $attachments_to_keep);
            foreach($attachments_to_del as $attachment_id) {
                $this->Attachment->id = $attachment_id;
                $this->Attachment->delete();
            }

            // Save new attachments.
            $data = $this->data;
            $data['Attachment']['item_id'] = $id;
            $data['Attachment']['store_hash'] = $item['Store']['store_hash'];
            $this->Attachment->data = $data;
            $this->Attachment->saveAttachment($data['Attachment']['store_hash'], $id);

            // Save item data.
            if($this->Item->save($this->data)) {
                $this->Session->setFlash('Item edited.', 'default', array('class'=>'message success'));
                $this->redirect($this->referer());
            }
        }

        $this->Item->recursive = 1;
        $this->Item->id = $id;
        $this->data = $this->Item->read();
        $this->__checkstoreprivilage($this->data, $store_hash);

        $this->set('title', 'Edit Item');
    } 

    function buy() {
        try {
            if($this->request->is('post')) {
                
                $store = $this->Store->findByStoreHash($this->data['Item']['store_hash']); 
                if(!$store) {
                    throw new Exception('Invalid store hash.');
                }
                $this->Item->id = $this->data['Item']['id'];
                $item_is_active = $this->Item->field('is_active');
                if(!$item_is_active) {
                    throw new Exception('Item is sold out.');
                }

                if(!Validation::email($this->data['Item'][$this->_imap['email']])) {
                    $this->Item->invalidate($this->_imap['email'], __('Invalid email.'));
                }
                if(!Validation::notEmpty($this->data['Item']['message'])) {
                    $this->Item->invalidate('message', __('Cannot be left empty.'));
                }
                if($this->Item->validates()) {
                    if($this->Item->Save($this->data)) {
                        $this->Session->setFlash('Item purchased.', 'default', array('class'=>'message success'));

                        $message = array(
                            'Message' => array(
                                'store_id' => $store['Store']['id'],
                                'item_id' => $this->Item->id,
                                'sender_email' => $this->data['Item'][$this->_imap['email']],
                                'receiver_email' => $store['Store']['email'],
                                'body' => $this->data['Item']['message']
                             )
                         );

                        if($this->_logged_user) {
                            $message['Message']['sender_id'] = $this->_logged_user['id'];
                            $message['Message']['sender_email'] = $this->_logged_user['email'];
                        }

                        if(isset($store['Store']['user_id'])) {
                            $message['Message']['receiver_id'] = $store['Store']['user_id'];
                        }

                        if($this->Message->save($message)) {
                            $subject = 'Someone bought your item';
                            $this->Email->send($message['Message']['sender_email'], $store['Store']['email'], $subject, $this->data['Item']['message']);
                        }
                    }
                }

                $this->_processIframeForm($this->Item->validationErrors, $this->data, $this->referer());
            }
        } catch(Exception $e) {
            $this->Session->setFlash($e->getMessage(), 'default', array('class'=>'message error'));
            $this->redirect($this->referer());
            exit;
        }
    }

    function view($id, $store_hash=Null) {
        // TODO Change to containable.
        $this->Item->recursive = 1;

        $this->Item->id = $id;
        $this->data = $this->Item->read();
        $this->__checkStorePrivilage($this->data, $store_hash);

        $this->data = $this->__nest_comments($this->data);
    }

    //TODO move to comment model?
    private function __nest_comments($data) {
        $tmp = array();
        $child_to_parent_map = array();
        if(isset($data['Comment'])) {
            foreach($data['Comment'] as $comment) {
                if(!isset($comment['parent_id'])) {
                    $tmp[$comment['id']] = $comment;
                    $tmp[$comment['id']]['children'] = array();
                } else {
                    if(isset($child_to_parent_map[$comment['parent_id']])) {
                        $child_to_parent_map[$comment['id']] = $child_to_parent_map[$comment['parent_id']];
                    } else {
                        $child_to_parent_map[$comment['id']] = $comment['parent_id'];
                    }
                    
                    array_push($tmp[$child_to_parent_map[$comment['id']]]['children'], $comment);
                }
            }
        }
        $data['Comment'] = $tmp;
        return $data;
    }
}
