<?php

class SettingModel extends BaseModel
{

    public $baseModel;
    public $tableSetting;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
        $this->tableSetting = self::TABLE_SETTING;
    }

    public function setValueSetting(array $array)
    {
        $where = [
            'id' => 1
        ];
        try {
            return $this->baseModel->updateValue($array,$this->tableSetting,$where);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}