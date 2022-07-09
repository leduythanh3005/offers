<?php

class UserController extends BaseController
{

    public $userModel;

    function __construct()
    {
        $this->userModel =  new UserModel;
    }

    public function creatUser(string $username,string $password,string $name,string $level)
    {
        $username = trim($username);
        $name = trim($name);
        $array = [
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'level' => $level
        ];
        return $this->userModel->creatUser($array);
    }

    public function numberOfUsers(string $level){
        return $this->userModel->numberOfUsers($level);
    }

    public function getListUser(array $array){
        return $this->userModel->getListUser($array);
    }

    public function getValueAmountTable(string $str, string $where){
        return $this->userModel->getValueAmountTable($str, $where);
    }

    public function delRow(){
        $username = $_GET['username'];
        if($this->userModel->delRow($username)){
            header("Location: ./?controller=user&action=index");
        }
    }

    public function updateRow(string $username,string $password,string $name,string $level){
        $array = [
            'password' => $password,
            'name'     => $name,
            'level'    => $level
        ];
        return $this->userModel->updateRow($array,$username);
    }
}