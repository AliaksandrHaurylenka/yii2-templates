<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Form Save Message';
$this->params['breadcrumbs'][] = $this->title;
//debug($model);
?>
<div class="site-contact">
  <h1><?= Html::encode($this->title) ?></h1>
  <code><?= __FILE__ ?></code>

  <div class="row">
    <div class="col-lg-6">
      <?php $form = ActiveForm::begin(['options' => ['id' => 'contact-form']]); ?>

      <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
      <?= $form->field($model, 'email') ?>
      <?= $form->field($model, 'phone')->textInput(['placeholder' => "+375(29)348-76-88"]) ?>
      <?= $form->field($model, 'subject') ?>
      <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

      <?php ActiveForm::end(); ?>

      <h2>Форма обратной связи с сохранением в базу данных</h2>
      <p>Ссылки:</p>
      <ol>
        <li><a href="https://nix-tips.ru/yii2-api-guides/guide-ru-db-active-record.html#inserting-updating-data" target="_blank">Сохранение данных</a></li>
        <li>Андрей Кудлай. Фреймворк YII2. Теория и возможности фреймворка. Урок 16</li>
        <li><a href=""></a></li>
      </ol>
      <p>Основное изменение - модель наследует класс ActiveRecord и не задаются в модели публичные свойства ячеек формы.</p>

      <p>Контроллер:</p>
      <pre>
        <code>
          public function actionFormSaveMessage()
          {
            $model = new FormSaveMessage();
            if( $model->load(Yii::$app->request->post()) ){
              $model->save();//сохранение в базу данных
              if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
              Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
              return $this->refresh();
              } else {
              Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
              }
            }
            return $this->render('form-save-message', compact('model'));
          }
        </code>
      </pre>
    </div>

    <div class="col-lg-6">
      <p>Модель:</p>
      <pre>
        <code>
          public static function tableName(){
            return 'save';
          }

          public function rules()
          {
            return [
              [['name', 'email', 'subject', 'body'], 'required'],
              ['email', 'email'],
              ['name', 'string', 'length' => [2, 100]],
              [['name', 'email'], 'trim'],
              ['phone', 'match', 'pattern' => '/\+\d{1,3}\(?\d{1,3}\)\d{1,3}\-\d{2}-\d{2}$/'],
            ];
            }

            public function attributeLabels()
            {
              return [
                'name' => 'Имя',
                'email' => 'E-mail',
                'phone' => 'Телефон',
                'subject' => 'Тема',
                'body' => 'Текст',
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
                ->setHtmlBody($this->body);

              return $message->send();
            }
          }
        </code>
      </pre>
      <p>Если надо, например, загрузить файл с сообщением, но информация об файле не нужна в базе,
      то необходимо дополнительно объявить публичное свойство в модели ячейки формы. Пример:</p>
      <p>Вид:</p>
      <pre>
        <code>&lt?= $form->field($model, 'file_load')->fileInput() ?&gt</code>
      </pre>
      <p>В модели:</p>
      <pre>
        <code>public $file_load;</code>
      </pre>
    </div>
  </div>
</div>
