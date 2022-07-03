<?php

class ProfileController extends BaseController{

    public $profileModel;

    function __construct() {
        $this->profileModel =  new ProfileModel;
    }

    public function updatePass($username, $password){
        return $this->profileModel->updatePass($username, $password);
    }
}