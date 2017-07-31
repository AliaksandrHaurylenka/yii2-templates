<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;


class FormSaveMessage extends ActiveRecord
{


  public static function tableName(){
    return 'save';
  }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
            ['name', 'string', 'length' => [2, 100]],
            [['name', 'email'], 'trim'],
            ['phone', 'match', 'pattern' => '/\+\d{1,3}\(?\d{1,3}\)\d{1,3}\-\d{2}-\d{2}$/'],
            //[['file_load'], 'file'],
        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            //'phone' => 'Телефон',
            'subject' => 'Тема',
            'body' => 'Текст',
            //'file_load' => 'Прикрепите файл',
        ];
    }


  public function sendEmail($email)
  {
    if (!$this->validate()) {
      return false;
    }
    $message = Yii::$app->mailer->compose()
      ->setTo($email)
      ->setFrom(['goric0312@mail.ru' => 'My Company'])
      ->setReplyTo([$this->email => $this->name])
      ->setSubject($this->subject)
      ->setTextBody($this->body)
      ->setHtmlBody(
        '<h3>Здравствуйте, меня зовут '. $this->name.'</h3>'
        .$this->body
        .'<p style="font-weight: bold;">Мой телефон: ' . $this->phone . '</p>'
        .'<p style="font-weight: bold;">Моя почта: ' . $this->email . '</p>'
      );


    return $message->send();
  }



}
