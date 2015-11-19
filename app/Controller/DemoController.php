<?php

class DemoController extends AppController {
	

    public function responsive() {
       $this->layout = false;
    }
    
    public function demo(){
        $this->layout = false;
    }
    
    public function demo3(){
        $this->set('white', true);
        $this->layout = 'responsive';
    }    
public function demo2(){
        $this->layout = false;
    }
    
    
    public function kdpossibility(){}
    public function downloadfile() {
        $this->viewClass = 'Media';
        // Render app/webroot/files/example.docx
        $params = array(
                'id'        => 'Certification_Process.pdf',
                'name'      => 'Certification_Process',
                'extension' => 'pdf',
                'path'      => 'files' . DS
        );
        $this->set($params);
    }
}
