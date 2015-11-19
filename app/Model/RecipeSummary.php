<?php
App::uses('AppModel', 'Model');

class RecipeSummary extends AppModel {
    
    public $validate = array(
            'content' => array(
                    'rule' => 'notEmpty',
                    'message' => 'コンテンツは必須項目です。'
            ),
            
            'chef' => array(
                    'rule' => 'notEmpty',
                    'message' => 'シェフ名は必須項目です。'
            ),
            
            
                        
            'publish_month'=>array(
                    'publish_month_rule_1'=>array(
                            'rule'=>array('__checkUnique'),
                            'message'=>'その月は既に登録されています。'
                    ),
                    'publish_month_rule_2'=>array(
                            'rule'    => 'notEmpty',
                            'message' => '必須項目です。'
                    ),
            ),
    );
    
    function __checkUnique() {
        if(!empty($this->data['RecipeSummary']['publish_month'])){
            $startDate = new DateTime($this->data['RecipeSummary']['publish_month']);
            $endDate =  new DateTime($this->data['RecipeSummary']['publish_month']);
            
            $startDate = new DateTime($startDate->format("Y-m-01"));
            $endDate->add(new DateInterval('P1M'));
            
            
            
            $numberOfList = $this->find('count', array(
                    'conditions' => array(
                            'id !=' => $this->data['RecipeSummary']['id'],
                            'publish_month >=' => $startDate->format("Y-m-d"),
                            'publish_month <' => $endDate->format("Y-m-d")
                    )
            ));
            
            if($numberOfList == 0){
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
    
    public function getRecipesForSubscription($date, $user_id){
        $formatted_date = new Datetime($date);
        $formatted_date = $formatted_date->format("Y-m-01");
        
        $data = $this->find('all', array(
                'joins'=>array(
                        array('table'=>'recipes',
                                'alias'=>'Recipe',
                                'type'=>'inner',
                                'conditions'=>array('Recipe.summary_id = RecipeSummary.id', 'Recipe.is_public = 1', 'RecipeSummary.publish_month >=' => $formatted_date)),
                        array('table'=>'payments',
                                'alias'=>'Payment',
                                'type'=>'left',
                                'conditions'=>array('Payment.item_id = Recipe.id', 'Payment.category' => 'Recipe', 'Payment.user_id' => $user_id)),
                ),
                'conditions' => array('Payment.id is null or Payment.isDeleted = 1'),
                'fields' => array('Recipe.id, RecipeSummary.publish_month, Payment.id'),
        ));
        return $data;
    }
    
    public function beforeSave($options=array()) {

        if(!$this->id) {
            $this->data['RecipeSummary']['hash'] = Security::hash(uniqid());
        } 
        
        $date = new DateTime($this->data['RecipeSummary']["publish_month"]);
        $new_format = $date->format('Y-m-01');
        $this->data['RecipeSummary']["publish_month"] = $new_format;

        return true;
    }
}
