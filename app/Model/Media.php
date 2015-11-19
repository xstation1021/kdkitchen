<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'Uploader.Uploader');

class Media extends AppModel { 
    
    function saveMedia($options = array()) {

        $dir = 'uploads/media/'.date('Ymd');

        $photo = $this->data['Media']['file'];

        $result = False;
        
        $width = 700;
        if(isset($options['width'])) {
            $width = $options['width'];
        }
        

        $ext = $photo['type'];
        $this->Uploader = new Uploader(array('uploadDir'=>$dir));
        if($result = $this->Uploader->upload($photo)) {
            $this->Uploader->uploadDir = $dir;
            $filename = $this->Uploader->resize(array('width' => 970, 'append'=>False, 'uploadDir' => $dir, 'quality' => 70));
            //echo $this->Uploader->crop(array('width' => 220, 'height'=>'220', 'uploadDir' => $dir, 'quality' => 70));
            $this->Uploader->delete($result['path']);
            $data = array(
                //'file_name' => $this->Uploader->formatFilename($result['name']),
                'file_name' => basename($filename),
                'file_ext' => $ext,
                'file_dir' => $dir, 
            );
            $this->create();
            $this->save($data);
            
            //exit;
            $result = $data;
        }
        return $result;
    }


    function delete($id=NULL, $cascade=true) {
        $this->id = $id;
        $media = $this->read();

        if(!$media) {
            return False;
        }

        $dir = $media['Media']['file_dir'];

        unlink(Configure::read('project_dir').'/webroot/'.$dir.'/'.$media['Media']['file_name']);
        return parent::delete();
    }
}
