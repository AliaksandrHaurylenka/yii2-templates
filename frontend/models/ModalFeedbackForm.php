<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class ModalFeedbackForm extends Model
{
		public $name;
		public $nameSite = 'Костюковка-Спорт';
		public $email;
		public $subject;
		public $text;
		public $verifyCode;
		public $toEmail = ['mail@sport-kostukovka.by']; //массив почт получателей
		

		public function attributeLabels()
		{
			return [
				'name' => 'Имя',
				'email' => 'E-mail',
				'subject' => 'Тема письма',
				'text' => 'Текст письма',
				'verifyCode' => 'Решите пример:',
			];
		}

		public function rules()
		{
			return [
				[['name', 'email', 'subject', 'text',], 'required'],
				['email', 'email'],
				['name', 'string', 'length' => [2, 100]],//мин. макс. количество символов
				[['text', 'subject'], 'trim'],
				['verifyCode', 'captcha'],
			];
		}

		
		public function sendEmail()
	    {
	        if ($this->validate()) {
	            Yii::$app->mailer->compose()
	                ->setTo($this->toEmail)
	                ->setFrom([Yii::$app->params['supportEmail'] => $this->nameSite])
	                ->setReplyTo([$this->email => $this->name])
	                ->setSubject($this->subject)
	                ->setTextBody($this->text)
	                ->send();
	 
	            return true;
	        } else {
	            return false;
	        }
	    }

}
