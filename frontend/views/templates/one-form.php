<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\MyForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'One Form';
$this->params['breadcrumbs'][] = $this->title;
//debug($model);
?>
<div class="site-contact">
  <h1><?= Html::encode($this->title) ?></h1>
  <code><?= __FILE__ ?></code>

  <div class="row">
    <div class="col-lg-6">
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'contact-form']]); ?>

      <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
      <?= $form->field($model, 'email') ?>
      <?= $form->field($model, 'phone')->textInput(['placeholder' => "+375(29)348-76-88"]) ?>
      <?= $form->field($model, 'subject') ?>
      <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
      <?= $form->field($model, 'file_load')->fileInput() ?>

      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

      <?php ActiveForm::end(); ?>

      <h2>Форма обратной связи</h2>
      <p>Ссылки:</p>
      <ol>
        <li><a href="https://nix-tips.ru/yii2-api-guides/guide-ru-tutorial-mailing.html" target="_blank">Отправка почты</a></li>
        <li><a href="https://nix-tips.ru/yii2-api-guides/yii-swiftmailer-message.html" target="_blank">Class yii\swiftmailer\Message</a></li>
        <li><a href="https://nix-tips.ru/yii2-api-guides/guide-en-input-file-upload.html" target="_blank">Загрузка файлов</a></li>
        <li><a href="https://nix-tips.ru/yii2-api-guides/yii-web-uploadedfile.html" target="_blank">Class yii\web\UploadedFile</a></li>
        <li><a href="https://nix-tips.ru/yii2-api-guides/guide-ru-input-forms.html" target="_blank">Создание форм</a></li>
        <li><a href="https://nix-tips.ru/yii2-api-guides/yii-widgets-activefield.html" target="_blank">Class yii\widgets\ActiveField</a></li>
      </ol>
      <h3>Код</h3>

      <p>Вид 'one-form.php':</p>
      <pre>
<code>
  &lt?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'contact-form']]); ?&gt
  &lt?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?&gt
  &lt?= $form->field($model, 'email') ?&gt
  &lt?= $form->field($model, 'phone')->textInput(['placeholder' => "+375(29)348-76-88"]) ?&gt
  &lt?= $form->field($model, 'subject') ?&gt
  &lt?= $form->field($model, 'body')->textarea(['rows' => 6]) ?&gt
  &lt?= $form->field($model, 'file_load')->fileInput() ?&gt
  &lt?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?&gt
  &lt?php ActiveForm::end(); ?&gt
</code>
      </pre>

      <p>Контроллер:</p>
      <pre>
<code>
  public function actionOneForm()
  {
  $model = new OneForm();
  if ($model->load(Yii::$app->request->post())) {
  $model->file_load = UploadedFile::getInstance($model, 'file_load');//загрузка файла
  if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
  Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
  return $this->refresh();
  } else {
  Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
  }
  }

  return $this->render('one-form', compact('model'));
  }
</code>
      </pre>

    </div>


    <div class="col-lg-6">
      <p>Модель:</p>
      <pre>
<code>
  class OneForm extends Model
  {
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $file_load;

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
      ->setHtmlBody($this->body)
      ->addHeader('Precedence', 'bulk');

    if($this->file_load)
    {
      $message->attach($this->file_load->tempName, ['fileName' => $this->file_load->baseName . '.' . $this->file_load->extension]);
    }
    return $message->send();
    }
  }
</code>
      </pre>

    </div>
  </div>


</div>
