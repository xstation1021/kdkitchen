<?php

App::uses('AppController', 'Controller');

class CategoriesPostsController extends AppController {

    var $uses = array('Category', 'CategoriesPost');
    
    public $name = 'CategoriesPosts';

    function index($category_code=NULL) {
        if($category_code) {
            $conditions = array('Category.code'=>$category_code);
            $category = $this->Category->find('first', array('conditions'=>$conditions));
            $category_id = $category['Category']['id'];
        }
    }

}
