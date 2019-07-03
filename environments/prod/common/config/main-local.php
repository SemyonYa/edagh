<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=wannafresh',
            'username' => 'yaptevsa',
            'password' => 'veter211=1',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => Yii::$app->params['infoEmail'],// 'mygarbage86@yandex.ru',// 'mail@kulturatela.online',
                'password' => '90-=op[]',
                'port' => '465',
                'encryption' => 'ssl'
            ],
        ],
    ],
];
