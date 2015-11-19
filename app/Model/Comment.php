<?php
App::uses('AppModel', 'Model');

class Comment extends AppModel {

    public $validate = array(
        'created_by' => array(
            'rule' => 'notEmpty',
        ),
        'body' => array(
            'rule' => 'notEmpty',
        ),
        'password'=>array(
            'password_rule_1'=>array(
                'rule'    => array('minLength', 4),
                'message' => 'Passwords must be at least 4 characters long.'
            )
        )
    );

    public $belongsTo = array(
        'Post' => array(
            'className'  => 'Post',
        ),
    );

    function beforeSave($options=array()) {
        if(isset($this->data['Comment']['password'])) {
            $hash = $this->hashString($this->data['Comment']['password']);
            $this->data['Comment']['password'] = $hash;
        }
    }

    function beforeDelete($cascade = true) {
        return $this->checkPassword();
    }

    function checkPassword() {
        $hash = '';
        if(isset($this->data['Comment']['password'])) {
            $hash = $this->hashString($this->data['Comment']['password']);
        }
        $conditions = array('Comment.id'=>$this->id, 'Comment.password'=>$hash);
        $result = $this->find('first', array('conditions'=>$conditions));
        if($result) {
            return true;
        }
        return false;

    }
}
