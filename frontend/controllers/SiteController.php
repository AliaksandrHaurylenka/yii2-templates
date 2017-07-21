<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;//прикрепление файлов
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\UploadForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                /*'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,*/

                'class' => 'hr\captcha\CaptchaAction',
                'operators' => ['+','-','*'],
                'maxValue' => 10,
                'fontSize' => 18,

            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
      /*$model_load = new UploadForm();
      //для нескольких файлов
      if (Yii::$app->request->isPost) {
        $model_load->file_load = UploadedFile::getInstances($model_load, 'file_load');
        if ($model_load->upload()) {
          // file is uploaded successfully
          //return echo 'Файл успешно загружен';
        }
      }*/

        /**
         * функция ОБРАТНОЙ СВЯЗИ
         * 1. присваиваем переменной класс модели ContactForm
         * 2. если письмо отправлено методом post
         *      если заполнены все данные (см. метод sendEmail) письмо отправляется, выводится сообщение об успехе
         *          и перезагружается страница (return $this->refresh();)
         *      иначе выводится сообщение об неудаче
         */
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
              $model->file_load = UploadedFile::getInstance($model, 'file_load');
              $message = Yii::$app->mailer->compose()->attach($model->file_load->tempName);
            //$model->file_load = UploadedFile::getInstances($model, 'file_load');
            //$model->file_load->saveAs('attach/' . $model->file->baseName . "." . $model->file->extensions);//прикрепление файла к сообщению
          if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success', 'Спасибо за Ваше письмо. Мы постараемся как можно быстрее Вам ответить!');
            return $this->refresh();
          } else {
            Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено!!!');
          }
        }


        return $this->render('contact', compact('model', 'message'
          //'model' => $model,
          //'model_load' => $model_load,
        ));
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Displays templates.
     *
     * @return mixed
     */
    public function actionTemplates()
    {
        return $this->render('templates');
    }


}
