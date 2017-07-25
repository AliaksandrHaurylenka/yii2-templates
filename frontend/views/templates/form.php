<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\MyForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

               <!-- --><?php /*$form = ActiveForm::begin(['id' => 'contact-form']); */?>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'contact-form']]); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?//= $form->field($model, 'file[]')->fileInput(['multiple'=>'multiple']) ?>
                    <?= $form->field($model, 'file_load')->fileInput() ?>



                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>


</div>
