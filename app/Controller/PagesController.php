<?php
use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org CakePHP(tm) Project
 * @package app.Controller
 * @since CakePHP(tm) v 0.2.9
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses ( 'AppController', 'Controller' );
App::import ( 'Vendor', 'Ctct\ConstantContact' );
App::import ( 'Vendor', 'Ctct\Components\Contacts\Contact' );

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    
    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';
    
    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array (
            'Utility',
            'Category',
            'Content' 
    );
    public $components = array (
            'Cookie' 
    );
    
    /**
     * Displays a view
     *
     * @param
     *            mixed What page to display
     * @return void
     */
    function beforeFilter() {
        parent::beforeFilter ();
        if (! empty ( $_SERVER ['HTTPS'] )) {
            $this->forceNonSSL ();
        }
    }
    private function forceNonSSL() {
        return $this->redirect ( 'http://' . env ( 'SERVER_NAME' ) . $this->here );
    }
    public function display() {
        
        $path = func_get_args ();
        $count = count ( $path );
        if (! $count) {
            $this->redirect ( '/' );
        }
        $page = $subpage = $title_for_layout = null;
        
        if (! empty ( $path [0] )) {
            $page = $path [0];
        }
        if (! empty ( $path [1] )) {
            $subpage = $path [1];
        }
        if (! empty ( $path [$count - 1] )) {
            $title_for_layout = Inflector::humanize ( $path [$count - 1] );
        }
        
        if($path[0] == 'kdtraining'){
            $keys = array (
                    'youtube_kdk_intro',
            );
            $data = $this->__getContents ( $keys );
            $this->set ( 'content', $data );
        }
        
        if($path[0] == 'workshops'){
            $this->layout = 'responsive';
        }
        
        $this->set ( compact ( 'page', 'subpage', 'title_for_layout' ) );
        $this->render ( implode ( '/', $path ) );
    }
    private function __tempPopup() {
        
        if ($this->Cookie->read ( 'popup' ) == null) {
            $this->Cookie->write ( 'popup', 'popup', false, 3600 );
            return true;
        } else {
            $this->Cookie->write ( 'popup', 'popup', false, 3600 );
            return false;
        }
    }
    public function addEmailToNewsLetter() {
        
         if ($this->request->is ('POST') || $this->request->is ( 'PUT' )) {
             
             $api_key = Configure::read ( 'constant_contact_key' );
             $api_token = Configure::read ( 'constant_contact_token' );
             $cc = new ConstantContact ( $api_key );
             // attempt to fetch lists in the account, catching any exceptions and printing the errors to screen
             try {
                 $lists = $cc->getLists ( $api_token );
             } catch ( Exception $ex ) {
                 throw new Exception();
             }
             // check if the form was submitted
                 $action = "Getting Contact By Email Address";
                 try {
                    
                     // check to see if a contact with the email addess already exists in the account
                     $response = $cc->getContactByEmail ( $api_token, $_POST['data']['email']);
                     // create a new contact if one does not exist
                     if (empty ($response->results)) {
                         $action = "Creating Contact";
                         $contact = new Contact();
                         $contact->addEmail ($_POST['data']['email']);
                         $contact->addList ('1339315632');
                         $contact->first_name = $_POST['data']['first_name'] ;
                         $contact->last_name = $_POST['data']['last_name'];
                         /*
                          * The third parameter of addContact defaults to false, but if this were set to true it would tell Constant Contact that this action is being performed by the contact themselves, and gives the ability to opt contacts back in and trigger Welcome/Change-of-interest emails. See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
                         */
                         $returnContact = $cc->addContact ( $api_token, $contact, true );
                         // update the existing contact if address already existed
                     } else {
                         $action = "Updating Contact";
                         $contact = $response->results[0];
                         $contact->addList ('1339315632');
                         $contact->first_name = $_POST['data']['first_name'] ;
                         $contact->last_name = $_POST['data']['last_name'];
                         $returnContact = $cc->updateContact ( $api_token, $contact, true );
                     }
                     // catch any exceptions thrown during the process and print the errors to screen
                 } catch ( Exception $ex ) {
                      $this->Session->setFlash('ニュースレターの配信登録に失敗しました。お問い合わせください。', 'default', array('class'=>'message error'));
                      $this->redirect('/'); 
                      exit;
                 }
                 if($returnContact){
                     $this->Session->setFlash('ニュースレターの配信登録を完了しました。', 'default', array('class'=>'message success'));
                     $this->redirect('/');
                 }
              exit;
         } else {
             throw new Exception();
         }
    }
    public function home() {
//         $data = array ();
//         $codes = array (
//                 'recipe',
//                 'report' 
//         );
//         foreach ( $codes as $code ) {
//             $conditions = array (
//                     'Category.code' => $code 
//             );
//             $contain = array (
//                     'Post' => array (
//                             'limit' => 1,
//                             'order' => array (
//                                     'Post.id' => 'desc' 
//                             ) 
//                     ) 
//             );
//             $this->Category->recursive = - 1;
//             $category = $this->Category->find ( 'first', array (
//                     'conditions' => $conditions,
//                     'contain' => $contain 
//             ) );
//             $recipe = NULL;
//             if (isset ( $category ['Post'] ) && isset ( $category ['Post'] [0] )) {
//                 $data [$code] = $category ['Post'] [0];
//             }
//         }
        
//         $keys = array (
//                 'youtube_home_id',
//                 'home_slider_link_1',
//                 'home_slider_link_2',
//                 'home_slider_link_3',
//                 'home_slider_link_4',
//         );
//         $data = $this->__getContents ( $keys );
//         $this->set ( 'content', $data );
        
        $temp = $this->__tempPopup ();

        $keys = array (
                'kdk_home_slide_1_line_1',
                'kdk_home_slide_1_line_2',
                'kdk_home_slide_2_line_1',
                'kdk_home_slide_2_line_2',
                'kdk_home_slide_3_line_1',
                'kdk_home_slide_3_line_2',
                'youtube_home_id',
        );
        $data = $this->__getContents ( $keys );
        $this->set ( 'content', $data );
        
        $this->set('white', true);
        $this->layout = 'responsive';
        $this->set ( 'popup', $temp );
//         $this->set ( compact ( 'page', 'subpage', 'title_for_layout', 'data' ) );
        $this->render ( 'home_responsive' );
    }
    public function downloadfile() {
        $this->viewClass = 'Media';
        // Render app/webroot/files/example.docx
        $params = array (
                'id' => 'Certification_Process.pdf',
                'name' => 'Certification_Process',
                'extension' => 'pdf',
                'path' => 'files' . DS 
        );
        $this->set ( $params );
    }
}
