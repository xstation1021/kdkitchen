<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    protected $_logged_user = NULL;
    protected $_settings = array();
    protected $_imap = NULL;
    protected $_validator_path = '/Elements/validator';
    protected $_subscribed = false;
    
    public $components = array (
            'Cookie',
            'Session'
    );
    
    var $uses = array (
            'User'
    );

    function beforeRender() {
        $this->_getValidation();
    }

    function beforeFilter() {
        $this->_checkLogin();
        $this->_imap = Configure::read('input_name_map');
        $this->set('imap', $this->_imap);
        $this->set('logged_user', $this->_logged_user);
        $this->__loadSettings();
        $this->set('settings', $this->_settings);
        
        if(!empty($this->_logged_user) && $this->_logged_user['is_admin'] == 0){
            $subscribed = $this->checkUserSubscription($this->_logged_user['id']);
            if(!empty($subscribed)){
                $this->_subscribed = true;
                $shopping_cart = $this->Cookie->read('shoppingcart');
                if(!isset($shopping_cart['loggin_id']) || $this->_logged_user['id'] != $shopping_cart['loggin_id']){
                    $shopping_cart = array('loggin_id' => $this->_logged_user['id']);
                    $this->Cookie->write ( 'shoppingcart', $shopping_cart, true, time () + 3600 );
                } 
               
                $shopping_cart_count = (isset($shopping_cart['items']) ? count($shopping_cart['items']) : 0);
                $this->set('subscribed', $this->_subscribed);
                $this->set('shopping_cart_count', $shopping_cart_count);
            }
        }
    }

    protected function __loadSettings() {

    //    if(array() == $this->_settings = $this->Session->read('settings')) {

            $this->loadModel('Setting');
            $settings = $this->Setting->find('all');
            foreach($settings as $setting) {
                $this->_settings[$setting['Setting']['key']] = $setting['Setting']['value'];
            }
       //     $this->Session->write('settings', $this->_settings);
      //  }
    }
    
    protected function _auth($type = 'admin', $redirect = True) {
        if('admin' == $type && $this->__isAdmin()) {
            return True;
        } else if('chef' == $type && $this->_logged_user) {
            return True;
        }

        if($redirect) {
            $this->Session->setFlash('アクセスは許可されていません。', 'default', array('class'=>'message error'));
            $this->redirect($this->referer());
            exit;
        }
    }

    private function __isAdmin() {

        if(isset($this->_logged_user['is_admin']) && $this->_logged_user['is_admin']) {
            return True;
        }

        return False;
    }

    protected function _checkLogin() {
        if($this->_logged_user = $this->Session->read('logged_user')) {
            unset($this->_logged_user['User']['password']);
            $this->_logged_user = $this->_logged_user['User'];
            return True;
        }
        return False;
    }

    protected function _persistValidation() {
        $name = Inflector::singularize($this->name);
        $this->Session->write('validation', array('model'=>$name, 'errors'=>$this->$name->validationErrors));
    }

    protected function _getValidation($name=NULL) {
        if($name==NULL) {
            $name = Inflector::singularize($this->name);
        }

        if($validation = $this->Session->read('validation')) {
            $this->Session->delete('validation');
            //$this->$validation['model']->validationErrors = $validation['errors'];
            $this->loadModel($validation['model']);
            foreach($validation['errors'] as $field=>$msg) {
                $this->$validation['model']->invalidate($field, $msg[0]);
            }
        }
    }

    protected function _processIframeForm($errors, $data, $redirect='/') {
        $model = NULL;
        if(isset($data['_model'])) {
            $model = $data['_model'];
        }

        $form_id = NULL;
        if(isset($data['_form_id'])) {
            $form_id = $data['_form_id'];
        }

        $this->set('model', $model);
        $this->set('form_id', $form_id);
        $this->set('errors', $errors);
        $this->set('redirect', $redirect);
        $this->layout = False; 
        $this->render($this->_validator_path); 
    }
    protected function checkUserSubscription($id = null ){
        $data = $this->User->getSubscriptionUserList($id);
        $subscribed = array();
        if(!empty($data['UserSubscription'])){
            $today = new DateTime(date("Y-m-d"));
            foreach($data['UserSubscription'] as $item){
                $from_date = new DateTime($item['from_date']);
        
                $to_date  = null;
                if(!empty($item['to_date'])){
                    $to_date = new DateTime($item['to_date']);
                }
                if($today >= $from_date && ($to_date == null || $to_date >= $today)){
                    $subscribed = $item;
                }
            }
        }
        return $subscribed;
    }
    protected function __getContents($keys) {
        $records = $this->Content->find ( 'all', array (
                'conditions' => array (
                        'Content.key' => $keys
                )
        ) );
    
        $return = array ();
        foreach ( $records as $record ) {
            $return [$record ['Content'] ['key']] = $record ['Content'] ['value'];
        }
        return $return;
    }
    
}
