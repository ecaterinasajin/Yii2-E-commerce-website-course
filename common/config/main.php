<?php

require_once __DIR__ . '/../../common/helpers.php';

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],

        'formatter' => [
            'datetimeFormat' => 'php:d/m/Y H:i',

            'class' => \common\i18n\FormatterO::class,
            'locale' => 'yourLocale', //ej. 'es-ES'
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'currencyCode' => '$',
        ]
    ],
];
