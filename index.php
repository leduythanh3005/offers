<?php
session_start();
require_once "Config/Db.php";
require_once "Models/BaseModel.php";
require_once "Controllers/BaseController.php";
require_once "Helper/Data.php";

if(empty(['controller']) || empty($_GET['action'])){
    $result     = new BaseController;
    $baseModel  = new BaseModel;
    $theme  = $baseModel->settingTheme('site_theme');
    $result->requireTheme($theme);
}else{
    $controller_lower   =   strtolower($_GET['controller']);
    $controller         =   ucfirst($controller_lower) . "Controller";
    $action             =   strtolower($_GET['action']);
    $url_controller     =   "Controllers/" . $controller . ".php";
    $url_model          =   "Models/" . ucfirst($controller_lower) ."Model.php";
    require_once $url_controller;
    require_once $url_model;
    $result = new $controller;
    if($action == 'index'){
        $result -> index($controller_lower);
    }else{
        isset($result) ? $result -> $action() : $result -> index($controller_lower);
    }
}