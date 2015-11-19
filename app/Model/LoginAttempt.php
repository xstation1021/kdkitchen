<?php
App::uses('AppModel', 'Model');

//TODO Debug and refactor this class, because I rushed it.
class LoginAttempt extends AppModel {

    var $INTERVAL_MIN;
    var $ATTEMPT_LIMIT;
    var $LOCKOUT_MIN;

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->INTERVAL_MIN = Configure::read('login_inspection_interval_min');
        $this->ATTEMPT_LIMIT = Configure::read('login_attempt_limit');
        $this->LOCKOUT_MIN = Configure::read('login_lockout_min');
    }

    public $hasAndBelongsToMany = array(
        'Post' => array(
            'className' => 'Post'
        )   
    );

    var $inserted_ids = array();

    function record($username, $ip, $flag) {
        $rec = $this->find('first', array('conditions'=>array('username'=>$username, 'source_ip'=>$ip)));

        $interval_ts = '';
        $total_count = 0;
        if($rec) {
            
            $this->id = $rec['LoginAttempt']['id'];
            if($flag) {
                $this->saveField('total_count', $rec['LoginAttempt']['total_count'] + 1);
                $this->clear($rec['LoginAttempt']['id']);
                return;
            }

            $interval_ts = $rec['LoginAttempt']['interval_ts'];
            $total_count = $rec['LoginAttempt']['total_count'];

            if(empty($interval_ts)) {
               $ts_list = array(time()); 
            } else {
                $ts_list = explode(',', $interval_ts);
                array_push($ts_list, time());
            }
            
            if(count($ts_list) > $this->ATTEMPT_LIMIT) {
                $ts_list = array_slice($ts_list, -$this->ATTEMPT_LIMIT - 1);        
            }

            $this->data['LoginAttempt']['interval_ts'] = implode(',', $ts_list);
        } else {
            $this->create();
            $this->data['LoginAttempt']['interval_ts'] = time();
        }
        $this->data['LoginAttempt']['username'] = $username;
        $this->data['LoginAttempt']['source_ip'] = $ip;
        $this->data['LoginAttempt']['total_count'] = $total_count + 1;
        $this->save();

        //TODO Reorganize this code.
        if($rec) {
            $ts_list = $rec['LoginAttempt']['interval_ts'];
            $ts_list = explode(',', $ts_list);
            $count = 0;
            foreach($ts_list as $ts) {
                if($ts > (time() - $this->INTERVAL_MIN * 60)) {
                    $count++;
                }
            }

            if($count > $this->ATTEMPT_LIMIT) {
                $this->lock($rec['LoginAttempt']['id']);
            }
        }
    }


    function isLocked($username, $ip) {

        $rec = $this->find('first', array('conditions'=>array('username'=>$username, 'source_ip'=>$ip)));
        if(!$rec) {
            return False;
        }
        
        $ts_list = $rec['LoginAttempt']['interval_ts'];
        $ts_list = explode(',', $ts_list);

        $last_ts = array_pop($ts_list);
        if($rec['LoginAttempt']['is_locked']){ 
            if( $last_ts < (time() - $this->LOCKOUT_MIN * 60)) {
                $this->unlock($rec['LoginAttempt']['id']);
                return False;
            }
        } else {
            return False;
        }
        return True;
    }

    function unlock($id) {
        $this->id = $id;
        $rec = $this->read();
        $ts_list = $rec['LoginAttempt']['interval_ts'];
        $ts_list = explode(',', $ts_list);
        $count = 0;
        foreach($ts_list as $ts) {
            if($ts > (time() - $this->INTERVAL_MIN * 60)) {
                $count++;
            }
        }
        $last_ts = array_pop($ts_list);
        
        if($rec['LoginAttempt']['is_locked'] && $last_ts < (time() - $this->LOCKOUT_MIN * 60)) {
            if($count <= $this->ATTEMPT_LIMIT) {
                $this->saveField('is_locked', 0);
                $this->saveField('interval_ts', '');
            }
        }
    }

    function clear($id) {
        $this->id = $id;
        $this->saveField('is_locked', 0);
        $this->saveField('interval_ts', '');
    }

    function lock($id) {
        $this->id = $id;
        $this->saveField('is_locked', 1);
    }

}
