<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'Uploader.Uploader');
#App::uses('Vendor', 'Plugin/Uploader.Uploader');

class Attachment extends AppModel { 

    function getFileIdListByItemId($item_id) {
        $id_list = array();
        $attachments = $this->find('all', array('conditions'=>array('Attachment.user_page_id'=>$item_id)));
        foreach($attachments as $attachment) {
            array_push($id_list, $attachment['Attachment']['id']);
        }
        return $id_list;
    }

    function saveAttachment($hash, $item_id) {
        if(!is_numeric($item_id)) {
            throw new Exception('Invalid Item ID.');
        }

        $dir = 'uploads/attachments/'.$hash.'/'.$item_id;
        /* 
        if(!isset($this->data['Attachment']['photo'])) {
            return;
        }
        */
        $photo_types = array('profile', 'food');
       

        $photos = $this->data['Attachment'];

        foreach($photo_types as $photo_type) {
            if(!isset($photos[$photo_type]) || (isset($photos[$photo_type]) && empty($photos[$photo_type]))) {
                continue;
            }
            foreach($photos[$photo_type] as $photo) {
                if(empty($photo['name'])) {
                    continue;
                }

                $ext = $photo['type'];
                $this->Uploader = new Uploader(array('uploadDir'=>$dir));
                if($result = $this->Uploader->upload($photo)) {
                    $this->Uploader->uploadDir = $dir.'/disp';
                    $this->Uploader->resize(array('width' => 700, 'append'=>false, 'uploadDir' => $dir.'/disp', 'quality' => 70));
                    $this->Uploader->uploadDir = $dir.'/thumbnails';
                    $this->Uploader->resize(array('width' => 300, 'append'=>false, 'uploadDir' => $dir.'/thumbnails', 'quality' => 50));
                    //$this->Uploader->uploadDir = $dir.'/thumbnails_mini';
                    //$this->Uploader->resize(array('width' => 130, 'append'=>false, 'uploadDir' => $dir.'/thumbnails_mini', 'quality' => 30));
                    $this->Uploader->uploadDir = $dir.'/cropped';
                    $this->Uploader->crop(array('width' => 220, 'height'=>'220', 'uploadDir' => $dir.'/cropped', 'append'=>false));
                    $this->Uploader->delete($result['path']);
                    $data = array(
                        'user_page_id' => $item_id,
                        'file_name' => $this->Uploader->formatFilename($result['name']),
                        'file_ext' => $ext,
                        'file_dir' => $dir, 
                        'type' => $photo_type
                    );
                    $this->create();
                    $this->save($data);
                }
            }
        }
        return;
    }
    

    function delete($id=NULL, $cascade=true) {
        $attachment = $this->read();
        $dir = $attachment['Attachment']['file_dir'];

        //$folders = array('disp', 'thumbnails', 'thumbnails_mini');
        $folders = array('disp', 'thumbnails', 'cropped');
        foreach($folders as $folder) {
            $filepath = Configure::read('project_dir').'/webroot/'.$dir.'/'.$folder.'/'.$attachment['Attachment']['file_name'];
            if(file_exists($filepath)) {
                unlink($filepath);
            }    
        }
        parent::delete();
    }
}
