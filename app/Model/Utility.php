<?php
App::uses('AppModel', 'Model');

class Utility extends AppModel {

    var $useTable = false;

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Invalid Email'
        ),
        'message' => array(
            'rule' => 'notEmpty',
        ),
    );

}
