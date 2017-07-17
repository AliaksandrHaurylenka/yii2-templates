<?php
namespace frontend\controllers;

use Yii;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use frontend\models\ContactForm;
use frontend\models\UploadForm;
use common\widgets\Alert;


$model = new ContactForm();
if ($model->load(Yii::$app->request->post())) {
    if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
    } else {
        Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
    }
}

/*$model_upload = new UploadForm();
if (Yii::$app->request->isPost) {
    $model_upload->file_for_dowland = UploadedFile::getInstances($model_upload, 'file_for_dowland');
    if ($model_upload->upload()) {}
}*/
//debug($model);
?>

<!-- Модальное окно "ОБРАТНАЯ СВЯЗЬ" -->
<!--noindex-->
<div class="modal fade" id="modal_feedback" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Свяжитесь с нами</h4>
            </div>
            <div class="modal-body">

                <? //= debug($model); ?>

                <!--НАЧАЛО ФОРМЫ-->
                <?php Pjax::begin([]); //для того, чтобы модальное окно оставалось открытым при отправке письма ?>
                <?= Alert::widget(); //выводит сообщение об удачной, либо не удачной отправке письма  ?>
                <?php $form = ActiveForm::begin([
                    'options' =>
                        [
                            'data' => ['pjax' => true],//'data' => ['pjax' => true] для работы Pjax
                            'enctype' => 'multipart/form-data',
                        ]
                ]);
                ?>

                <div class="form-group">
                    <?= $form->field($model, 'name')->input('text') ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'email')->input('email') ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'phone')
                        ->textInput(['placeholder' => "Формат: +375(29)348-76-88"]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'subject')->input('text') ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'body')->textarea(['rows' => 2]) ?>
                </div>

                <div class="form-group">
                    <? //= $form->field($model, 'file_for_dowland[]')->fileInput(['multiple' => true]) ?>
                    <?//= $form->field($model, 'file_for_dowland')->fileInput() ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->hint('Нажмите на пример, чтобы обновить!')
                    ?>
                </div>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                <? //= Html::resetButton('Очистить', ['class' => 'btn btn-success reset'])?>
                <?php ActiveForm::end() ?>
                <?php Pjax::end(); ?>
                <!--КОНЕЦ ФОРМЫ-->
            </div>

            <div class="modal-footer">
                <?php //debug($model); ?>
            </div>
        </div>
    </div>
</div>
<!--/noindex-->