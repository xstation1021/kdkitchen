<?php
App::uses('AppController', 'Controller');

class ContentsController extends AppController {

    var $uses = array('Content');
    
    
    function admin_index(){
        $this->_auth('admin');
        $this->data = $this->Content->find('all', array('order' => 'key'));
    }

    function edit($id=null) {
        $this->_auth('admin');
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $Content = $this->Content->findById($id);
        if (!$Content) {
            throw new NotFoundException(__('Invalid post'));
        }
      
        if($this->request->is('POST')||$this->request->is('PUT')) {
            $this->Content->id = $id;
            if($this->Content->validates()){
                if($this->Content->save($this->data)) {
                    $this->Session->setFlash('コンテンツを更新しました。', 'default', array('class'=>'message success'));
                    $this->redirect(array('action'=>'admin_index'));
                    exit;
                }
            }
        }
        
        if(!$this->data){
            $this->data = $Content;
        }
        
        $this->set('title', 'コンテンツの編集');
        $this -> render('edit');
    }
    
    function add() {
        $this->_auth('admin');
        $this->Content->create();
        if($this->request->is('POST')) {
            if($this->Content->validates()){
                $this->Content->create();
                if($this->Content->save($this->data)) {
                    $this->Session->setFlash('コンテンツを追加しました。', 'default', array('class'=>'message success'));
                    $this->redirect(array( 'action'=>'admin_index'));
                    exit;
                }
            }
        }
        $this->set('title', 'コンテンツの新規登録');
        $this -> render('edit');
    }
    
}