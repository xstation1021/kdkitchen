<?php
App::uses('AppController', 'Controller');

class UserPagesController extends AppController {

/*
    public $helpers = array(
        'HtmlPurifier.HtmlPurifier' => array(
        'config' => 'UserPageInfo'
        )
    );
 */
    public $actsAs = array(
        'Uploader.Attachment'
    );
    var $uses = array('User', 'UserPage', 'UserPageAddress',  'UserAccount', 'Attachment', 'Region', 'RegionPrefecture', 'SocialMedia');

    public $paginate = array(
        'recursive'=>-1,
        'order' => array(
            'UserPage.sortorder' => 'asc'
        ),
        'conditions'=>array('UserPage.is_public'=>1),
        'limit' => 25,
        'joins'=>array(
            array('table'=>'users', 
                'alias'=>'User', 
                'type'=>'left', 
                'conditions'=>array('User.id = UserPage.user_id')), 
           
            array('table'=>'user_page_addresses', 
                'alias'=>'UserPageAddress', 
                'type'=>'left', 
                'conditions'=>array('UserPage.id = UserPageAddress.user_page_id')), 
            array('table'=>'region_prefectures',
                    'alias'=>'RegionPrefecture',
                    'type'=>'left',
                    'conditions'=>array('RegionPrefecture.id = UserPageAddress.prefecture')),
            array('table'=>'attachments', 
                'alias'=>'Attachment', 
                'type'=>'left', 
                'conditions'=>array('Attachment.type = "profile"', 'Attachment.user_page_id = UserPage.id'))),
        'fields'=>array('UserPage.*', 'User.*', 'UserPageAddress.*', 'Attachment.*, RegionPrefecture.*')
    );

    function area($prefecture=NULL) {
        $contain = array('RegionPrefecture'=>array('conditions' => array(
        	'id IN (select distinct prefecture from user_page_addresses inner join user_pages on user_pages.id = user_page_addresses.user_page_id where user_pages.is_public = 1)'
        )));
        $regions = $this->Region->find('all',array(
                'recursive'=> -1, 
                'contain'=>$contain,
        ));
        $settings = $this->paginate;
        
        if($prefecture) {
            if($prefecture != "ALL"){
                foreach($settings['joins'] as $index=>$table) {
                    if('UserPageAddress' == $table['alias']) {
                        $settings['joins'][$index]['type'] = 'inner';
                        $settings['joins'][$index]['conditions'] = array('UserPage.id = UserPageAddress.user_page_id', "UserPageAddress.prefecture = '".$prefecture."'");
                        }
                }
            }
        } 
        $this->paginate = $settings;
        $data = $this->paginate('UserPage');
        $this->set('data', $data);
        $this->set('prefecture', $prefecture);
        $this->set('area_options', Configure::read('area_options'));
        $this->set('title', 'KD KITCHEN インストラクター');
        $this->set('regions',$regions);
    }
    


    function __set_attachments() {
        $attachments = array('profile'=>array(), 'food'=>array());
        if(isset($this->data['Attachment'])) {
            foreach($this->data['Attachment'] as $attachment) {
                if('profile' == $attachment['type']) {
                    array_push($attachments['profile'], $attachment);
                } else if('food' == $attachment['type']) {
                    array_push($attachments['food'], $attachment);
                }
            }
        }
        $this->set('attachments', $attachments);
    }
    
    function oauth2callback(){
        
        
        $client = $this->getGoogleClient();
       
        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            
            $client->authenticate($_GET['code']);
            $token = $client->getAccessToken();
            $googleApiData = $this->getGoogleApiData();
            
            if(empty($googleApiData)){
                $this->SocialMedia->create();
                $this->SocialMedia->set('name', 'google_api');
            } else{
                $this->SocialMedia->id = $googleApiData['SocialMedia']['id'];
            }
            
            $this->SocialMedia->set('data', $token);
            $this->SocialMedia->save();
            $this->redirect($redirect);
            exit;
        }
    }
    
    private function getGoogleClient(){
        $client_id =  Configure::read ( 'google_client_id' );
        $client_secret =  Configure::read ( 'google_client_secret' );
        $redirect_uri =  Configure::read ( 'google_redirect_url' );
        
        $client = new Google_Client();
        $client->setApplicationName("kdkitchen");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope(implode(' ', array(Google_Service_Calendar::CALENDAR_READONLY)));
        $client->setAccessType("offline");
        
        $googleApiData = $this->getGoogleApiData();
        
        if (!empty($googleApiData)) {
            $this->SocialMedia->id = $googleApiData['SocialMedia']['id'];
            $accessToken = $googleApiData['SocialMedia']['data'];
        } else {
            if(isset($_GET['code'])){
                $authCode = $_GET['code'];
            } else {
                $authUrl = $client->createAuthUrl();
                $_SESSION['redirect'] = $this->request->url;
                header('Location: ' . $authUrl);
                exit;
            }
            $accessToken = $client->authenticate($authCode);
            $this->SocialMedia->create();
            $this->SocialMedia->set('name', 'google_api');
            $this->SocialMedia->set('data', $accessToken);
            $this->SocialMedia->save();
            
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            $this->redirect($redirect);
            exit;
        }
        $client->setAccessToken($accessToken);
        
        if ($client->isAccessTokenExpired()) {
            if(!isset($googleApiData) || empty($googleApiData)){
                $googleApiData =  $this->getGoogleApiData();
                $this->SocialMedia->id = $googleApiData['SocialMedia']['id'];
            }
            $client->refreshToken($client->getRefreshToken());
            $this->SocialMedia->set('data', $client->getAccessToken());
            $this->SocialMedia->save();
        }
        
        return $client;
    }
    
    
    private function getGoogleApiData(){
        $data = $this->SocialMedia->find ( 'first', array (
                'conditions' => array (
                        'name' => 'google_api'
                )
        ) );
        
        return $data;
    }

    function view($id) {
        
        $this->UserPage->id = $id;
        $this->UserPage->recursive = 1;
        $data = $this->UserPage->read();
        
        if(true){
            $client = $this->getGoogleClient();
            $service = new Google_Service_Calendar($client);
            $calendarId = $data['User']['email'];
            $optParams = array();
        
            $results = $service->events->listEvents($calendarId, $optParams);
        
            $calendarData = array();
           
            foreach($results->items as $item){
                if(empty($item->start->dateTime)){
                    continue;
                }
                $start = new DateTime($item->start->dateTime);
                $end = new DateTime($item->end->dateTime);
                $details = array();
                $details['summary'] = $item->summary;
                $details['when'] = $start->format("g:ia"). '-' .  $end->format("g:ia");
                if(!empty($item->location)){
                    
                    $details['where'] =  $item->location;
                }
                if(!empty($item->description)){
                    $details['description'] =  $item->description;
                }
                if(!isset($calendarData[$start->format("m-d-Y")])){
                    $calendarData[$start->format("m-d-Y")] = "";
                }
                $calendarData[$start->format("m-d-Y")] .= "<a>". $start->format("g:ia"). '-' .  $end->format("g:ia") . '<br>' . $item->summary. "</a><div class = 'hidden'>" . json_encode($details) . '</div>';
            }
            if(!empty($calendarData)){
                $this->set('calData', $calendarData);
            }
        }
        
        
        
        
       $this->RegionPrefecture->id = $data['UserPageAddress']['prefecture'];
       $this->RegionPrefecture->recursive = 0;
       $prefecture = $this->RegionPrefecture->read();
       
        $this->data = $data;
 
        
        if(empty($this->data)){
            throw new NotFoundException("the page doesn't exist");
        }
        $this->__set_attachments();
        $this->set('prefectureName', $prefecture['RegionPrefecture']['name']);
        $this->set('title', 'インストラクター紹介');
        $this->header('X-XSS-Protection: 0');
        $this->layout = 'responsive';
    }

    function __checkEditPermission($curdata) {

        if(!isset($curdata['UserPage'])) {
            $this->redirect(array('controller'=>'user_pages', 'action'=>'add'));
            exit;
        }

        if($curdata['UserPage']['user_id'] == $this->_logged_user['id']) {
            return True;
        }
        return False;
    }

    function edit($id=NULL) {
        $this->UserPage->id = $id;
        $curdata = $this->UserPage->read();
        
        if($curdata) {
            if(!$this->__checkEditPermission($curdata)) {
                $this->Session->setFlash('アクセスが禁止されています。', 'default', array('class'=>'message error'));
                $this->redirect('/');  
            }
        } else {
            if($this->UserPage->find('first', array('conditions'=>array('user_id'=>$this->_logged_user['id'])))) {
                $this->Session->setFlash('アクセスが禁止されています。', 'default', array('class'=>'message error'));
                $this->redirect('/');  
            }


            $maxSortNumberRecord = $this->UserPage->find('first', array(
                    'joins'=>array(
                            array('table'=>'users',
                                    'alias'=>'User',
                                    'type'=>'inner',
                                    'conditions'=>array('User.id = UserPage.user_id')
                            )
                    ),
                    'fields'=>array('MAX(UserPage.sortorder) AS max'),
            ));
            
            $this->UserPage->create();
            $this->UserPage->save(array('user_id'=>$this->_logged_user['id'],'sortorder'=>(int)$maxSortNumberRecord[0]['max'] + 1));
        }

        if($this->request->is('Put') || $this->request->is('Post')) {

            // Handle deleted attachments.
            $existing_item_id_list = $this->Attachment->getFileIdListByItemId($id);
            $attachments_to_keep = array();
            if(isset($this->data['Attachment']['keep'])) {
                $attachments_to_keep = $this->data['Attachment']['keep'];
            }
            $attachments_to_del = array_diff($existing_item_id_list, $attachments_to_keep);
            foreach($attachments_to_del as $attachment_id) {
                $this->Attachment->id = $attachment_id;
                $this->Attachment->delete();
            }

            if($this->UserPage->save($this->data)) {
                //$info = $this->HtmlPurifier->clean('testing', 'UserPageInfo');
                //print_r($info);exit;

                $data = $this->data;
                unset($data['Attachment']);
                $data['UserPageAddress']['user_page_id'] = $id;
                $address = $this->UserPageAddress->find('first', array('conditions'=>array('user_page_id'=>$id)));
                if($address) {
                    $this->UserPageAddress->id = $address['UserPageAddress']['id'];
                } else {
                    $this->UserPageAddress->create();
                }

                $this->UserPageAddress->save($data);
                
                $this->Attachment->data = $this->data;
                $this->Attachment->saveAttachment($curdata['UserPage']['hash'], $id);

                $this->Session->setFlash('ページを編集しました。', 'default', array('class'=>'message success'));
            }
            $this->redirect(array('controller'=>'user_pages', 'action'=>'view', $id));
            exit;
        }

        $this->UserPage->contain('Attachment', 'UserPageAddress', 'User');
        $data = $this->UserPage->read();
        if(isset($data['UserPageAddress'][0])) {
            $data['UserPageAddress'] = $data['UserPageAddress'][0];
        }
        
        if(isset($data['UserPage']['phone_number'])) {
            $data['UserPage']['phone_number'] = explode('-', $data['UserPage']['phone_number']);
        } else {
            $data['UserPage']['phone_number'] = array('', '', '');
        }

        if(isset($data['UserPageAddress']['zip'])) {
            $data['UserPageAddress']['zip'] = explode('-', $data['UserPageAddress']['zip']);
        } else {
            $data['UserPageAddress']['zip'] = array('', '');
        }
        $this->data = $data;
        
        $prefectures = $this->RegionPrefecture->find('all', array('fields'=>array('RegionPrefecture.id, RegionPrefecture.name')));

        $prefectureList = array();
        
        
        foreach($prefectures as $prefecture){
            $prefectureList[$prefecture['RegionPrefecture']['id']]= $prefecture['RegionPrefecture']['name'];
        }
        
        $this->__set_attachments();
        $this->set('title', 'マイページ編集');
        $this->set('area_options', Configure::read('area_options'));
        $this->set('prefectureList', $prefectureList);
    }

    function add() {
        if($this->request->is('POST')) {
            $data = $this->data;
            $data['UserPage']['user_id'] = $this->_logged_user['id'];
            if($this->UserPage->save($data)) {
                $inserted_id = $this->UserPage->lastInsertedId();
                $this->Session->setFlash('アカウントを作りました。', 'default', array('class'=>'message success'));
                $this->redirect(array('controller'=>'user_pages', 'action'=>'view', $inserted_id));
                exit;
            }
        }
        $this->set('title', 'Create User Page');
    }

}   
