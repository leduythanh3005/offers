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
        switch ($level) {
            case 'Admin':
                $level = 1;
                break;
            case 'Leader':
                $level = 2;
                break;
            case 'Member':
                $level = 3;
                break;
            default:
                $level = 4;
                break;
        }
        $array = [
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'level' => $level
        ];
        return $this->userModel->creatUser($array);
    }

    public function numberOfUsers(string $level){
        switch ($level) {
            case 'Admin':
                $level = 1;
                break;
            case 'Leader':
                $level = 2;
                break;
            case 'Member':
                $level = 3;
                break;
            default:
                $level = 4;
                break;
        }
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

}