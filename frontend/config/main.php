<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language'   => 'en',//для мультиязычного сайта
    'sourceLanguage' => 'en',//для мультиязычного сайта
    'on beforeAction' => ['\pjhl\multilanguage\Start', 'run'],//для мультиязычного сайта
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
            'class' => 'pjhl\multilanguage\components\AdvancedRequest',//для мультиязычного сайта
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'pjhl\multilanguage\components\AdvancedUrlManager',//для мультиязычного сайта
            'rules' => [
                '' => 'site/index',                                
                '<action>' => 'site/<action>',
            ],
        ],

        //для работы почты
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,//выставляем в true если хотим тестировать отправку
            //тестируемые отправленные письма попадают в frontend/runtime/mail
            /*'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'aliaksandr.haurylenka@gmail.com',
                'password' => 'integralrimmana',
                'port' => '465',
                'encryption' => 'ssl',
            ],*/
        ],
        
    ],
    'params' => $params,
];
