<?php
App::uses('AppModel', 'Model');

class UserSubscription extends AppModel {
    public function beforeSave($options = array()){

        if(isset($this->data['UserSubscription']['from_date'])){
            $date = new DateTime($this->data['UserSubscription']['from_date']);
            $this->data['UserSubscription']['from_date'] = $date->format("Y-m-d");
        }
        
        if(isset($this->data['UserSubscription']['to_date'])){
            if(empty($this->data['UserSubscription']['to_date'])){
                $this->data['UserSubscription']['to_date'] = null;
            } else {
            $date = new DateTime($this->data['UserSubscription']['to_date']);
            $this->data['UserSubscription']['to_date'] = $date->format("Y-m-d");
            }
        }
    }
    
    public $validate = array(
            'from_date'=>array(
                    'from_date_1'=>array(
                            'rule'=>'notEmpty',
                            'message' => "必須項目です",
                    ),
                    'from_date_2'=>array(
                            'rule'=>array('__checkFromDate'),
                            'message' => "その日は指定できません",
                    ),
      
            ),
            'to_date'=>array(
                    'from_date_1'=>array(
                            'rule'=>array('__checkToDate'),
                            'message' => "他にTo Date がセットされていないレコードがあります。",
                    ),
            
            ),
            
    );
    
    function __checkToDate(){
        if(!empty($this->data['UserSubscription']['to_from'])){
            return true;
        }
        $data = $this->find("all", array(
                'conditions' => array(
                        'to_date is null',
                        'user_id' => $this->data['UserSubscription']['user_id']
                ),
                'fields' => array('UserSubscription.id')
        ));
        
        if(count($data) == 0){
            return true;
        }
        else
        {
            if(count($data) == 1){
                if($data[0]['UserSubscription']['id'] == $this->id){
                    return true;
                }
            }
            return false;
        }
    }
    
    function __checkFromDate(){
        $date = new DateTime($this->data['UserSubscription']['from_date']);
        $data = $this->find("all", array(
        	'conditions' => array(
        	   'from_date <=' => $date->format("Y-m-d"),
        	   'to_date >=' => $date->format("Y-m-d"),
        	   'user_id' => $this->data['UserSubscription']['user_id']
            ),
                'fields' => array('UserSubscription.id')
        ));
        
        if(count($data) == 0){
            return true;
        }
        else
        {
            if(count($data) == 1){
                if($data[0]['UserSubscription']['id'] == $this->id){
                    return true;
                }
            }
          return false;      
        }
    }
}
