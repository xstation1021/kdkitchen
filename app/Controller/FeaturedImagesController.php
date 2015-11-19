<?php
App::uses('AppController', 'Controller');

class FeaturedImagesController extends AppController {

    var $uses = array('Setting');
    
    function edit() {

        $this->_auth();    

        $data = $this->Setting->find('all', array('conditions'=>array('group'=>'media')));
        
        if($this->request->is('POST')) {

            $keys = array(
                'slider_img_1', 'slider_img_2', 'slider_img_3', 'slider_img_4',
                'small_slider_img_1','small_slider_img_2','small_slider_img_3','small_slider_img_4','small_slider_img_5',
                'from_newyork',
                'whatis_kd_img', 'whatis_kd_img_home',
                'instructor_training_img', 'instructor_training_img_home',
                'find_kd_kitchen_img', 'find_kd_kitchen_img_home',
                'products_img', 'products_img_home'
            );

            //$key_id_map = array();
            $featured_imgs = array();
            foreach($keys as $key) {
                if(isset($this->data['Setting'][$key])){
                    $setting_id = NULL;
                    foreach($data as $media_setting) {
                        if($key == $media_setting['Setting']['key']) {
                            $key_id_map[$key] = $media_setting['Setting']['id'];
                            $setting_id = $media_setting['Setting']['id'];
                        }
                    }
                    array_push($featured_imgs, array('id'=>$setting_id, 'key'=>$key, 'value'=>$this->data['Setting'][$key], 'group'=>'media'));
                }
            }
            
            $this->Setting->saveAll($featured_imgs);
            $this->redirect($this->referer());
            exit;
        } else {

            $formatted_data = array();
            foreach($data as $media_setting) {
                $formatted_data[$media_setting['Setting']['key']] = $media_setting['Setting']['value'];
            }
            $this->data = array('Setting'=>$formatted_data);
        }

        $this->set('title', 'Featured images');
    }
    
}
