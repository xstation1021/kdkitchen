<?php
App::uses('AppModel', 'Model');

class PostsTag extends AppModel {

    public $belongsTo = array(
        'Tag', 'Post'
    );

}
