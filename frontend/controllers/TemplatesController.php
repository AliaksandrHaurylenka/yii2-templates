<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


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
