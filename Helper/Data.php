<?php

class Data
{
    public $baseModel;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
    }
    public function settingTitle(){
        try {
            $title = 'site_title';
            return $this->baseModel->settingTheme($title);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
