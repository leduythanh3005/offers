<?php
class LoginModel extends BaseModel{

    public $baseModel;
    public $connect;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
        $this->connect = $this->baseModel->connectDb();
    }

    public function submit(string $username,string $password)
    {
        $table = self::TABLE_USERS;
        try {
            $sql = "SELECT * FROM $table";
            if (mysqli_query($this->connect, $sql)) {
                return $this->checkLogin($username, $password ,$table);
            }
        } catch (\Throwable $th) {
            $this->createTableUser();
            $this->createTableAmount();
            $this->createTableSetting();
            return $this->checkLogin($username, $password ,$table);
        }
    }

    private function checkLogin(string $username,string $password ,string $table)
    {
        $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password' ";
        try {
            $query = mysqli_query($this->connect, $sql);
            $num_rows = mysqli_num_rows($query);
            return $num_rows;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function createTableUser()
    {
        $table = self::TABLE_USERS;
        $sql = "CREATE TABLE $table (
                                        id int NOT NULL AUTO_INCREMENT,
                                        name varchar(255),
                                        username varchar(255),
                                        password varchar(255),
                                        level varchar(255),
                                        group_name varchar(255),
                                        PRIMARY KEY(id)
                                    )";
        try {
            mysqli_query($this->connect, $sql);
            $array = [
                'name'      => 'admin',
                'username'  => 'admin',
                'password'  => '21232f297a57a5a743894a0e4a801fc3',
                'level'     => 'Admin'
            ];
            $this->baseModel->setValue($array,$table);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function createTableAmount()
    {
        $table = self::TABLE_AMOUNT;
        $sql = "CREATE TABLE $table (   id int NOT NULL AUTO_INCREMENT,
                                        username varchar(255),
                                        daily_earnings float NOT NULL,
                                        weekly_earnings float NOT NULL,
                                        monthly_earnings float NOT NULL,
                                        PRIMARY KEY(id)
                                    )";
        try {
            mysqli_query($this->connect, $sql);
            $array = [
                'username' => 'admin',
                'daily_earnings' => 0,
                'weekly_earnings' => 0,
                'monthly_earnings' => 0
            ];
            $this->baseModel->setValue($array,$table);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function createTableSetting()
    {
        $table = self::TABLE_SETTING;
        $sql = "CREATE TABLE $table (   id int NOT NULL AUTO_INCREMENT,
                                        site_logo varchar(255),
                                        site_favicon varchar(255),
                                        site_title varchar(255),
                                        site_theme varchar(255),
                                        PRIMARY KEY(id)
                                    )";
        try {
            mysqli_query($this->connect, $sql);
            $array = [
                'site_title'    => 'Thanh Aloha',
                'site_favicon'  => './uploads/icon.ico',
                'site_logo'     => './uploads/logo.svg',
                'site_theme'    => '1',
            ];
            $this->baseModel->setValue($array,$table);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}