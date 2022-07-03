<?php

class ProfileModel extends BaseModel{

    public $baseModel;
    public $connect;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
        $this->connect = $this->baseModel->connectDb();
    }

    public function updatePass(string $username,string $password)
    {
        $table = self::TABLE_USERS;
        $array = [
           'password' => $password
        ];
        $where = [
            'username' => $username
        ];
        return $this->baseModel->updateValue($array,$table,$where);
    }
}