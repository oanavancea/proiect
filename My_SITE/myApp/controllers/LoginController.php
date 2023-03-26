<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $uName = $_POST['userName'];
        $uPass = $_POST['userPass'];
        // se recomandă filtrarea datelor de intrare - filter_var, ...
        $user = new UsersModel;

        if($user->isAuth($uName, $uPass)){
            // dau acces
            // echo '<h1>You are logged in!</h1>';
            session_start();
            $_SESSION['user'] = $uName;
            $data['title'] = 'PRIVATE PAGE';
            header("Location: home");
            exit;
            // echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else {
            // nu are acces
            echo '<h1>You are NOT logged in!</h1>';
            header("Refresh: 3; url = home");
            exit;
        }    
    }
}