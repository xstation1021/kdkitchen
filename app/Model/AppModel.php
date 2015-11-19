<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
App::uses('Security', 'Utility');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    protected $_imap; 
    var $actsAs = array('Containable');

    function __construct($id = false, $table = null, $ds = null) { 
        parent::__construct($id, $table, $ds); 
        $this->recursive = -1;

        $this->_imap = Configure::read('input_name_map');
    }

    function beforeValidate($options=array()) {

        // Anti Spam
        $imap = Configure::read('input_name_map');
        
        foreach($imap as $fieldname=>$code) {
            if(isset($this->data[$this->name][$code])) {
                $this->data[$this->name][$fieldname] = $this->data[$this->name][$code];
                unset($this->data[$this->name][$code]);
            }
        }

    }
    function afterValidate() {
        $imap = Configure::read('input_name_map');
        
        foreach($imap as $fieldname=>$code) {
            if(isset($this->validationErrors[$fieldname])) {
                $this->validationErrors[$code] = $this->validationErrors[$fieldname];
            }
        }
    }

    function checkUnique($data, $fields) {
        if (!is_array($fields)) {
            $fields = array($fields);
        }
      
        foreach($fields as $key) {
            $tmp[$key] = $this->data[$this->name][$key];
        }
                     
        if (isset($this->data[$this->name][$this->primaryKey])) {
            $tmp[$this->primaryKey] = "<>".$this->data[$this->name][$this->primaryKey];
        }
                                
        return $this->isUnique($tmp, false);
    }

    function hashString($string, $method='sha256', $salt=true) {
        $hash = Security::hash($string, $method, $salt);
        return $hash;
        
    }

    function createIdValuePair($result, $valueKey='value') {
        $tmp = array();
        foreach($result as $r) {
            $tmp[$r[key($r)]['id']] = $r[key($r)][$valueKey];
        }
        return $tmp;
    }
}
