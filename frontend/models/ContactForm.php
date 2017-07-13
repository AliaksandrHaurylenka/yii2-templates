<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $file_for_dowland;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            //file size, maxFiles
            ['file_for_dowland', 'file', 'extensions' => ['png', 'jpg', 'gif', 'pdf'], 'maxSize' => 1024*1024*5],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    /*public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }*/
    public function sendEmail($email)
    {
        if ($this->validate()) {
          Yii::$app->mailer->compose()
            ->setTo($email)
            //->setFrom(['bspgomel@gmail.com' => 'Письмо послано с сайта БелСтеклоПром'])
            ->setFrom([$this->email => $this->name])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            //->attach($this->file_for_dowland)
            ->send();
          return true;
        } else {
          return false;
        }
    }


   /* public function sendEmail($email)
    {
      if ($this->validate()) {
        Yii::$app->mailer->compose([
            'html' => 'views/message-html',
            'text' => 'views/message-text',
        ])
            ->setTo($email)
            //->setFrom(['bspgomel@gmail.com' => 'Письмо послано с сайта БелСтеклоПром'])
            ->setFrom([$this->email => $this->name])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            //->setHtmlBody($this->body)
            ->send();
        return true;
      } else {
        return false;
      }
    }*/
}
