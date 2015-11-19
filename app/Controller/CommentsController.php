<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    var $uses = array('Email', 'Comment', 'Post');
    
    public $name = 'Comments';

    function __notify() {

            $emails = Configure::read('email');
            $from = $emails['info'];
            $to = $emails['admin'];
            $subject = 'ブログにコメントが投稿されました。';
            $url = Configure::read('url').'posts/view/'.$this->data['Comment']['post_id'];

            $context_vars = array(
                'url'=>$url,
                'name'=>$this->data['Comment'][$this->Comment->_imap['created_by']],
                'body'=>$this->data['Comment'][$this->Comment->_imap['body']]
            );
            $this->Email->send($from, $to, $subject, $body='', $name='', $template='comment', $context_vars);
    }

    function add() {

        if($this->request->is('Post')) {
            if($saved = $this->Comment->save($this->data)) {
                $this->Post->increaseCommentCount($this->data['Comment']['post_id']);
                
                $this->Session->setFlash('コメントを投稿しました。', 'default', array('class'=>'message success'));
                $this->__notify();    
        
                $this->redirect($this->referer());
                exit;
            } else {
                $this->Session->setFlash('コメントの投稿に失敗しました。', 'default', array('class'=>'message error'));
                $this->_persistValidation();
            }
            
            $this->redirect($this->referer());
            exit;
        } 
        throw new Exception('404');
    }

    function delete() {

        if($this->request->is('Post')) {

            $this->Session->setFlash('コメントの削除に失敗しました。', 'default', array('class'=>'message error'));
            $this->Comment->id = $this->data['Comment']['id'];
            $this->Comment->data = $this->data;
            if($this->Comment->checkPassword()) {
                
                $this->Comment->data['Comment']['body'] = '*deleted';
                $this->Comment->data['Comment']['created_by'] = '---';
                if($this->Comment->save()) {
                    $this->Session->setFlash('コメントを削除しました。', 'default', array('class'=>'message success'));
                } 
                
            }

            $this->redirect($this->referer());
            exit;
        }
    }
}
