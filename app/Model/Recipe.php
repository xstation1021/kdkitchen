<?php
App::uses('AppModel', 'Model');

class Recipe extends AppModel {

    public $validate = array(
            'title' => array(
                'title_1' => array(
                    "rule"          => "notEmpty",
                    'message' => '必須項目'
                ),
            ),
            'category_id' => array(
                    'category_id_1' => array(
                             'rule' => array('notEmpty'),
                            'message' => '必須項目',
                            'allowEmpty' => false,
                    ),
            ),
            'video_url' => array(
                    'video_url_1' => array(
                            "rule"          => "notEmpty",
                            'message' => '必須項目'
                    ),
                    'video_url_2' => array(
                            "rule"          => "isUnique",
                            'message' => 'ユニークなビデオIDである必要があります。'
                    ),
                    'video_url_3' => array(
                            "rule"          => array('__isVideoExist'),
                            'message' => 'このビデオは存在しないようです。。'
                    ),
            ),
            'title_eng' => array(
                'title_eng_1' => array(
                    "rule"          => "notEmpty",
                    'message' => '必須項目です'
                ),

                'title_eng_2'=>array(
                            'rule'    => array('__checkLetterAlphabet'),
                            'message' => 'アルファベットのみです。'
                    ),
            ),
            'summary_id' => array(
                    'summary_id_1' => array(
                            "rule"          => array('__checkNumberOfRecords'),
                            'message' => 'レシピは１月3つまでです'
                    ),
            ),
        );
    public function __isVideoExist(){
        $video_url =$this->data['Recipe']['video_url'];
        $url = 'http://vimeo.com/api/oembed.json?url=http%3A//vimeo.com/'. $video_url;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $video_exist = curl_exec($curl);
        curl_close($curl);
        if($video_exist != '404 Not Found'){
            return true;
        } else {
            return false;
        }
    }
    public function __checkNumberOfRecords(){
        
        $summary_id =$this->data['Recipe']['summary_id'];
        $valid = true;
        $db = $this->getDataSource();
        
        
        if($this->id != null){ // Edit
            $result = $db->fetchAll(
                    'SELECT COUNT(rs.id) as count FROM recipe_summaries as rs LEFT JOIN recipes as r ON rs.id = r.summary_id WHERE rs.id = ? AND r.id != ?'
                    ,array($summary_id, $this->id)
            );
            $count = ($result[0][0]['count']);
        } else { // New
            $result = $db->fetchAll(
                    'SELECT COUNT(rs.id) as count FROM recipe_summaries as rs LEFT JOIN recipes as r ON rs.id = r.summary_id WHERE rs.id = ?'
                    ,array($summary_id)
            );
        } 
        $count = ($result[0][0]['count']);
        
        if($count > 2){
            $valid = false;
        }
        return $valid;
    }

    public function __checkLetterAlphabet(){   
        if(preg_match('/^[a-zA-Z0-9 .]+$/', $this->data['Recipe']['title_eng'])) {
            return true;
        }
        else{
            return false;
        }
    }

    public function beforeSave($options=array()) {

        if(!$this->id) {
            $this->data['Recipe']['hash'] = Security::hash(uniqid());
        } 
        return true;
    }
    
}
