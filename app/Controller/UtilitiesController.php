<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UtilitiesController extends AppController {

    var $uses = array('Utility');
    
    public $name = 'Utilities';

    function send_contact_email() {

        if($this->request->is('POST')) {
            print_r($this->data);
            $this->Utility->set($this->data);
            if($this->Utility->validates()) {

                $name = $this->data['Utility']['name'];
                $from = $this->data['Utility']['email'];
                $subject = $this->data['Utility']['subject'];
                $msg = $this->data['Utility']['message'];
                
                exit;
                $email = new CakeEmail('gmail');
                $email_list = Configure::read('email');
                $email->from(array($from =>$name))->to($email_list['contact'])->subject($subject)->send($msg);
            }

            $this->_persistValidation();
            $this->Session->setFlash('Input error.', 'default', array('class'=>'message error'));
            $this->redirect($this->referer());
            exit;
        }
    }   

}
