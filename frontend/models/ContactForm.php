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
    //public $nameSite = 'Костюковка-Спорт';
    public $email;
    public $phone;
    public $subject;
    public $body;
    //public $file_for_dowland;//прикрепить файл
    public $verifyCode;
    //можно указать здесь получателей
    //public $toEmail = ['goric0312@mail.ru']; //массив почт получателей


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

            //мин. макс. количество символов
            ['name', 'string', 'length' => [2, 100]],

            //удаление в тексте письма лишних пробелов
            [['name', 'body', 'subject'], 'trim'],

            //file size, maxFiles
            //['file_for_dowland', 'file', 'extensions' => ['png', 'jpg', 'gif', 'pdf'], 'maxSize' => 1024*1024*5],

            //пользовательское правило
            //['name', 'myRules'],

            // phone valid
            ['phone', 'match', 'pattern' => '/\+\d{1,3}\(?\d{1,3}\)\d{1,3}\-\d{2}-\d{2}$/'],

            // verifyCode needs to be entered correctly
            //числовая капча http://2coders.ru/chislovaya-kapcha-v-yii2/
            //математическая капча http://dbhelp.ru/mathematics-captcha/page/
            ['verifyCode', 'captcha'],
        ];
    }


    /**
     * @inheritdoc
     */
    /*public function myRules($atrr)
    {
        if (!in_array($this->$atrr, ['hay'])){
            $this->addError($atrr, 'Wrong!');
        }
    }*/

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
            'verifyCode' => 'Введите код:',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)//$email берется в контроллере (см. SiteController->actionContact)
    {
      if ($this->validate()) {
        Yii::$app->mailer->compose([
            //TODO попытка сделать шаблон письма
            //'html' => 'views/message-html',
            //'text' => 'views/message-text',
        ])
            //email получателей
            //настраивается в frontend/config/params.php
            ->setTo($email)

            //подходит для рассылки писем
            //->setFrom([Yii::$app->params['supportEmail'] => $this->nameSite])
            ->setFrom(['bspgomel@gmail.com' => 'Письмо послано с сайта БелСтеклоПром'])

            //для обратной связи:
            //отправляющий должен указать существующий email,
            //т.к. почта будет отправляться через него
            //если указать не существующий email, то почта не придет
            //->setFrom([$this->email => $this->name])

            //для ответа
            ->setReplyTo([$this->email => $this->name])

            //тема письма
            ->setSubject($this->subject)

            //формат письма
            ->setTextBody($this->body)
            ->setHtmlBody(
                '<h3>Здравствуйте, меня зовут '.$this->name.'</h3>'
                .$this->body
                .'<p style="font-weight: bold;">Телефон: '
                .$this->phone.'</p>'
                .'<p style="font-weight: bold;">Почта: '
                .$this->email.'</p>'
            )
            //загрузка файла
            //->attach($this->file_for_dowland)

            ->send();
        return true;
      } else {
        return false;
      }
    }
}
