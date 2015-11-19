<?php
App::uses('AppModel', 'Model');

class Region extends AppModel {


    public $hasMany = array(
        'RegionPrefecture' => array(
            'className' => 'RegionPrefecture'
        )   
    );

}
