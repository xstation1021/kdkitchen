<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {
    
    /*
    public $validate = array(
        'tag' => array(
            'code' => 'alphaNumeric',
        ),
    );
    */

    public $hasAndBelongsToMany = array(
        'Category' => array(
            'className' => 'Category'
        ),
        'Tag' => array(
            'className' =>'Tag'
        )   
    );

    public $hasMany = array(
        'Comment' => array(
            'className'  => 'Comment',
        ),
    );

    function increaseCommentCount($id) {
        $this->id = $id;
        $item = $this->read();
        $item['Post']['comment_count'] += 1;
        $this->save($item);
    }
}
