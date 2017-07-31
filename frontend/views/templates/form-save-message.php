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
      <?//= $form->field($model, 'file_load')->fileInput() ?>

      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

      <?php ActiveForm::end(); ?>

      <h2>Форма обратной связи</h2>
      <p>Ссылки:</p>
    </div>
  </div>
</div>
