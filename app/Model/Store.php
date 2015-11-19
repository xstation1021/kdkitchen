<?php
App::uses('AppModel', 'Model');
App::uses('Security', 'Utility'); 

class Store extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Invalid Email'
        ),
        'password' => array(
            'rule'    => array('minLength', 4),
            'message' => 'Minimum 4 characters long'
        ),
        'description' => array(
            'rule'    => array('maxLength', 3000),
            'message' => 'Maximum 3000 characters long'
        ),
    );

    public $hasMany = array(
        'Item' => array(
            'className'  => 'Item',
        ),
    );

    public function beforeSave() {
        if(!empty($this->data['Store']['password'])) {
            $this->data['Store']['password'] = Security::hash($this->data['Store']['password'], 'sha1', true);
        }
        if(!$this->id) {
            $this->data['Store']['store_hash'] = Security::hash(uniqid());
        }
        return true;
    }
    
    public function auth($id, $password) {
        $password = Security::hash($password, 'sha1', true);
        if($this->find('first', array('conditions'=>array('Store.id'=>$id, 'Store.password'=>$password)))) {
            return True;
        }
        return False;
    }

    function getStoreData($id_or_hash) {
    
        $store = False;
        if(is_numeric($id_or_hash)) {
            $conditions = array('Store.id'=>$id_or_hash);
        } else {
            $conditions = array('Store.store_hash'=>$id_or_hash);
        }
        $this->recursive = 2;
        $store = $this->find('first', array('conditions' => $conditions));
        return $store;
    }


}
