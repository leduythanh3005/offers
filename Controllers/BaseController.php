<?php

class BaseController extends BaseModel{

    public $baseModel;

    function __construct() {
        $this->baseModel =  new BaseModel;
    }

    public function index($var){
        require_once "Views/admin/templates/header.php";
        require_once "Views/admin/". $var .".php";
        require_once "Views/admin/templates/footer.php";
    }

    public function requireTheme($theme){
        require_once "Views/frontend/theme_".$theme . "/index.php";
    }
}