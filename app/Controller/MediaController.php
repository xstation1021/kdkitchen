<?php

App::uses('AppController', 'Controller');

class MediaController extends AppController {

    public $actsAs = array('Uploader.Attachment');
    var $uses = array('Media');
    
    public $name = 'Media';

    public $paginate = array(
        'recursive'=>-1,
        'order' => array(
            'Media.created' => 'desc'
        ),
        'conditions'=>array('UserPage.is_public'=>1),
        'limit' => 25,
    );


    function index() {
        $this->_auth();    

        $this->data = $this->Media->find('all');
    }


    function add() {
        $this->_auth();    

        if($this->request->is('Post')) {
            $this->Media->data = $this->data;
            if($saved = $this->Media->saveMedia()) {
                
                $this->Session->setFlash('Successfully saved media.', 'default', array('class'=>'message success'));
                $this->redirect(array('action'=>'index'));
                exit;
            } else {
                $this->Session->setFlash('Error saving media.', 'default', array('class'=>'message error'));
            }
            $this->redirect($this->referer());
            exit;
        } 
    }


    function delete($id) {
        $this->_auth();    

        if($this->Media->delete($id)) {
            $this->Session->setFlash('Successfully deleted media.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Error deleting media.', 'default', array('class'=>'message error'));
        }

        $this->redirect(array('action'=>'index'));
        exit;
    }
}
