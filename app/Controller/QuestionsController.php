<?php
App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

    var $uses = array('Question');
    
    function index(){
        $this->data = $this->Question->find('all', array(
                'recursive'=>-1,
                'conditions'=>array('Question.is_public'=>1),
                'order' => array('sortorder' => 'asc')
        ));
    }
    
    function admin_index(){
        $this->_auth('admin');
        $this->data = $this->Question->find('all');
    }
    

    function order(){
        $this->_auth('admin');
        
        if($this->request->is('POST')) {
            $dataset = $this->data;
            if($this->Question->saveAll($dataset['Question'])){
                $this->redirect(array('action'=>'admin_index'));
                exit;
            }
        }
        
                $this->data = $this->Question->find('all', array(
                'recursive'=>-1,
                'order' => array('sortorder' => 'asc')
        ));
    
        
        $numOfQuestions = count($this->data);
        
        $array = array_combine( range(1,$numOfQuestions), range(1,$numOfQuestions));
        $this->set('sortOrder', $array);
    
    }

    function edit($id=null) {
        $this->_auth('admin');
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $question = $this->Question->findById($id);
        if (!$question) {
            throw new NotFoundException(__('Invalid post'));
        }
      
        if($this->request->is('POST')||$this->request->is('PUT')) {
            $this->Question->id = $id;
            if($this->Question->validates()){
                if($this->Question->save($this->data)) {
                    $this->Session->setFlash('質問を更新しました。', 'default', array('class'=>'message success'));
                    $this->redirect(array('action'=>'admin_index'));
                    exit;
                }
            }
        }
        
        if(!$this->data){
            $this->data = $question;
        }
        
        $this->set('title', '質問の編集');
        $this -> render('edit');
    }
    
    function add() {
        $this->_auth('admin');
        $this->Question->create();
        
        if($this->request->is('POST')) {
            if($this->Question->validates()){
                $maxSortNumberRecord = $this->Question->find('first', array(
                        'fields'=>array('MAX(Question.sortorder) AS max'),
                ));
                
                $this->Question->set('sortorder',$maxSortNumberRecord[0]['max'] + 1);
                $this->Question->set($this->data);
                if($this->Question->save()) {
                    $this->Session->setFlash('質問を追加しました。', 'default', array('class'=>'message success'));
                    $this->redirect(array( 'action'=>'admin_index'));
                    exit;
                }
            }
        }
        $this->set('title', '質問の新規登録');
        $this -> render('edit');
    }
    
    function delete($id) {
    
        if($this->Question->delete($id)) {
            $this->Session->setFlash('Successfully deleted question.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Error deleting question.', 'default', array('class'=>'message error'));
        }
    
        $this->redirect(array('action'=>'admin_index'));
        exit;
    }
}