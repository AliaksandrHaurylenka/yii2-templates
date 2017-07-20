<?php
namespace frontend\controllers;

use frontend\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;//прикрепление файлов
use frontend\models\MyForm;


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
        $model = new MyForm();
        if (Yii::$app->request->isPost) {
          $model->file = UploadedFile::getInstance($model, 'file');
          if ($model->upload()) {
            // file is uploaded successfully
            //return echo 'Файл успешно загружен';
          }
        }

        return $this->render('form', compact('model'));
    }

  /**
   * Displays Form.
   *
   * @return mixed
   */
  public function actionUploadForm()
  {
    $model = new UploadForm();

    //для одног файла
    /*if (Yii::$app->request->isPost) {
      $model->file_load = UploadedFile::getInstance($model, 'file_load');
      if ($model->upload()) {
        // file is uploaded successfully
        //return echo 'Файл успешно загружен';
      }
    }*/

    //для нескольких файлов
    if (Yii::$app->request->isPost) {
      $model->file_load = UploadedFile::getInstances($model, 'file_load');
      if ($model->upload()) {
        // file is uploaded successfully
        //return echo 'Файл успешно загружен';
      }
    }

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
