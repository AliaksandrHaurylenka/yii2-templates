<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class MyForm extends Model
{
  /**
   * @var UploadedFile
   */
    //public $name;
    //public $email;
    public $file;//прикрепить файл



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            //[['name', 'email'], 'required'],

            // email has to be a valid email address
            //['email', 'email'],

            //мин. макс. количество символов
            //['name', 'string', 'length' => [2, 100]],

            //удаление в тексте письма лишних пробелов
            //[['name'], 'trim'],

            //file size, maxFiles
            [['file'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'pdf'], 'maxSize' => 1024*1024*5],
            //[['file'], 'file'],

        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'name' => 'Имя',
            //'email' => 'E-mail',
            'file' => 'Файл'
        ];
    }

  public function upload()
  {
    /*if ($this->validate()) {
      foreach ($this->file as $file) {
        $filename=Yii::$app->getSecurity()->generateRandomString(15);
        // echo $filename;
        $file->saveAs('attach/' . $filename . '.' . $file->extension);
      }
      return true;
    } else {
      return false;
    }*/

    if ($this->validate()) {
      $this->file->saveAs('attach/' . $this->file->baseName . '.' . $this->file->extension);
      return true;
    } else {
      return false;
    }
  }


}
