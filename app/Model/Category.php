<?php
App::uses('AppModel', 'Model');

class Category extends AppModel {

    public $validate = array(
        'code' => array(
            'code' => 'alphaNumeric',
        ),
    );

    public $hasAndBelongsToMany = array(
        'Post' => array(
            'className' => 'Post'
        )   
    );

}
