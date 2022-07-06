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
            $this->createTableUser($table);
            $table_amount = self::TABLE_AMOUNT;
            $this->createTableAmount($table_amount);
            $arrayAmount = [
                'username' => 'admin'
            ];
            $this->baseModel->setValue($arrayAmount,$table_amount);
            $array = [
                'name'      => 'admin',
                'username'  => 'admin',
                'password'  => '21232f297a57a5a743894a0e4a801fc3',
                'level'     => 1
            ];
            $this->baseModel->setValue($array,$table);
            return $this->checkLogin($username, $password ,$table);
        }
    }

    private function checkLogin(string $username,string $password ,string $table)
    {
        $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password' ";
        $query = mysqli_query($this->connect, $sql);
        $num_rows = mysqli_num_rows($query);
        return $num_rows;
    }

    private function createTableUser(string $table)
    {
        $sql = "CREATE TABLE $table (
                                        id int NOT NULL AUTO_INCREMENT,
                                        name varchar(255),
                                        username varchar(255),
                                        password varchar(255),
                                        level int,
                                        group_name varchar(255),
                                        PRIMARY KEY(id)
                                    )";
        mysqli_query($this->connect, $sql);
    }

    private function createTableAmount(string $table)
    {
        $sql = "CREATE TABLE $table (   id int NOT NULL AUTO_INCREMENT,
                                        username varchar(255),
                                        daily_earnings float NOT NULL,
                                        weekly_earnings float NOT NULL,
                                        monthly_earnings float NOT NULL,
                                        PRIMARY KEY(id)
                                    )";
        mysqli_query($this->connect, $sql);
    }

    private function createTableSetting(string $table)
    {
        $sql = "CREATE TABLE $table (   id int NOT NULL AUTO_INCREMENT,
                                        site_logo varchar(255),
                                        site_favicon varchar(255),
                                        site_title varchar(255),
                                        site_theme varchar(255),
                                        PRIMARY KEY(id)
                                    )";
        mysqli_query($this->connect, $sql);
    }
}