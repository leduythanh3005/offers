<?php
class BaseModel extends Db 
{

    const TABLE_NETWORKS    = 'table_networks';
    const TABLE_OFFERS      = 'table_offers';
    const TABLE_USERS       = 'table_users';
    const TABLE_AMOUNT      = 'table_amount';
    const TABLE_SETTING     = 'table_setting';

    public $connect;

    public function __construct()
    {
        $this->connect = $this->connectDb();
    }

    protected function getValue(array $array, $table)
    {
        $flattened = $array;
        array_walk($flattened, function(&$value, $key) {
            $value = "{$value}";
        });
        $columns =  implode(',', $flattened);
        $sql = "SELECT $columns FROM $table";
        $check = mysqli_query($this->connect, $sql);
        if ($check->num_rows > 0) {
            while ($row = $check->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
    }
    
    protected function setValue(array $array,string $table)
    {
        $result = false;
        $ValuesArr = $array;
        array_walk($ValuesArr, function(&$value, $key) {
            $value = "'"."{$value}"."'";
        });
        $values = implode(',' , $ValuesArr);
        $flattened = $array;
        array_walk($flattened, function(&$value, $key) {
            $value = "{$key}";
        });
        $columns =  implode(', ', $flattened);
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        if(mysqli_query($this->connect, $sql)){
            $result = true;
        };
        return $result;
    }

    protected function updateValue(array $array ,string $table,array $where)
    {
        $result = false;
        $whereArr = $where;
        array_walk($whereArr, function(&$value, $key) {
            $value = "{$key}" .'='."'"."{$value}"."'";
        });
        $values = implode('' , $whereArr);
        $flattened = $array;
        array_walk($flattened, function(&$value, $key) {
            $value = "{$key}" . '=' . "'" ."{$value}" . "'" ;
        });
        $columns =  implode(', ', $flattened);
        $sql = "UPDATE $table SET $columns WHERE $values";
        try {
            if(mysqli_query($this->connect, $sql)){
                $result = true;
            };
        } catch (\Throwable $th) {
            throw $th;
        }
        return $result;
    }

    protected function delValue(array $array,string $table)
    {
        $result = false;
        try {
            foreach($array as $key => $value){
                $sql = "DELETE FROM $table WHERE $key='$value';";
                if(mysqli_query($this->connect, $sql)){
                    $result = true;
                };
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $result;
    }

    protected function getAValue(string $str,string $table, array $where)
    {
        try {
            foreach($where as $key => $value){
                $sql = "SELECT $str FROM $table WHERE $key = '$value'";
                $check = mysqli_query($this->connect, $sql);
                if ($check->num_rows > 0) {
                    $result = $check->fetch_assoc();
                    return $result[$str];
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function settingTheme(string $str)
    {
        $tableSetting = self::TABLE_SETTING;
        $where = [
            'id' => 1
        ];
        return $this->getAValue($str, $tableSetting, $where);
    }
}