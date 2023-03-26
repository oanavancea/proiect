<?php

class AppController extends Controller
{

    protected $routes = ['home' => 'HomeController',
                        'products' => 'ProductsController',
                        'contact' => 'ContactController',
                        'cart' => 'CartController',
                        'login' => 'LoginController',
                        'logout' => 'LogoutController',
                        'signup' => 'SignupController',
                        'newsletter' => 'SubscribeController'
                        ];

    public function __construct(){
        // echo __FILE__;
        $this->init();
    }

    public function init(){
        // partea de routing (navigare)
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else {
            $page = 'home';
        }

        if(array_key_exists($page, $this->routes)){
            $className = $this->routes[$page];
        }
        else {
            $className = $this->routes['home'];
        }
        new $className;
    }
}