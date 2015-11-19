<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class Email extends AppModel {

    var $useTable = false;
    public $validate = array(
        'from'=> array(
            'rule'    => 'email',
            'message' => 'Must be valid email.'
        ),
        'to'=> array(
            'rule'    => 'email',
            'message' => 'Must be valid email.'
        )
    );

    function send($from, $to, $subject, $body, $name='', $template=NULL, $context_vars=array()) {
        if($name=='') {
            $name = $from;
        }

        $email = new CakeEmail('smtp');

        if($template) {
            $email->template($template, 'default');
        }
        try { 
            $email->emailFormat('html')->from(array($from=>$name))->to($to)->viewVars($context_vars)->subject($subject)->send($body);
            return True; 
        } catch (SocketException $e) { return False; } 
    }

}
