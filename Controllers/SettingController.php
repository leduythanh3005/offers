<?php

class SettingController extends BaseController{

    public $settingModel;

    function __construct() {
        $this->settingModel =  new SettingModel;
    }
    
    public function setValueSetting($column, $value){
        $this->settingModel->setValueSetting($column, $value);
    }
}