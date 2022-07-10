<?php

class GroupModel extends BaseModel{

    public $baseModel;
    public $tableGroup;
    public $connect;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
        $this->tableGroup =  self::TABLE_GROUP;
        $this->connect = $this->baseModel->connectDb();
    }

    public function setValueGroup(string $name, string $leader, string $member)
    {
        try {
            $array = [
                'group_name'    => $name,
                'group_leader'  => $leader,
                'group_member'  => $member
            ];
            if($this->checkDupNameGroup($name,$member)){
                return $this->baseModel->setValue($array,$this->tableGroup);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return false;
    }

    private function checkDupNameGroup(string $name, string $member)
    {
        $name = trim($name);
        $table = $this->tableGroup;
        $sql = "SELECT * FROM $table WHERE group_name='$name' AND group_member='$member'";
        try {
            $query = mysqli_query($this->connect, $sql);
            if ($query->num_rows > 0) {
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return true;
    } 

    private function updateGroupToTableUsers(){
        $tableUsers =  self::TABLE_USERS;
        $sql = "";
    }
}