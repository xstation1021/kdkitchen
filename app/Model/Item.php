<?php
App::uses('AppModel', 'Model');

class Item extends AppModel {

    public $validate = array(
        'store_id'=> array(
            'rule'    => 'numeric',
            'message' => 'Store id is required.'
        ), 
        'name'=> array(
            'rule'    => 'notEmpty',
            'message' => 'This field cannot be empty.'
        ), 
        'price'=> array(
            'rule'    => 'numeric',
            'message' => 'Price must be a valid number.'
        ), 
    );

    public $hasMany = array(
        'Attachment' => array(
            'className'  => 'Attachment',
        ),
        'Comment' => array(
            'className'  => 'Comment',
        ),
    );

    public $belongsTo = array(
        'Store' => array(
            'className' => 'Store',
            'foreignKey'=> 'store_id',
        )
    );

    function increaseCommentCount($id) {
        $this->id = $id;
        $item = $this->read();
        $item['Item']['comment_count'] += 1;
        $this->save($item);
    }

}
