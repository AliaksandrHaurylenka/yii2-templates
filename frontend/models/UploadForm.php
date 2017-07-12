<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

 
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $file_for_dowland;
 
    public function rules()
    {
        return [
            [['file_for_dowland'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4,'checkExtensionByMimeType'=>false],
        ];
    }
     
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->file_for_dowland as $file) {
                $filename=Yii::$app->getSecurity()->generateRandomString(15);
                // echo $filename;
                $file->saveAs('uploads/' . $filename . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}