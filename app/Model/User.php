<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

    public $validate = array(
        'display_name'=>array(
            'display_name_rule_1'=>array(
                'rule'=>'isUnique',
                'message'=>'The display name already exists.',
            )
        ),
        'username'=>array(
            'username_rule_1'=>array(
                'rule'=>'isUnique',
                'message'=>'The username already exists.'
            ),
            'username_rule_2'=>array(
                'rule'=>'alphaNumeric',
                'message'=>'Username must be alphanumeric.'
            ),
        ),
        'email'=>array(
            'email_rule_1'=>array(
                'rule'=>'isUnique',
                'message'=>'The email already exists.'
            ),
            'email_rule_2'=>array(
                'rule'=>'email',
                'message'=>'Invalid email address.'
            ),
        ),
        'password'=>array(
            'password_rule_1'=>array(
                'rule'=>array('__confirmPassword'),
                'message'=>'Password confirmation does not match.'
            ),
            'password_rule_2'=>array(
                'rule'    => array('minLength', 6),
                'message' => 'Passwords must be at least 6 characters long.'
            ),
           'password_rule_3'=>array(
                'rule'    => array('__checkLetterAndNum'),
                'message' => 'Passwords must contain at least one letter and number.'
            ),
        ),
    );

    public $hasOne = array('UserPageAddress', 'UserPage');
    public $hasMany = array(
        'UserSubscription' => array(
            'className' => 'UserSubscription',
        ));

    function beforeSave($options=array()) {
        if(isset($this->data['User']['password'])) {
            $hash = $this->hashString($this->data['User']['password']);
            $this->data['User']['password'] = $hash;
        }
    }

    function __confirmPassword() {
        $data = $this->data['User'];
        if($data['password'] != $data['password_confirm']) {
            return false;
        }
        return true;
    }

    function matchPassword($password) {
        $hash = $this->hashString($this->data['User']['password']);
    }

    function __checkLetterAndNum($data) {
        
        if(preg_match('/[a-zA-Z]{1,}/', $data['password'])){
            if(preg_match('/[0-9]{1,}/', $data['password'])){
                return true;
            }

        }
        return false;
    }
    
    public function getSubscriptionUserList($id = null){
    
        $settings = array(
                'recursive'=> -1,
                'contain'=>array('UserSubscription'=>array(
                        'conditions'=>array(
                                'UserSubscription.from_date <=' => date('Y-m-d'),
                                'or' => array('UserSubscription.to_date is null',
                                        'UserSubscription.to_date >='=> date('Y-m-d'))
                        )
                )),
                'conditions'=> array('User.is_admin = 0'),
        );
        
        if($id != null){
            $settings['conditions']['User.id']  = $id;
        }
        if($id == null){
            $data = $this->find('all', $settings);
        } else {
            $data = $this->find('first', $settings);
        }
        
        return $data;
    }
    
    public function getSubscriptionUserList2($date){
        $datetime = new DateTime($date);
        $formatDate = $datetime->format("Y-m-d");
    
        $settings = array(
                'recursive'=> -1,
                'contain'=>array('UserSubscription'=>array(
                        'conditions'=>array(
                                'UserSubscription.from_date <=' => $formatDate,
                                'or' => array('UserSubscription.to_date is null',
                                        'UserSubscription.to_date >='=> $formatDate)
                        )
                )),
                'conditions'=> array('User.is_admin = 0'),
        );
        $data = $this->find('all', $settings);
        return $data;
    }
}
