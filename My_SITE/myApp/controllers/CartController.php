<?php

class CartController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        if(isset($_SESSION['user'])){
            // private page
            $data['title'] = 'Your Cart';
            $user = new CartModel;
            $data['helloUser'] = '<h2 class= ms-3>Hello, <i>' . $_SESSION['user'].'!'. '</i></h2>';
            $data['mainContent'] = $user->displayCart();
            echo $this->render(APP_PATH.VIEWS.'layoutauth.html', $data);
        } else {
            $data['title'] = 'Your Cart';
            $user = new CartModel;
            $data['mainContent'] = $user->displayCart();
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }
    }
}