<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    var $uses = array('Category');
    
    public $name = 'Categories';
    

    function view($code) {
        if($code) {
            $conditions = array('Category.code'=>$code);
            $contain = array('Post');
            $this->Category->recursive = 1;
            $this->data = $this->Category->find('first', array('conditions'=>$conditions));
        }
    }

}
