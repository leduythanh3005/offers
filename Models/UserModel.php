<?php

class UserModel extends BaseModel{
    public $baseModel;
    public $connect;
    public $table;
    public $amountTable;

    public function __construct()
    {
        $this->baseModel    = new BaseModel;
        $this->connect      = $this->baseModel->connectDb();
        $this->table        = self::TABLE_USERS;
        $this->amountTable  = self::TABLE_AMOUNT;
    }

    public function creatUser(array $array)
    {
        $username = $array['username'];
        $table = $this->table;
        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $query = mysqli_query($this->connect, $sql);
        $num_rows = mysqli_num_rows($query);
        if($num_rows != 0){
            return false;
        }else{
            $amountArr      = [
                'username' => $username,
                'daily_earnings' => 0,
                'weekly_earnings' => 0,
                'monthly_earnings' => 0
            ];
            $this->baseModel->setValue($amountArr,$this->amountTable);
            return $this->baseModel->setValue($array,$this->table);
        }
    }

    public function numberOfUsers(string $level)
    {
        $table = $this->table;
        $sql = "SELECT * FROM $table WHERE level = '$level'";
        $query = mysqli_query($this->connect, $sql);
        $num_rows = mysqli_num_rows($query);
        return $num_rows;
    }

    public function getListUser(array $array)
    {
        return $this->baseModel->getValue($array,$this->table);
    }

    public function getValueAmountTable(string $str, string $username){
        $where = [
            'username' => $username
        ];
        return $this->baseModel->getAValue($str,$this->amountTable,$where);
    }

    public function delRow(string $username){
        $array = [
            'username' => $username
        ];
        $delAmountTable = $this->baseModel->delValue($array,$this->amountTable);
        $delUserTable = $this->baseModel->delValue($array,$this->table);
        if($delAmountTable && $delUserTable){
            return true;
        }
        return false;
    }

    public function updateRow(array $array,string $str){
        $where = [
            'username' => $str
        ];
        return $this->baseModel->updateValue($array,$this->table,$where);
    }
}