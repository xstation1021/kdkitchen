<?php
App::uses ( 'AppController', 'Controller' );
class PaymentsController extends AppController {
    public $components = array (
            'Cookie',
            'Security' 
    );
    var $uses = array (
            'Recipe',
            'Payment' , 'User', 'Email'
    );

    function beforeFilter() {
        parent::beforeFilter ();
        if($this->_logged_user == null){
           $this->__purchase_error();
        }

        $this->_auth ( 'chef' );
 
        $this->Security->unlockedActions = array (
                'review', 'delete', 'add_transaction', 'edit_transaction'
        );
        if (empty ( $_SERVER ['HTTPS'] )) {
            $this->forceSSL ();
        }
        if($this->_logged_user['is_admin'] != 1){
            $subscribed = $this->_subscribed;
            if(empty($subscribed)){
                $this->Session->setFlash ( 'このページにはアクセスできません。', 'default', array (
                        'class' => 'message error'
                ) );
                return $this->redirect ( 'http://' . env ( 'SERVER_NAME' ) . '/recipes/index' );
            }
        }
    }
    private function __purchase_error() {
        $this->Session->setFlash ( 'もう一度やり直してください。', 'default', array (
                'class' => 'message error' 
        ) );
        return $this->redirect ( 'http://' . env ( 'SERVER_NAME' ) . '/recipes/index' );
    }
    private function forceSSL() {
        $param = "";
        if(!empty($_GET)){
            foreach($_GET as $index => $get){
                if($index == 'url'){
                    continue;
                }
                if(empty($param)){
                    $param .= '?';
                } else {
                    $param .= '&';
                }
                $param .= $index . '=' . $get;           
            }
        }
        return $this->redirect ( 'https://' . env ( 'SERVER_NAME' ) . $this->here . $param );
    }
    
    //index 0 is category; index 1 is item id
    private function __parse_shopping_cookie($shopping_cart_cookie){
        $pieces = explode("_", $shopping_cart_cookie);
        if(count($pieces)!=2){
        	throw new Exception();
        }
        return $pieces;
    }
    
    function addcart(){
        $item_id = $_GET['id'];
        $item_type= $_GET['type'];
        $shopping_cart = $this->Cookie->read('shoppingcart');
     
        if(empty($shopping_cart) || !is_array($shopping_cart)){
            $shopping_cart = array('login_id' => $this->_logged_user['id']);
        } 
        if(!isset($shopping_cart['items'])){
            $shopping_cart['items'] = array();
        }
        $isExist = false;
        foreach($shopping_cart['items'] as $item){
            if($item['id'] == $item_id && $item['type'] == $item_type){
                $isExist = true;
            }
        }
        if(!$isExist){
            $shopping_cart['items'][] = array('id' => $item_id, 'type' => $item_type);
        }
        $this->Cookie->write ( 'shoppingcart', $shopping_cart, true, time () + 3600 );
        return $this->redirect(
                array('action' => 'purchase')
        );
    }
    
    function purchase() {
        $shopping_cart_cookie = $this->Cookie->read ( 'shoppingcart' );
        $shopping_cart = array();
        $recipe_price = (double)Configure::read ( 'recipe_price' );
        if(isset($shopping_cart_cookie['items'])){
            foreach($shopping_cart_cookie['items'] as $index => $item){
                $this->Recipe->id = $item['id'];
                $recipe = $this->Recipe->read();
                $img_path = '/uploads/recipe/'.$recipe['Recipe']['hash'] . '/disp/recipe'. $recipe['Recipe']['id'].'.jpg';
                $item['image'] = $img_path;
                $item['name'] = $recipe['Recipe']['title'];
                $shopping_cart[] = $item;
            }
        }
        

        $this->set ( 'title', '購入画面' );
        $this->set('data', $shopping_cart);
        $this->set('recipe_price', $recipe_price);
    }
    
    function remove_from_cart(){
        $item_id = $_GET['id'];
        $item_type= $_GET['type'];
        $shopping_cart = $this->Cookie->read('shoppingcart');
        
        foreach($shopping_cart['items'] as $index => $item){
            if($item['id'] == $item_id && $item['type'] == $item_type){
                unset($shopping_cart['items'][$index]);
            }
        }
        $item = (!empty($shopping_cart)? $shopping_cart : null);
        
        $this->Cookie->write ( 'shoppingcart', $item, true, time () + 3600 );
        return $this->redirect(
                array('action' => 'purchase')
        );
    }
    
    function paypal($method = null) {
        $shopping_cart_cookie = $this->Cookie->read ( 'shoppingcart' );
        $shopping_category =  Configure::read ( 'shopping_category_to_initial' );
        if (!isset ( $shopping_cart_cookie['items'] ) || empty ( $shopping_cart_cookie['items'] )) {
            $this->log($this->_logged_user['id'] . ' Shopping cart empty function paypal()', 'error');
            $this->__purchase_error ();
        }
        $shopping_cart = array();
        foreach($shopping_cart_cookie['items'] as $index => $item){
            $this->Recipe->id = $item['id'];
            $recipe = $this->Recipe->read();
            $item['title'] = $recipe['Recipe']['title'];
            $shopping_cart[] = $item;
        }
        $paypal_api_username = Configure::read ( 'paypal_api_username' );
        $paypal_api_password = Configure::read ( 'paypal_api_password' );
        $paypal_api_signature = Configure::read ( 'paypal_api_signature' );
        $payap_returnUrl = Configure::read ( 'paypal_returnUrl' );
        $payap_cancelUrl = Configure::read ( 'paypal_cancelUrl' );
        $payap_url2 = Configure::read ( 'paypal_url2' );
        
        $recipe_price = (double)Configure::read ( 'recipe_price' );
        
        $item_total = 0;
        $tax_total = 0;
        $total = 0;
        $tax = round((double)Configure::read ( 'us_tax' ) * $recipe_price, 2);
        

        $params = array (
                'method' => 'SetExpressCheckout',
                'returnUrl' => $payap_returnUrl,
                'cancelUrl' => $payap_cancelUrl,
                'version' => '106',
                'user' => $paypal_api_username,
                'pwd' => $paypal_api_password,
                'signature' => $paypal_api_signature,
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
                'NOSHIPPING' => 1,
        );
        
        foreach($shopping_cart as $index => $item){
            $recipe_number =  $shopping_cart[$index]['type']. '#'.$shopping_cart[$index]['id'];
            $params['L_PAYMENTREQUEST_0_NAME' . $index] = $item['title'];
            $params['L_PAYMENTREQUEST_0_QTY' . $index] = 1;
            $params['L_PAYMENTREQUEST_0_AMT' . $index] = $recipe_price;
            $params['L_PAYMENTREQUEST_0_NUMBER' . $index] = $recipe_number;
            $params['L_PAYMENTREQUEST_0_TAXAMT' . $index] = $tax;
            $item_total += $recipe_price;
            $tax_total += $tax;
            $total += $recipe_price + $tax;
        }
        $params['PAYMENTREQUEST_0_AMT']= $total;
        $params['PAYMENTREQUEST_0_ITEMAMT']= $item_total;
        $params['PAYMENTREQUEST_0_TAXAMT']= $tax_total;
        $params['PAYMENTREQUEST_0_CURRENCYCODE']= 'USD';
        
        if ($method == "creditcard") {
            $params ['SOLUTIONTYPE'] = 'Sole';
            $params ['LANDINGPAGE'] = 'Billing';
        }
        $result = $this->__paypalClassicApi ( $params );
        $acceccToken = $result ["TOKEN"];
        header ( "Location:$payap_url2/cgi-bin/webscr?cmd=_express-checkout&token=$acceccToken" );
        exit ();
    }
    private function __paypalClassicApi($params) {
        $url = Configure::read ( 'paypal_url' );
        try {
            $ch = curl_init ( $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query ( $params ) );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 1 );
            curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 2 );
            curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
            $response = curl_exec ( $ch );
            if ($response == false) {
                throw new Exception ( curl_error ( $ch ), curl_errno ( $ch ) );
            }
            curl_close ( $ch );
        } catch ( Exception $e ) {
            
            $this->log($this->_logged_user['id'] . ' __paypalClassiApi()' . $e, 'error');
            trigger_error ( sprintf ( 'Curl failed with error #%d: %s', $e->getCode (), $e->getMessage () ), E_USER_ERROR );
        }
        $httpResponseAr = explode ( "&", $response );
        $result = array ();
        foreach ( $httpResponseAr as $item ) {
            $item1 = explode ( "=", $item );
            $result [$item1 [0]] = urldecode ( $item1 [1] );
        }
        
        if (isset ( $result ['ACK'] ) && strtolower($result ['ACK']) == 'success') {
            return $result;
        } else{
            $this->log($this->_logged_user['id'] . ' ACK was not success', 'error');
            $this->__purchase_error ();
        }
    }

    function review() {
        if(!$this->Session->check($_GET['token'])){
            $this->Session->write($_GET['token'], 'InProgress');
        } else {
            if($this->Session->read($_GET['token']) == 'canceled')
            return $this->redirect ( 'http://' . env ( 'SERVER_NAME' ) . '/recipes/index' );
        }
        
        if ($this->request->is ( 'POST' ) || $this->request->is ( 'PUT' )) {
            $submit = $this->data['submit'];
            if($submit == 'cancel'){
                $this->Session->write($_GET['token'], 'canceled');
                return $this->redirect ( 'http://' . env ( 'SERVER_NAME' ) . '/recipes/index' );
            }
        }
        $paypal_api_username = Configure::read ( 'paypal_api_username' );
        $paypal_api_password = Configure::read ( 'paypal_api_password' );
        $paypal_api_signature = Configure::read ( 'paypal_api_signature' );
        
        $params = array (
                'method' => 'GetExpressCheckoutDetails',
                'version' => '106',
                'user' => $paypal_api_username,
                'pwd' => $paypal_api_password,
                'signature' => $paypal_api_signature,
                'token' => $_GET ['token'] 
        );
        $shopping_items = array();
        $result = $this->__paypalClassicApi ( $params );
        
        $paypal_item_number = 0;
        
        while($paypal_item_number < 1000){
            if(isset($result['L_NUMBER' . $paypal_item_number])){
                $item_data = $result['L_NUMBER' . $paypal_item_number];
                // index  0 type, 1 ID
                $pieces = explode('#', $item_data);
                $buyable = $this->Payment->checkIfBuyable($pieces[1]);
                if($buyable == false){
                    $this->__purchase_error();
                }
                $shopping_items[] = array('id' => $pieces[1], 'type' => 'recipe');
            } else {
                break;
            }
            $paypal_item_number++;
        }
        
        if(!isset($result['CHECKOUTSTATUS']) || $result['CHECKOUTSTATUS'] == 'PaymentActionCompleted'){
            $this->log($result, 'error');
            $this->log($this->_logged_user['id'] . ' review function error 2', 'error');
            $this->__purchase_error ();
        }

        if ($this->request->is ( 'POST' ) || $this->request->is ( 'PUT' )) {
            $shopping_items = array();
            $item_names = array();
            $paypal_item_number = 0;
            while($paypal_item_number < 1000){
                if(isset($result['L_NUMBER' . $paypal_item_number])){
                    $item_data = $result['L_NUMBER' . $paypal_item_number];
                    $amount = $result['L_PAYMENTREQUEST_0_AMT' . $paypal_item_number];
                    $tax = $result['L_PAYMENTREQUEST_0_TAXAMT' . $paypal_item_number];
                    $item_names[] = $result['L_PAYMENTREQUEST_0_NAME' . $paypal_item_number];
                    $pieces = explode('#', $item_data);
                    $shopping_items[] = array('id' => $pieces[1], 'type' => $pieces[0], 'amount' => $amount, 'tax' => $tax);
                } else {
                    break;
                }
                $paypal_item_number++;
            }
            $this->log('Payment Transaction start','debug');
            $currency = $result['CURRENCYCODE'];
            $params = array (
                    'user' => $paypal_api_username,
                    'pwd' => $paypal_api_password,
                    'signature' => $paypal_api_signature,
                    'method' => 'DoExpressCheckoutPayment',
                    'version' => '106',
                    'token' => $_GET ['token'],
                    'PAYERID' => $_GET ['PayerID'],
                    'PAYMENTREQUEST_0_AMT' => $result['AMT'],
                    'PAYMENTREQUEST_0_CURRENCYCODE' => $result ['CURRENCYCODE'],
                    'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale' 
            );
            $result1 = $this->__paypalClassicApi ( $params );
            $dataSource = $this->Payment->getDataSource();
            try{
                $dataSource->begin();
                foreach($shopping_items as $shopping_item){
                    $category = $shopping_item['type'];
                    $category = ucfirst($category);
                    $amount = $shopping_item['amount'] + $shopping_item['tax'];
                    $this->Payment->create ();
                    $this->Payment->set ( array (
                            'item_id' => $shopping_item['id'],
                            'user_id' => $this->_logged_user ['id'],
                            'trans_type' => 'purchased',
                            'amount' => $amount,
                            'currency' => $currency,
                            'category' => $category ,
                            'recipe_access_level' => 2,
                            'display_from' => DboSource::expression('NOW()')
                    ) );
                    if(!$this->Payment->save()){
                        throw new Exception();
                    }
                }
               $dataSource->commit();
            }catch(Exception $e){
                $this->log('Payment Transaction error','error');
                $this->__purchase_error();
            }
            $this->__email_transaction_complete($this->_logged_user['display_name'], $item_names);
            $shopping_cart = array('loggin_id' => $this->_logged_user['id']);
            $this->Cookie->write ( 'shoppingcart', $shopping_cart, true, time () + 3600 );
            $this->log('Payment Transaction ends','debug');
            $this->Session->setFlash ( 'レシピ購入を完了しました。', 'default', array (
                    'class' => 'message success' 
            ) );
            $this->redirect ( array (
                    'controller' => 'recipes',
                    'action' => 'complete_purchase' 
            ) );
        }
        foreach($shopping_items as $index=>$item){
            $this->Recipe->id = $item['id'];
            $recipe = $this->Recipe->read();
            $img_path = '/uploads/recipe/'.$recipe['Recipe']['hash'] . '/disp/recipe'. $recipe['Recipe']['id'].'.jpg';
            $shopping_items[$index]['image'] = $img_path;
            $shopping_items[$index]['name'] = $recipe['Recipe']['title'];
        }
        
        $this->set ( 'details', $result );
        $this->set ( 'title', "確認ページ" );
        $this->set('data', $shopping_items);
    }
    
    private function __email_transaction_complete($display_name, $item_names) {
            $user = $this->User->findById(1);
            $from = $user['User']['email'];
            $phone = "";
            $body = $display_name. "が、" . implode(', ', $item_names). "を購入しました";
            $name = "KD Kitchen";
            $to = 'info@kdkitchen.com';
            $subject = Configure::read('kd_kitchen_Payment');
            $context_vars = array(
                    'name'=>$name,
                    'email'=>$from,
                    'phone'=>$phone,
                    'body'=>$body
            );
    
            if($this->Email->send($from, $to, $subject, $body, $name, null, $context_vars)) {
            } else {
                $this->log('Email sent failed: Payment Controller', 'error');
            }
    }
    function complete() {
        $this->set ( 'title', "購入完了。" );
    }
    
    function view_transaction($id=null){
        $this->_auth('chef');
        if($id == null){
            throw new Exception();
        }
        $this->User->id = $id;
        $user = $this->User->read();
        
        $today = new DateTime(date("Y-m-d"));
        $today = $today->format("Y-m-d");
        $list=$this->Payment->find('all', array(
                'joins' => array(
                        array('table'=>'recipes',
                                'alias'=>'Recipe',
                                'type'=>'left',
                                'conditions'=>array('Recipe.id = Payment.item_id')),
    
                ),
                'conditions' => array('user_id' => $id, 'Payment.isDeleted = 0' , 'Payment.display_from <=' => $today, 'Recipe.id is not null'),
                'order' => 'Payment.display_from desc',
                'fields' =>array('Recipe.*', 'Payment.*')
        ));
        $this->set('user', $user);
        $this->set('list', $list);
    }
    
    function user_recipe() {
        $list=$this->User->find('all', array(
                'conditions' => array('is_admin = 0')
        ));
        $this->set('user_list', $list);
    
    }
    
    // $id  = transaction ID
    function edit_transaction($id=null){
        $this->_auth('admin');
        $this->Payment->id = $id;
        $payment = $this->Payment->read();
        if($this->request->is('POST') || $this->request->is('PUT')){
            if($this->data['Payment']['trans_type']=='adjustment'){
            $this->Payment->set('currency',null);
            }
            else{
                $this->Payment->set('currency','JPY');
            }
            if($this->Payment->save($this->data)){
    
                $this->Session->setFlash('保存されました', 'default', array('class'=>'message success'));
                $this->redirect(array( 'action'=>'view_transaction', $payment['Payment']["user_id"]));
                exit;
            }
        }
        else{
            $this->data=$payment;
        }
    
        $transaction_type_list = $this->__getTransTypeList();
        
        $recipe_list =  $this->__getGettableRecipeList($id, $payment);
        
        $this->set('title','New');
        $this->set('recipe_list', $recipe_list);
        $this->set('transaction_type_list', $transaction_type_list);
        $this->render('edit_transaction');
    }
    
    private function __getGettableRecipeList($id, $payment = null){
        if($payment != null){
            $id = $payment['Payment']['user_id'];
        }
        $user = $this->User->findById($id);
        if($payment != null){
            $payments=$this->Recipe->find('all', array(
                    'joins' => array(
                            array('table' =>'payments',
                                    'alias' => 'Payment',
                                    'type' => 'left',
                                    'conditions' => array('Payment.item_id = Recipe.id', 'Payment.user_id' =>  $payment['Payment']["user_id"], 'Payment.category ' =>'Recipe', 'Payment.isDeleted=0')
                            ),
                            array('table' =>'recipe_summaries',
                                    'alias' => 'RecipeSummary',
                                    'type' => 'inner',
                                    'conditions' => array('RecipeSummary.id = Recipe.summary_id')
                            )
                    ),      
                    'conditions' => array( "OR" =>array ("Payment.user_id is null", 'Payment.id' => $payment['Payment']['id'])),
                    'fields'=>array('id','title'))
            );
        } else {
            $payments=$this->Recipe->find('all', array(
                    'joins' => array(
                            array('table' =>'payments',
                                    'alias' => 'Payment',
                                    'type' => 'left',
                                    'conditions' => array('Payment.item_id = Recipe.id', 'Payment.user_id' => $id, 'Payment.category ' =>'Recipe','Payment.isDeleted=0')
                            ),
                            array('table' =>'recipe_summaries',
                                    'alias' => 'RecipeSummary',
                                    'type' => 'inner',
                                    'conditions' => array('RecipeSummary.id = Recipe.summary_id')
                            )
                    ),      'conditions' => array(  'Payment.user_id is null'),
                    'fields'=>array('id','title'))
            );
        }
        
        $payment_list=array();
        foreach($payments as $payment){
            $payment_list[$payment['Recipe']['id']] = $payment['Recipe']['title'];
        }
        return $payment_list;
    }
    private function __getTransTypeList(){
        $transaction_type_list = array();
        $transaction_type_list['adjustment'] = 'adjustment';
        $transaction_type_list['purchased'] = 'purchased';
        $transaction_type_list['subscription'] = 'subscription';
        return $transaction_type_list;
    }
    
    // $id = user id
    function add_transaction($id=null){
        $this->_auth('admin');
        if($this->request->is('POST') || $this->request->is('PUT')){
            $this->Payment->set('user_id', $id);
            $this->Payment->set('display_from', date("Y-m-d"));
            //$this->Payment->set('trans_type', 'adjustment');
            $this->Payment->set('category', 'Recipe');
            if($this->data['Payment']['trans_type']=='adjustment'){
                $this->Payment->set('currency',null);
            }
            else{
                $this->Payment->set('currency','JPY');
            }
            if($this->Payment->save($this->data)){
                $this->Session->setFlash('レコードを追加しました。', 'default', array('class'=>'message success'));
                $this->redirect(array( 'action'=>'view_transaction', $id));
                exit;
            }
        }
        $transaction_type_list = $this->__getTransTypeList();
        $recipe_list=$this->__getGettableRecipeList($id);

        $this->set('title','New');
        $this->set('recipe_list', $recipe_list);
        $this->set('transaction_type_list', $transaction_type_list);
        $this->render('edit_transaction');
    }
    
    function delete(){
        if($this->request->is('POST') || $this->request->is('PUT')){
            $this->Payment->id = $this->data['Payment']['id'];
            $this->Payment->set('isDeleted', 1);
            $this->Payment->save();
    
            $this->Session->setFlash('レシピが削除されました。', 'default', array('class'=>'message success'));
            $this->redirect(array( 'action'=>'user_recipe'));
            exit;
        }
    }
}