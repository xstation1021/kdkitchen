<?php
App::uses('AppController', 'Controller');

class RecipeCategoriesController extends AppController {

    var $uses = array('RecipeCategory');
    
    function beforeFilter() {
        parent::beforeFilter ();
         $this->_auth('admin');
    }
    
    function index(){
        
        $this->data = $this->RecipeCategory->find('all');
    }

    function edit($id = null) {
        if($id != null){
            $this->RecipeCategory->id = $id;
            $data = $this->RecipeCategory->read();
        }        
        
        if($this->request->is('POST') || $this->request->is('PUT')) {
                if($id == null){
                    $maxSortNumberRecord = $this->RecipeCategory->find('first', array(
                            'fields'=>array('MAX(RecipeCategory.sortorder) AS max'),
                    ));
                    
                    $this->RecipeCategory->set('sortorder', (int)$maxSortNumberRecord[0]['max'] + 1);
                }
                
                if($this->RecipeCategory->save($this->data)) {
                    $message = "レシピカテゴリーを編集しました。";
                    if($id == null){
                        $message = "レシピカテゴリーを追加しました。";
                    }          
                    $this->Session->setFlash($message, 'default', array('class'=>'message success'));
                    $this->redirect(array('controller'=>'recipecategories', 'action'=>'index'));
                    exit;
                }
        } else {        
            if($id != null){
                $this->data = $data;
             } 
        }
        if($id == null){
            $this->set('title', 'レシピカテゴリー新規登録');
        } else{
            $this->set('title', 'レシピカテゴリー編集');
        }
        
        $this -> render('edit');
    }
    
    function order(){
        $this->_auth('admin');
        if($this->request->is('POST')) {
            $dataset = $this->data;
            if($this->RecipeCategory->saveAll($dataset['RecipeCategory'])){
                $this->redirect(array('controller'=>'recipecategories', 'action'=>'index'));
                exit;
            }
        }
    
        $this->data = $this->RecipeCategory->find('all', array(
                'order' => array('sortorder' => 'asc')
        ));
    
        $numOfRecipeCategories = $this->RecipeCategory->find('count');
        $array = array_combine( range(1,$numOfRecipeCategories), range(1,$numOfRecipeCategories));
        $this->set('sortOrder', $array);
    
    }
    
    
    function delete(){
        if($this->request->is('POST') || $this->request->is('PUT')){
            $this->RecipeCategory->id = $this->data['RecipeCategory']['id'];
            $this->RecipeCategory->delete();
            $this->Session->setFlash('レシピカテゴリーが削除されました。', 'default', array('class'=>'message success'));
            $this->redirect(array( 'action'=>'index'));
            exit;
        }
    }

}
