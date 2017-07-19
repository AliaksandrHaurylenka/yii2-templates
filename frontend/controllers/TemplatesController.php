<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
     * Displays ModalFeedback.
     *
     * @return mixed
     */
    public function actionForm()
    {
        $model = new MyForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = UploadedFile::getInstances($model, 'file');
            $model->file
                ->saveAs(
                    'attach/' . $model->file->baseName . '.' . $model->file->extensions,
                    ['deleteTempFile' => true]);//прикрепление файла к сообщению
        }

        return $this->render('form', compact('model'));
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
