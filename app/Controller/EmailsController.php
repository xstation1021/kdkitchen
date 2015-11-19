<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EmailsController extends AppController {

    var $uses = array('Email');
    
    public $name = 'Emails';

    function send() {

        if($this->request->is('POST')) {

            $from = $this->data['Email']['email'];
            $to = $this->data['Email']['to'];
            $subject = $this->data['Email']['subject'];
            $body = $this->data['Email']['body'];

            $name = $from;
            if(isset($this->data['Email']['name'])) {
                $name = $this->data['Email']['name'];
            }

            $this->Email->send($from, $to, $subject, $body, $name='');

        }
    }   
    

    function contact_certification() {
        if($this->request->is('POST') || $this->request->is('PUT')) {
            $from = $this->data['Email']['from'];
            $phone = $this->data['Email']['phone'];
            $body = $this->data['Email']['body'];
    
            $name = $from;
            if(isset($this->data['Email']['name'])) {
                $name = $this->data['Email']['name'];
            }
    
            $to = $this->data['Email']['chef_email'];
    
            $subject = Configure::read('kd_kitchen_certification_contact');
    
            $context_vars = array(
                    'name'=>$name,
                    'email'=>$from,
                    'phone'=>$phone,
                    'body'=>$body
            );
    
            if($this->Email->send($from, $to, $subject, $body, $name='', $template='contact_chef', $context_vars)) {
                $this->Session->setFlash('メッセージが送信されました。', 'default', array('class'=>'message success'));
            } else {
                $this->Session->setFlash('エラーが発生しました。', 'default', array('class'=>'message error'));
            }
            $this->redirect($this->referer());
            exit;
        }
        $this->redirect('/');
        exit;
    }
    
    function contact_recipe() {
        if($this->request->is('POST') || $this->request->is('PUT')) {
            //$from = Configure::read('email');
            //$from = $from['info'];
            $from = $this->data['Email']['from'];
            $phone = $this->data['Email']['phone'];
            $body = $this->data['Email']['body'];
    
            $name = $from;
            if(isset($this->data['Email']['name'])) {
                $name = $this->data['Email']['name'];
            }
    
            $to = $this->data['Email']['to'];
    
            $subject = $this->data['Email']['subject'];
    
            $context_vars = array(
                    'name'=>$name,
                    'email'=>$from,
                    'phone'=>$phone,
                    'body'=>$body
            );
    
            if($this->Email->send($from, $to, $subject, $body, $name='', $template='contact_chef', $context_vars)) {
                $this->Session->setFlash('メッセージが送信されました。', 'default', array('class'=>'message success'));
            } else {
                $this->Session->setFlash('エラーが発生しました。', 'default', array('class'=>'message error'));
            }
            $this->redirect($this->referer());
            exit;
        }
        $this->redirect('/');
        exit;
    }
    
    
    function contact_chef() {
        if($this->request->is('POST') || $this->request->is('PUT')) {
            //$from = Configure::read('email');
            //$from = $from['info'];
            $from = $this->data['Email']['from'];
            $phone = $this->data['Email']['phone'];
            $body = $this->data['Email']['body'];

            $name = $from;
            if(isset($this->data['Email']['name'])) {
                $name = $this->data['Email']['name'];
            }

            $to = $this->data['Email']['chef_email'];

            $subject = Configure::read('contact_chef_subject');

            $context_vars = array(
                'name'=>$name,
                'email'=>$from,
                'phone'=>$phone,
                'body'=>$body
            );
            
            if($this->Email->send($from, $to, $subject, $body, $name='', $template='contact_chef', $context_vars)) {
                $this->Session->setFlash('メッセージが送信されました。', 'default', array('class'=>'message success'));
            } else {
                $this->Session->setFlash('エラーが発生しました。', 'default', array('class'=>'message error'));
            }
            $this->redirect($this->referer());
            exit;
        }
        $this->redirect('/');
        exit;
    }

}
