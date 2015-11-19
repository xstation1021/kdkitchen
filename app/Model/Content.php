<?php
App::uses('AppModel', 'Model');

class Content extends AppModel {
    public $validate = array(
        'content' => array(
            'rule' => 'notEmpty',
        ),
    );
}
