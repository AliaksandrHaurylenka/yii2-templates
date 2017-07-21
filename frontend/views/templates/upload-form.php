<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\MyForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Загрузка файлов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'file_load[]')->fileInput(['multiple' => true]) ?>
                    <?//= $form->field($model, 'file_load')->fileInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>


</div>
