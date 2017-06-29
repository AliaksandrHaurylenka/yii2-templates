<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        //для работы почты
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,//выставляем в true если хотим тестировать отправку
                                        //тестируемые отправленные письма попадают в frontend/runtime/mail
        ],
    ],
];
