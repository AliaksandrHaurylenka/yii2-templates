<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
//use yii\swiftmailer\Mailer;

/**
 * ContactForm is the model behind the contact form.
 */
class OneForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $file_load;


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
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'subject' => 'Тема',
            'body' => 'Текст',
            'file_load' => 'Прикрепите файл',
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
        )
        ->addHeader('Precedence', 'bulk');

      if($this->file_load)
      {
        $message->attach($this->file_load->tempName, ['fileName' => $this->file_load->baseName . '.' . $this->file_load->extension]);
      }
      return $message->send();
    }


}
