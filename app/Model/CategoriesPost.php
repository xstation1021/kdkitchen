<?php
App::uses('AppModel', 'Model');

class CategoriesPost extends AppModel {

    public $belongsTo = array(
        'Category', 'Post'
    );

}
