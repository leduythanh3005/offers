<?php

class LoginController extends BaseController{

    public $loginModel;

    function __construct() {
        $this->loginModel =  new LoginModel;
    }

    public function submit($username, $password){

        $result = $this->loginModel->submit($username,$password);
        if($result != 0){
            $_SESSION['username'] = $username;
            $url = 'Location: ./?controller=dashboard&action=index';
            header($url);
        }else{
            echo'  <div class="alert alert-danger alert-icon" role="alert">
                        <i class="mdi mdi-diameter-variant"></i> Login Fail!
                    </div>
                ';
        }
    }

    public function logout(){
        unset($_SESSION["username"]);
        header("Location: ./?controller=login&action=index");
    }
}