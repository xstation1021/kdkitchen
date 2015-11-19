<?php
App::uses('AppModel', 'Model');

class Question extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
        ),
    );
}
