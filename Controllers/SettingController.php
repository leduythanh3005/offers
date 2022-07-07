<?php

class SettingController extends BaseController{

    public $settingModel;

    function __construct() {
        $this->settingModel =  new SettingModel;
    }
    
    public function setValueSetting(array $array){
        if($this->settingModel->setValueSetting($array)){
            $url = 'Location: ./?controller=setting&action=index';
            header($url);
        }
    }
}