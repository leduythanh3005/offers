<?php

class Data
{
    public $baseModel;

    public function __construct()
    {
        $this->baseModel = new BaseModel;
    }

    public function uploadImg($file)
    {
        $_FILES["fileupload"] = $file;
        $target_dir    = "uploads/";
        $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
        $allowUpload   = true;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $maxfilesize   = 800000;
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif', 'svg' , 'ico');
        if ($_FILES["fileupload"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            $allowUpload = false;
        }
        if (!in_array($imageFileType, $allowtypes)) {
            $allowUpload = false;
        }
        if ($allowUpload) {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                return true;
            } else {
                echo "Có lỗi xảy ra khi upload file.";
            }
        }
    }
}
