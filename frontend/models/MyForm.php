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
  public $file_load;//прикрепить файл
    public $name;
    //public $email;




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            //[['name', 'email'], 'required'],
            [['name'], 'required'],

            // email has to be a valid email address
            //['email', 'email'],

            //мин. макс. количество символов
            //['name', 'string', 'length' => [2, 100]],

            //удаление в тексте письма лишних пробелов
            [['name'], 'trim'],

            //file size, maxFiles
            //[['file_load'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'pdf'], 'maxSize' => 1024*1024*5],
            [['file_load'], 'file'],

        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            //'email' => 'E-mail',
            'file_load' => 'Файл'
        ];
    }

  public function upload()
  {
    //для загрузки одного файла
    //значение вверху должно быть @var UploadedFile
    if ($this->validate()) {
      $this->file_load->saveAs('uploads/' . $this->file_load->baseName . '.' . $this->file_load->extension);
      return true;
    }
    else {
      return false;
    }
  }


}
