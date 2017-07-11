<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use frontend\components\ModalFeedbackWidget;

$this->title = 'Модальное окно "ОБРАТНАЯ СВЯЗЬ"';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site">
    <h1><?= Html::encode($this->title) ?></h1>
    <code><?= __FILE__ ?></code>

    <?= ModalFeedbackWidget::widget(); ?>
    <br/>
    <div>
        <?= Html::submitButton('ОБРАТНАЯ СВЯЗЬ', [
                                                    'class'=>'btn btn-primary',
                                                    'data-toggle'=>'modal',
                                                    'data-target'=>'#modal_feedback'
                                                ]
                            )
        ?>
    </div>

    <h2>Подключение и использование блока</h2>
    <ol style="list-style-type: decimal;">
        <li>Из директории frontend\components копируем ModalFeedbackWidget.php и вставляем в такую же директориию проекта;</li>
        <li>Из директории frontend\components\views копируем modal-feedback.php и вставляем в такую же директориию проекта;</li>
        <li>Из директории frontend\models копируем ModalFeedbackForm.php и вставляем в такую же директориию проекта;</li>
        <li>В виде, где будет использоваться модальное окно, вставляем код, обернув его в php-теги вывода содержимого:
            <pre>
                <code>
        ModalFeedbackWidget::widget();
        Html::submitButton('ОБРАТНАЯ СВЯЗЬ', ['class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#modal_feedback'])
                </code>
            </pre>
        </li>
        <Li>Код редактируется под себя: например кнопка может быть элементом меню или ссылкой указанного на странице email;</Li>
        <li>В этом же виде прописываем пространство имен: use frontend\components\ModalFeedbackWidget;</li>
        <li>В виде модального окна: frontend\components\views\modal-feedback.php, создаем необходимую форму обратной связи</li>
        <li>
            Для работы <a href="https://nix-tips.ru/yii2-api-guides/guide-ru-tutorial-mailing.html" target="_blank" style="text-decoration: underline">почты</a>
            указанную первую строку кода добавляем в frontend/config/main.php
        </li>
        <li>Также по настройке почты можно почитать <a href="https://webformyself.com/yii2-otpravka-pochty/" target="_blank" style="text-decoration: underline">здесь</a>. Особое внимание обратить на метод 'transport' при отправке smtp-сообщений, что <b>'username' => '<i style="color: red">oc.mcdir@yandex.ru</i>',</b> и <b>setFrom(['<i style="color: red">oc.mcdir@yandex.ru</i>' => $this->name])</b> имеют одинаковые адреса!!!
            <pre>
                <code>
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'oc.mcdir@yandex.ru',
                'password' => 'oc_2017',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
                </code>
            </pre>

            <pre>
                <code>
            public function contact($email)
            {
                if ($this->validate()) {
                    Yii::$app->mailer->compose()
                        ->setTo($email)
                        ->setFrom(['oc.mcdir@yandex.ru' => $this->name])
                        ->setSubject($this->subject)
                        ->setTextBody($this->body)
                        ->send();

                    return true;
                }
                return false;
            }
                </code>
            </pre>

        </li>
    </ol>

</div>
