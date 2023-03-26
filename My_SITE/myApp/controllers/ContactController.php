<?php

class ContactController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();
        if(isset($_SESSION['user'])){
            // private page
            $data['title'] = 'Contact';
            $data['helloUser'] = '';
            $data['mainContent']= $this->render(APP_PATH.VIEWS.'contactPage.html', array());;
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data['title'] = 'Contact';
            $data['mainContent']= $this->render(APP_PATH.VIEWS.'contactPage.html', array());;
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }
        }
}