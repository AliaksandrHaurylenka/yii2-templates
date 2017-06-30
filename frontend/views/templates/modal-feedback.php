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
        <li>Также по настройке почты можно <a href="https://webformyself.com/yii2-otpravka-pochty/" target="_blank" style="text-decoration: underline">почитать</a></li>
    </ol>

</div>
