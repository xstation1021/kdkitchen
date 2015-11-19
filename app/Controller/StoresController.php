<?php

App::uses('AppController', 'Controller');

class StoresController extends AppController {

    var $uses = array('Item', 'Store');
    
    public $name = 'Stores';
    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Store.id' => 'desc',
        ),
        'conditions' => array(
            'Store.is_private' => 0,
            'Store.is_active' => 1
        )
    );


    function index() {
        $this->Store->recursive = 2;
        
        $this->Store->bindModel(array(
            'hasMany'=>array(
                'Item'=>array(
                    'className' => 'Item',
                    'limit'=>1,
                )
            )
        ));

        $data['Store'] = $this->paginate('Store');
        $data['title'] = 'All Stores'; 
        $this->set('data', $data);
    }

    function login($id_or_hash) {

        if($this->request->is('Post')) {
            $store = $this->getStoreData($id_or_hash);
            if($this->Store->auth($store['Store']['id'], $this->data['Store']['password'])) {
                $this->Session->write('Store.id', $store['Store']['id']);
                $this->Session->write('Store.hash', $id_or_hash);
                $this->Session->setFlash('Logged into store.', 'default', array('class'=>'message success'));
                $this->redirect('/stores/view/'.$id_or_hash);
                exit;
            }
        }
    }

    private function __isStoreManager() {
        if($this->data['Store']['user_id'] == $this->_logged_user['id'] || $this->Session->read('Store.id')) {
            return True;
        }
        return False;
    }

    function view($id_or_hash) {

        if(is_numeric($id_or_hash)) {
            $conditions = array('Store.id'=>$id_or_hash);
            $this->Store->recursive = 2;
            $this->data = $this->Store->find('first', array('conditions' => $conditions));
            if(isset($this->data['Store']['is_private']) && ($this->data['Store']['is_private'] == 1)) {
                throw new NotFoundException();
            }
        } else {
            $store_hash = $id_or_hash;
            $conditions = array('Store.store_hash'=>$store_hash);
            $this->Store->recursive = 2;
            $this->data = $this->Store->find('first', array('conditions' => $conditions));
        }

        if(!$this->data) {
            throw new NotFoundException();
        }

        $this->Item->recursive = 2;
        
        $this->Item->bindModel(array(
            'belongsTo'=>array(
                'Store'=>array(
                    'className' => 'Store',
                )
            )
        ));
        $this->paginate = array('Item' => array(
                'limit'=>10, 
                'conditions'=>array(
                    'Item.store_id'=>$this->data['Store']['id']
                )
            )
        );
        $data['is_store_manager'] = $this->__isStoreManager();
        $data['Item'] = $this->paginate('Item');
        $data['enable_add'] = True;
        $data['title'] = 'Store';
        $this->set('data', $data);
    } 
    
    function add() {
        if($this->request->is('Post')) {
            $store_data = $this->data;
            if($this->_logged_user) {
                $store_data['Store']['user_id'] = $this->_logged_user['id'];
            }

            if($saved = $this->Store->save($store_data)) {
                $this->Session->write('Store.id', $saved['Store']['id']);
                $this->Session->write('Store.hash', $saved['Store']['store_hash']);
                $this->Session->setFlash('Please add items.', 'default', array('class'=>'message success'));
                $this->redirect('/stores/view/'.$saved['Store']['store_hash']);
                exit;
            }
        } 
        $this->set('title', 'Create Store');
    } 

    function edit($id_or_hash) {

        $this->data = $this->getStoreData($id_or_hash);
        $data['is_store_manager'] = $this->__isStoreManager();

        if(!$this->Session->read('Store.id') ) {
            if($this->data['Store']['user_id'] != $this->_logged_user['id']) {
                $this->Session->setFlash('Session expired.', 'default', array('class'=>'message error'));
                $this->redirect('/stores/login/'.$id_or_hash);
                exit;
            }
        }

        if($this->request->is('Post')) {
            $this->Store->id = $id_or_hash;

            $this->Session->setFlash('Failed to Save.', 'default', array('class'=>'message error'));
            if($this->Store->save($this->data)) {
                $this->Session->setFlash('Successfully Saved.', 'default', array('class'=>'message success'));
            }
            $this->redirect($this->referer());
            exit;
        }
        $this->set('title', 'Edit Store');
        $this->set('data', $data);
    }

    function manage() {
        $this->Store->recursive = 2;
        
        $this->Store->bindModel(array(
            'hasMany'=>array(
                'Item'=>array(
                    'className' => 'Item',
                    'limit'=>1,
                )
            )
        ));

        $this->paginate['conditions'] = array(
            'user_id'=>$this->_logged_user['id'],
        );

        $data['Store'] = $this->paginate('Store');
        $data['title'] = 'My Stores'; 
        $this->set('data', $data);
    }
}
