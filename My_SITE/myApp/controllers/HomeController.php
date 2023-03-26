<?php

class HomeController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();
        if(isset($_SESSION['user'])){
            // private page
            $data['title'] = 'HOMEPAGE';
            $data['helloUser'] = '<h3 class= text-center ms-3 >Hello, <i>' . $_SESSION['user'].'!'. '</i></h3>';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'homeMainContent.html', array());
            echo $this->render(APP_PATH.VIEWS.'layoutauth.html', $data);
        }
        else{
            // include APP_PATH.VIEWS.'layout.html';
            $data['title'] = 'HOMEPAGE';
            // $data['mainContent'] = '<h2> HOME specific content</h2>';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'homeMainContent.html', array());
            $user = new UsersModel;
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }

    }

  
}