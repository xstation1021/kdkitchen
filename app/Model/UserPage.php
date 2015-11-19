<?php
App::uses('AppModel', 'Model');

class UserPage extends AppModel {


    public $hasMany = array(
        'Attachment' => array(
            'className'  => 'Attachment',
        ),
    );

    public $hasOne = array(
        'UserPageAddress' => array(
            'className'  => 'UserPageAddress',
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey'=> 'user_id',
        )
    );
    
    public $validate = array(
        'user_id'=>array(
            'user_id'=>array(
                'rule'=>'isUnique',
                'message'=>'The user page already exists for this user.'
            )
        )
    );

    private function __modifyCalendarIframe() {
        $calendar_iframe = $this->data['UserPage']['calendar_iframe'];
        $attrs = array('showTitle', 'showNav');
        foreach($attrs as $attr) {
            $reg = '/'.$attr.'=\d+/i';
            if (preg_match($reg, $calendar_iframe)) {
                $calendar_iframe = preg_replace($reg, $attr.'=0', $calendar_iframe);
            } else {
                $calendar_iframe = preg_replace("/\/calendar\/embed\?/", '/calendar/embed?'.$attr.'=0&amp;', $calendar_iframe);
            }
        }
        $this->data['UserPage']['calendar_iframe'] = $calendar_iframe;
    }

    public function beforeSave($options=array()) {

        if(isset($this->data['UserPage']['body'])) {
            $this->data['UserPage']['body'] = Purifier::clean($this->data['UserPage']['body'], 'UserPageInfo');
        }

        if(isset($this->data['UserPage']['calendar_iframe'])) {
            $this->data['UserPage']['calendar_iframe'] = Purifier::clean($this->data['UserPage']['calendar_iframe'], 'UserPageCalendar');
        }

        if(!$this->id) {
            $this->data['UserPage']['hash'] = Security::hash(uniqid());
        } else {
            if($this->calendar_iframe != null){
                $this->__modifyCalendarIframe();
            }
            
        }
        
        if(isset($this->data['UserPage']['phone_number'])) {
            
            $tmp = implode('', $this->data['UserPage']['phone_number']);
            if(!empty($tmp)) {
                $this->data['UserPage']['phone_number'] = implode('-', $this->data['UserPage']['phone_number']);
            } else {
                $this->data['UserPage']['phone_number'] = '';
            }
        }

        return true;
    }
}
