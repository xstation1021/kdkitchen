<?php
App::uses('AppModel', 'Model');

class RecipeCategory extends AppModel {
    
    public $validate = array(
            'category_name' => array(
                    'category_name_rule_1' => array(
                            'rule'=>'notEmpty',
                            'message'=>'必須項目です。'
                    ),
                    'category_name_rule_2' => array(
                            'rule'=>'isUnique',
                            'message'=>'The category name already exists.'
                    )
            )
    );
}
