<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'contact-form']]); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'phone')->textInput(['placeholder' => "+375(29)348-76-88"]) ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?//= $form->field($model, 'file_for_dowland[]')->fileInput(['multiple' => true]) ?>
                <?//= $form->field($model_load, 'file_load')->fileInput(['multiple' => true]) ?>
                <?= $form->field($model_load, 'file_load')->fileInput() ?>
                <?//= $form->field($model, 'file_load')->fileInput() ?>
                <?//= $form->field($model, 'file_load[]')->fileInput(['multiple' => true]) ?>


                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(),
                    ['template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',])
                    ->hint('Hint: click on the equation to refresh')
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
