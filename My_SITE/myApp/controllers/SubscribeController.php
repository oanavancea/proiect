<?php

class SubscribeController extends AppController{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $email = $_POST['emailNewsletter'];
        $subscriber = new UsersModel;
        
        if($subscriber->addSubscriber($email)){
            header("Location: home");
            exit;
        } else {
            header("Refresh: 3; url = home");
            exit;
        }    
    }
}