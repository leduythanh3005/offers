<?php

class GroupController extends BaseController
{

    public $groupModel;

    function __construct() 
    {
        $this->groupModel =  new GroupModel;
    }

    public function setValueGroup(string $name, string $leader, array $members)
    {
        $result = true;
        try {
            $name = trim($name);
            foreach($members as $member){
                if($this->groupModel->setValueGroup($name,$leader,$member)){
                    $this->groupModel->setValueGroup($name,$leader,$member);
                }else{
                    return false;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $result;
    }
}