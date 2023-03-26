<?php

class ProductsController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();
        if(isset($_SESSION['user'])){
            // private page
            $data['title'] = 'Products';
            $data['helloUser'] = '';
            $user = new ProductsModel;
            $data['mainContent'] = $user->displayProducts();
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            //pagina publica
            $data['title'] = 'Products';
            $user = new ProductsModel;
            $data['mainContent'] = $user->displayProducts();
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }
    }
}
