<?php

class BaseController {

    public function index($var){
        require_once "Views/admin/templates/header.php";
        require_once "Views/admin/". $var .".php";
        require_once "Views/admin/templates/footer.php";
    }

}