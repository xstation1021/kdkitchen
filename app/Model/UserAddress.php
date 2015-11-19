<?php
App::uses('AppModel', 'Model');

class UserAddress extends AppModel {

    public $validate = array(
        'prefecture'=> array(
            'rule'    => 'notEmpty',
            'message' => 'Cannot be left blank.'
        ), 
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey'=> 'user_id',
        )
    );


}
