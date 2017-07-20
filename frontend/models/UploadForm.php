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
    public $file_load;
 
    public function rules()
    {
        return [
            //[['file_for_dowland'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4,'checkExtensionByMimeType'=>false],
            [['file_load'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
     
    public function upload()
    {
      /**
       * saveAs - путь для загрузки файла;
       * 'uploads/' - папка в 'web';
       * далее имя и расширение файла
       */

      //для загрузки одного файла
      //значение вверху должно быть @var UploadedFile
      /*if ($this->validate()) {
        $this->file_load->saveAs('uploads/' . $this->file_load->baseName . '.' . $this->file_load->extension);
        return true;
      }
      else {
        return false;
      }*/

      //для загрузки нескольких файлов
      //значение вверху должно быть @var UploadedFile[]
      if ($this->validate()) {
        foreach ($this->file_load as $file) {
          $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
        }
        return true;
      } else {
        return false;
      }
    }
}