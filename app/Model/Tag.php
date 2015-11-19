<?php
App::uses('AppModel', 'Model');

class Tag extends AppModel {
    
    public $validate = array(
        'tag' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
            ),
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Tag can only contain letters and numbers.'
            )
        )
    );
    
    public $hasAndBelongsToMany = array(
        'Post' => array(
            'className' => 'Post'
        )   
    );

    var $inserted_ids = array();

    function afterSave($created) {
        if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }
        return true;
    }


}
