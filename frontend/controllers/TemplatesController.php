<?php
namespace frontend\controllers;

use frontend\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;//прикрепление файлов
use frontend\models\MyForm;
use frontend\models\OneForm;


/**
 * Site controller
 */
class TemplatesController extends Controller
{


    /**
     * Displays PrettyPhoto.
     *
     * @return mixed
     */
    public function actionPrettyPhoto()
    {
        return $this->render('pretty-photo');
    }

    /**
     * Displays ModalFeedback.
     *
     * @return mixed
     */
    public function actionModalFeedback()
    {
        return $this->render('modal-feedback');
    }

    /**
     * Displays Form.
     *
     * @return mixed
     */
    public function actionForm()
    {
        /*$model = new MyForm();
        if (Yii::$app->request->isPost) {
            $model->file_load = UploadedFile::getInstance($model, 'file_load');
            if ($model->upload()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
                }
            }else {
                Yii::$app->session->setFlash('error', 'Внимание! Файл не загружен!!!');
            }
        }*/


        $model = new MyForm();
        if (Yii::$app->request->isPost) {
            $model->file_load = UploadedFile::getInstance($model, 'file_load');
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
            }
        }

        return $this->render('form', compact('model'));
    }


    /**
     * Displays Form.
     *
     * @return mixed
     */
    public function actionOneForm()
    {
        $model = new OneForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->file_load = UploadedFile::getInstance($model, 'file_load');
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
            }
        }

        return $this->render('one-form', compact('model'));
    }

  /**
   * Displays UploadForm.
   *
   * @return mixed
   */
  public function actionUploadForm()
  {
    $model = new UploadForm();

    //для одного файла
      if ($model->load(Yii::$app->request->post())) {
      $model->file_load = UploadedFile::getInstance($model, 'file_load');
      if ($model->upload()) {
        Yii::$app->session->setFlash('success', 'Файл загружен!');
        return $this->refresh();
      }else {
        Yii::$app->session->setFlash('error', 'Внимание! Файл не загружен!!!');
      }
    }

    //для нескольких файлов
    /*if (Yii::$app->request->isPost) {
      $model->file_load = UploadedFile::getInstances($model, 'file_load');
      if ($model->upload()) {
        // file is uploaded successfully
        //return echo 'Файл успешно загружен';
      }
    }*/

    return $this->render('upload-form', compact('model'));
  }


    /**
     * Displays Multi Language.
     *
     * @return mixed
     */
    public function actionMultiLanguage()
    {
        return $this->render('multi-language');
    }

    /**
     * Displays GridView.
     *
     * @return mixed
     */
    public function actionGridView()
    {
        return $this->render('grid-view');
    }

    


}
