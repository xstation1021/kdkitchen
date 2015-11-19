<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class Message extends AppModel {

    public $validate = array(
        'sender_email'=> array(
            'rule'    => 'email',
            'message' => 'Must be valid email.'
        ), 
        'receiver_email'=> array(
            'rule'    => 'email',
            'message' => 'Must be valid email.'
        ), 
        'body'=> array(
            'rule'    => 'notEmpty',
            'message' => 'Cannot be left blank.'
        ), 
    );

    public $belongsTo = array(
        'Store' => array(
            'className' => 'Store',
            'foreignKey'=> 'store_id',
        ),
        'Item' => array(
            'className' => 'Item',
            'foreignKey'=> 'item_id',
        )
    );

}
