<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

    var $uses = array('Setting');
    
    function index() {

        $data = $this->paginate('Setting');
        $this->set('data', $data);
        $this->set('title', 'Settings');
    }
    
    function edit($id) {

        $this->set('title', 'Edit Setting');
        $this->Setting->id = $id;
        $data = $this->Setting->read();
        $this->set('data', $data);
    }
    
    function delete($id) {
        $this->_auth();    

        if($this->Media->delete($id)) {
            $this->Session->setFlash('Successfully saved media.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Error saving media.', 'default', array('class'=>'message error'));
        }

        $this->redirect(array('action'=>'index'));
        exit;
    }
    
}
