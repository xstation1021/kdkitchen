<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'Uploader.Uploader');
class RecipesController extends AppController {

    var $uses = array('Recipe', 'RecipeCategory', 'RecipeSummary', 'User', 'Payment');
    public $components = array('Cookie');
    public $paginate = array(
            'recursive'=>-1,
            'limit' => 18,
            'joins'=>array(
                    array('table'=>'recipe_categories',
                            'alias'=>'RecipeCategory',
                            'type'=>'left',
                            'conditions'=>array('Recipe.category_id = RecipeCategory.id')
                        ),
                    array('table'=>'recipe_summaries',
                            'alias'=>'RecipeSummary',
                            'type'=>'inner',
                            'conditions'=>array('Recipe.summary_id = RecipeSummary.id')
                        ),
                    ),
            'order' => 'RecipeSummary.publish_month desc, Recipe.sortorder ASC',
            'fields'=>array('Recipe.*', 'RecipeCategory.*', 'RecipeSummary.publish_month', 'Payment.*')
    );

    private function __upload($dir, $data, $hash, $id, $type, $crop = true){
        $photo = $this->data['Attachment']['image'];
        $photo['custom_name'] = $type . $id . ".jpg";
        $this->Uploader = new Uploader(array('uploadDir'=>$dir));
        $this->Uploader->delete($dir . '/'. $photo['custom_name']);
        $this->Uploader->delete($dir . 'disp/'. $photo['custom_name']);
        
        $result = $this->Uploader->upload($photo);
        if($crop == true){
            $this->Uploader->uploadDir = $dir.'/disp';
            $this->Uploader->crop(array('width' => 270, 'height'=>'180', 'uploadDir' => $dir.'/cropped', 'append'=>false));
        }
    }
    
    private function __recipeFileUpload($type, $hash, $id, $crop = true){
        ini_set('upload_max_filesize', '64M');
        $dir = 'uploads/' . $type . '/' . $hash . '/';
        if(isset($this->data['Attachment']['image'])&& $this->data['Attachment']['image']["error"]!=4){
            $photo = $this->data['Attachment']['image'];
            $photo['custom_name'] = $type . $id . ".jpg";
            $this->Uploader = new Uploader(array('uploadDir'=>$dir));
            $this->Uploader->delete($dir . '/'. $photo['custom_name']); 
            $this->Uploader->delete($dir . 'disp/'. $photo['custom_name']);

            $result = $this->Uploader->upload($photo);
            if($crop == true){
                $this->Uploader->uploadDir = $dir.'/disp';
                $this->Uploader->crop(array('width' => 270, 'height'=>'180', 'uploadDir' => $dir.'/cropped', 'append'=>false));
            }
        }
        
        // used for summary top page chef
        if(isset($this->data['Attachment']['chef']) && $this->data['Attachment']['chef']["error"]!=4){
            $photo = $this->data['Attachment']['chef'];
            $photo['custom_name'] = "chef.jpg";
            $this->Uploader = new Uploader(array('uploadDir'=>$dir));
            $this->Uploader->delete($dir . '/'. $photo['custom_name']);
        
            $result = $this->Uploader->upload($photo);
        }
        if(isset($this->data['Attachment']['file']) && $this->data['Attachment']['file']["error"]!=4){
            $file = $this->data['Attachment']['file'];
            $file['custom_name'] = $type . $id . ".pdf";
            $this->Uploader = new Uploader(array('uploadDir'=>$dir));
            $this->Uploader->delete($dir . '/'. $file['custom_name']);
            $result = $this->Uploader->upload($file);
        }
    }
    
    function complete_purchase(){
        $this->_auth('chef');
        $this->set('title', '購入完了画面');
    }
    
    private function __file_validation($data , $type, $model){
        $fileMessage = null;
            if($data["error"]==4){
                if($type == 'pdf'){
                    $fileMessage = $model . "PDFが必要です。";
                } elseif($type == 'jpg'){
                    $fileMessage = $model . "写真が必要です。";
                }
            }
            else {
                $path = $data['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if(strtolower($ext) != strtolower($type)){
                    $fileMessage = strtoupper($type) . "ファイルではありません。";
                }
            }
        return $fileMessage;
    }
    
    function admin_top_add(){
        $this->_auth('admin');
        if ($this->request->is('POST')||$this->request->is('PUT')) {
            $validation = false;
            $this->RecipeSummary->set($this->data);
            $validation=$this->RecipeSummary->validates();
            $fileError = $this->__file_validation($this->data['Attachment']['image'], 'jpg', "レシピカテゴリー");
            
            $fileError2 = $this->__file_validation($this->data['Attachment']['chef'], 'jpg', "レシピカテゴリー");
            if(empty($fileError)==false){
            	$validation=false;
            }
            if(empty($fileError2)==false){
                $validation=false;
            }
            if ($validation==true && $this->RecipeSummary->save()) {
                $id = $this->RecipeSummary->getLastInsertID();
                $summary = $this->RecipeSummary->findById($id);
                $this->__recipeFileUpload('recipesummary', $summary['RecipeSummary']['hash'], $this->RecipeSummary->id, false);
                $this->Session->setFlash('レシピサマリー '.$this->RecipeSummary->publish_month . 'を登録しました。', 'default', array('class'=>'message success'));
                return $this->redirect(array('action'=>'admin_index'));
            }
        }
        if(isset($fileError)){
            $this->set('fileError', $fileError);
        }
        
        if(isset($fileError2)){
            $this->set('fileError2', $fileError2);
        }
        $this->set('edit', false);
        $this->set('title', 'レシピTOP新規登録');
        $this -> render('admin_top_edit');
    }
    
    function admin_top_edit($id){
        $this->_auth('admin');
        if ($this->request->is('POST')||$this->request->is('PUT')) {
                $validation = false;
                $this->RecipeSummary->set($this->data);
                $validation=$this->RecipeSummary->validates();
                if(isset($this->data['Attachment']['image'])){
                    $fileError = $this->__file_validation($this->data['Attachment']['image'], 'jpg', "レシピカテゴリー");
                }
                
                if(isset($this->data['Attachment']['chef'])){
                    $fileError = $this->__file_validation($this->data['Attachment']['chef'], 'jpg', "レシピカテゴリー");
                }
            if ($validation == true && $this->RecipeSummary->save()) {
                $summary = $this->RecipeSummary->findById($id);
                $this->__recipeFileUpload('recipesummary', $summary['RecipeSummary']['hash'], $this->RecipeSummary->id, false);
                $this->Session->setFlash('レシピサマリー '.$this->RecipeSummary->publish_month . 'を更新しました。', 'default', array('class'=>'message success'));
                return $this->redirect(array('action'=>'admin_index'));
            }
        } else {
            $this->data = $this->RecipeSummary->findById($id);
        }
        $this->set('edit', true);
        $this->set('title', 'レシピTOP編集');
    }
    
    function admin_index(){
        $this->_auth('admin');
        $top_list = $this->RecipeSummary->find('all',
                array( 'order' => 'publish_month DESC')
                );
        
        $this->data = $this->Recipe->find('all', array(
                'recursive'=>-1,
                'joins'=>array(
                             array('table'=>'recipe_categories',
                               'alias'=>'RecipeCategory',
                               'type'=>'inner',
                               'conditions'=>array('RecipeCategory.id = Recipe.category_id')
                               ), 
                            array('table'=>'recipe_summaries',
                                    'alias'=>'RecipeSummary',
                                    'type'=>'inner',
                                    'conditions'=>array('Recipe.summary_id = RecipeSummary.id')
                            ),
                         ),
                'fields'=>array('Recipe.*', 'RecipeCategory.category_name', 'RecipeSummary.publish_month'),
                'order' => 'RecipeSummary.publish_month desc'
            ));
        
        $this->set('top_list', $top_list);
    }
    
    public function downloadfile($id) {
        $this->_auth('chef');
        if($this->__canDownloadRecipe($id) == false){
                $this->Session->setFlash('アクセスは許可されていません。', 'default', array('class'=>'message error'));
                $this->redirect(array('controller'=>'pages', 'action'=>'home'));
                exit;
                    }
        $this->viewClass = 'Media';
        $recipe = $this->Recipe->findById($id);
        $path = 'uploads/recipe/' . $recipe['Recipe']['hash'];
        $file_id = 'recipe'.$recipe['Recipe']['id'];
        $name = $recipe['Recipe']['title'];

        $file_id .= '.pdf';
        $params = array(
                'id'        => $file_id,
                'name'      => $name,
                'extension' => 'pdf',
                'path'      => $path . DS,
        );
        header("Content-type: application/pdf; charset=utf-8 encoding=UTF-8'");
        $this->set($params);
    }
    
    public function downloadimage($id) {
        $this->_auth('chef');
            if($this->__canDownloadRecipe($id) == false){
                $this->Session->setFlash('アクセスは許可されていません。', 'default', array('class'=>'message error'));
                $this->redirect(array('controller'=>'pages', 'action'=>'home'));
                exit;
                    }
        $this->viewClass = 'Media';
        $recipe = $this->Recipe->findById($id);
        $path = 'uploads/recipe/' . $recipe['Recipe']['hash'];
        // Render app/webroot/files/example.docx
        $params = array(
                'id'        => 'recipe'.$recipe['Recipe']['id']. '.jpg',
                'name'      => $recipe['Recipe']['title'],
                'extension' => 'jpg',
                'path'      => $path . DS,
                'download' => 'download'
        );
        $this->set($params);
    }
    
    private function __canDownloadRecipe($id){
        if($this->_logged_user['is_admin'] == 1){
            return true;
        }
    	$records = $this->Recipe->find('all',array(
    	        'recursive' => '-1',
    		  'joins' => array(
    		          array(
    		                  'table' => 'payments',
    		                  'alias' => 'Payment',
    		                  'type' =>'inner',
    		                  'conditions' => array('Payment.item_id' => $id, 'Payment.category' => 'Recipe', 'Payment.user_id' => $this->_logged_user['id'], 'Payment.isDeleted = 0')   
    		          ),
    	       ),
    	        'fields'=>array('Recipe.id'),
    	   )
    	);
    	
    	if(count($records) > 0){
    	    return true;
    	} else {
    	    return false;
    	}
    }
    
    function index($recipeCategory=NULL) {
        $this->_auth('chef');
        $page = 1;
        if(isset($this->request['named']['page'])){
            $page = $this->request['named']['page'];
        }
        $recipeListAll = true;
        if(isset($_GET['type'])&& !empty($_GET['type'])){
            $this->Cookie->write('type', $_GET['type'], false, time()+604800);
            if($_GET['type'] == 'accessible'){
                $recipeListAll =false;
            }
        } else {
            $is_cookie = $this->Cookie->read('type');
            if($is_cookie == 'accessible'){
                $recipeListAll = false;    
            }
        }
        $date = date("Y-m-d");
        
        $maxDate = $this->RecipeSummary->find('first', array('joins'=>array( 
                            array('table'=>'recipes',
                                'alias'=>'Recipe',
                                'type'=>'inner',
                                'conditions'=>array('Recipe.summary_id = RecipeSummary.id', 'Recipe.is_public = 1', 'RecipeSummary.publish_month <=' => date("Y-m-d"))),
                            ),
                        'fields' => 'Max(publish_month) as max'));
        $maxDate = $maxDate[0]['max'];
        
        $newestSummary = $this->Recipe->find('all', array(
                'joins'=>array(
                        array('table'=>'recipe_summaries',
                                'alias'=>'RecipeSummary',
                                'type'=>'inner',
                                'conditions'=>array('Recipe.summary_id = RecipeSummary.id', 'Recipe.is_public = 1')),
                        array('table'=>'recipe_categories',
                                'alias'=>'RecipeCategory',
                                'type'=>'inner',
                                'conditions'=>array('Recipe.category_id = RecipeCategory.id')),
                        array('table'=>'payments',
                                'alias'=>'Payment',
                                'type'=>'left',
                                'conditions'=>array('Payment.item_id = Recipe.id','Payment.category' => 'Recipe', 'Payment.user_id' => $this->_logged_user['id'], 'Payment.isDeleted=0')
                ),
                ),
                'conditions' => array(
                        'publish_month' => $maxDate,
                        'RecipeSummary.is_public = 1',
                        
                ),
                'fields' => array('Recipe.*', 'RecipeSummary.*', 'RecipeCategory.*', 'Payment.*'),
                'order' => 'RecipeSummary.publish_month DESC, Recipe.sortorder ASC',
        ));
        
        if(empty($newestSummary)){
        	throw new Exception();
        }
        $top_image_file = $newestSummary[0]['RecipeSummary']['id'] . '.jpg';
        $newestSummaryPublishDate = new DateTime($newestSummary[0]['RecipeSummary']['publish_month']);
        
        $recipeCategories = $this->RecipeCategory->find('all',array(
                'recursive'=> -1, 
                'conditions' => array(
                                    'id IN (select distinct category_id from recipes where recipes.is_public = 1)'
                                ),
                'order' => 'RecipeCategory.sortorder ASC',
            ));
        
        $settings = $this->paginate;
        
        $join = array('table'=>'payments',
                            'alias'=>'Payment',
                            'type'=>'left',
                            'conditions'=>array('Payment.item_id = Recipe.id','Payment.category' => 'Recipe', 'Payment.user_id' => $this->_logged_user['id'], 'Payment.isDeleted=0')
                        );
        $settings['joins'][] = $join;
        $settings['conditions'] = array('RecipeSummary.publish_month <=' => date("Y-m-d"));
        if($recipeListAll == false &&  $this->_logged_user['is_admin'] != 1){
            $settings['conditions'][] = "(RecipeSummary.publish_month > '". date("Y-m-d")."' or Payment.user_id is not null)";
        }

        $showAll = true;
        
        if($recipeCategory) {
            if(strtolower($recipeCategory) != "all"){
                $showAll = false;
                foreach($settings['joins'] as $index=>$table) {
                    if('RecipeCategory' == $table['alias']) {
                        $settings['joins'][$index]['type'] = 'inner';
                        $settings['joins'][$index]['conditions'] = array('Recipe.category_id = RecipeCategory.id', "RecipeCategory.id = '".$recipeCategory."'");
                        }
                }
            }
        } 

        $this->paginate = $settings;
        $data = $this->paginate('Recipe');
        
        $summary_recipes = array();
        
        $number_recipes = 0;
        foreach($data as $recipe){
            $publish_date = new DateTime($recipe['RecipeSummary']['publish_month']);
            if($publish_date < $newestSummaryPublishDate || $number_recipes > 3){
                break;
            } else {
                $number_recipes++;
                $summary_recipes[] = $recipe;
            }
        }
        $currentSubscriber = $this->_subscribed;
        $this->set('summary_recipes', $newestSummary);
        $this->set('data', $data);
        $this->set('recipeCategories', $recipeCategories);
        $this->set('title', 'RECIPE');
        $this->set('top_summary_hash', $newestSummary[0]['RecipeSummary']['hash']);
        $this->set('top_image_file', $top_image_file);
        $this->set('recipeListAll', $recipeListAll);
        $this->set('showAll', $showAll);
        $this->set('page', $page);
        $this->set('category',$recipeCategory);
        $this->set('subscribed', $currentSubscriber);
    }

    function edit($id=NULL) {
        $this->_auth('admin');
        $this->Recipe->id = $id;
        $data = $this->Recipe->read();
        if($this->request->is('Put') || $this->request->is('Post')) {
            $validation = false;
            $this->Recipe->set($this->data);
            $validation = $this->Recipe->validates();
            $fileError = array();
            
            if(isset($this->data['Attachment']['file'])){
                 $message = $this->__file_validation($this->data['Attachment']['file'], 'pdf', "レシピ");
                 if(!empty($message)){
                     $fileError['file'] = $message;;
                 }
             }
             
             if(isset($this->data['Attachment']['image'])){
                 $message = $this->__file_validation($this->data['Attachment']['image'], 'jpg', "レシピ");
                 if(!empty($message)){
                     $fileError['image'] = $message;
                 }
             }
            if(!empty($fileError)){
                $validation = false;
            }
            
            if($validation == true && $this->Recipe->save()) {
                $this->__recipeFileUpload('recipe', $data['Recipe']['hash'], $id);
                $this->Session->setFlash('ページを編集しました。', 'default', array('class'=>'message success'));
                $this->redirect(array('action'=>'admin_index'));
            }
        } else {
           
            $this->data = $data;
        }
        if(isset($fileError)){
            $this->set('fileError', $fileError);
        }
        $this->set('summary_list', $this->__createSummaryList());
        $this->set('categories', $this->__createRecipeCategoryDropDown());
        $this->set('title', 'レシピ編集');
        $this->set('edit', true);
    }
    
    private function __createRecipeCategoryDropDown(){
        return $this->RecipeCategory->find('list', array('fields' => array('id', 'category_name')));
    }
    
    private function __createSummaryList(){
        $summaries = $this->RecipeSummary->find('all', array('fields'=>array('RecipeSummary.id, RecipeSummary.publish_month'), 'order' => array('RecipeSummary.publish_month' => 'desc')));
        $summary_list = array();
        foreach($summaries as $summary){
            $summary_list[$summary['RecipeSummary']['id']]= $summary['RecipeSummary']['publish_month'];
        }
        return $summary_list;
    }
    
    function add() {
        $this->_auth('admin');
        $fileError = array();
        if($this->request->is('POST') || $this->request->is('PUT')) {
            $validation = false;
            $date = new DateTime($this->Recipe->publish_date);
            $this->Recipe->create();
            $this->Recipe->set($this->data);
            $this->Recipe->set('publish_date',$date->format('Y-m-d'));
            $validation = $this->Recipe->validates();
             $message = $this->__file_validation($this->data['Attachment']['file'], 'pdf', "レシピ");
             if(!empty($message)){
                 $fileError['file'] = $message;;
             }
             
             
             $message = $this->__file_validation($this->data['Attachment']['image'], 'jpg', "レシピ");
             if(!empty($message)){
                 $fileError['image'] = $message;;
             }
             
             if(!empty($fileError)){
                 $validation = false;
             }
                 if($validation == true){
                     $datasource = $this->Recipe->getDataSource();
                     $datasource->begin();
                     try{
                         
                         if($this->Recipe->save()) {
                             
                             $id = $this->Recipe->getInsertID();
                             $this->Recipe->id = $id;
                             $data= $this->Recipe->read();
                             
                             $summary_id = $data['Recipe']['summary_id'];
                             
                             $summary = $this->RecipeSummary->findById($summary_id);
                             if($summary == null){
                                 throw new Exception();
                             }
                             
                             $Users = $this->User->getSubscriptionUserList2($summary['RecipeSummary']['publish_month']);
                                 foreach($Users as $user){
                                     if(!empty($user['UserSubscription'])){
                                         $subscription = $user['UserSubscription'][0];
                                         $this->Payment->create();
                                         $displayFrom = new DateTime($summary['RecipeSummary']['publish_month']);
                                         $today = new DateTime();
                                         if($today > $displayFrom){
                                             $displayFrom = $today;
                                         }
                                         $displayFrom = $displayFrom->format("Y-m-d");
                                         
                                         $this->Payment->set(array(
                                                 'item_id'=> $id,
                                                 'category'=> 'Recipe',
                                                 'display_from'=> $displayFrom,
                                                 'recipe_access_level'=> $subscription['level'],
                                                 'trans_type'=> 'subscription',
                                                 'user_id' => $user['User']['id'],
                                         )
                                         );
                                         if(!$this->Payment->save()){
                                             throw new Exception();
                                         }
                                     }
                                 }
                             
                             $datasource->commit();
                             $this->__recipeFileUpload('recipe', $data['Recipe']['hash'], $id);
                             $this->Session->setFlash('レシピを追加しました。', 'default', array('class'=>'message success'));
                             $this->redirect(array( 'action'=>'admin_index'));
                             exit;
                         }
                         
                     }catch(Exception $e){
                         $datasource->rollback();
                     }
                 }
        }
        $this->set('summary_list', $this->__createSummaryList());
        $this->set('categories', $this->__createRecipeCategoryDropDown());
        $this->set('title', 'レシピの新規登録');
        $this->set('fileError', $fileError);
        $this->set('edit', false);
        $this -> render('edit');
    }
    
    function delete(){
        $this->_auth('admin');
        if($this->request->is('POST') || $this->request->is('PUT')){
            $this->Recipe->id = $this->data['Recipe']['id'];
           $this->Recipe->delete();
            $this->Session->setFlash('レシピが削除されました。', 'default', array('class'=>'message success'));
            $this->redirect(array( 'action'=>'admin_index'));
            exit;
        }
    }
    function admin_top_preview($id = null){
        $this->_auth('admin');
        if(empty($id)){
            $this->Session->setFlash('もう一度やり直してください。', 'default', array('class'=>'message error'));
            $this->redirect(array( 'action'=>'admin_index'));
        }
        $summary = $this->RecipeSummary->find('all', array(
                'joins'=>array(
                        array('table'=>'recipes',
                                'alias'=>'Recipe',
                                'type'=>'left',
                                'conditions'=>array('Recipe.summary_id = RecipeSummary.id', 'Recipe.is_public = 1')),
                        array('table'=>'recipe_categories',
                                'alias'=>'RecipeCategory',
                                'type'=>'left',
                                'conditions'=>array('Recipe.category_id = RecipeCategory.id')),
                        array('table'=>'payments',
                                'alias'=>'Payment',
                                'type'=>'left',
                                'conditions'=>array('Payment.item_id = Recipe.id','Payment.category' => 'Recipe', 'Payment.user_id' => $this->_logged_user['id'], 'Payment.isDeleted=0')
                        ),
                ),
                'conditions' => array(
                        'RecipeSummary.id' => $id
                ),
                'fields' => array('Recipe.*', 'RecipeSummary.*', 'RecipeCategory.*','Payment.*'),
                'order' => 'RecipeSummary.publish_month DESC, Recipe.sortorder ASC',
        ));
        
       
        if(empty($summary)){
            throw new Exception();
        }
        $top_image_file = $summary[0]['RecipeSummary']['id'] . '.jpg';
        $newestSummaryPublishDate = new DateTime($summary[0]['RecipeSummary']['publish_month']);
        
        $this->set('summary_recipes', $summary);
        $this->set('title', 'RECIPE PREVIEW');
        $this->set('top_summary_hash', $summary[0]['RecipeSummary']['hash']);
        $this->set('top_image_file', $top_image_file);
    }
}