<?php

/**
 * @file sms.php
 * MonitoringListResource
 * @date 24.03.2021
 *
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Данные для авторизации по API
    |
    | Бесплатные варианты sender: MediaGramma или Prosto-R
    |
    |--------------------------------------------------------------------------
    */

    'api' => [
        'login' => env('PROSTOR_SMS_API_LOGIN'),
        'password' => env('PROSTOR_SMS_API_PASSWORD'),
        'sender' => env('PROSTOR_SMS_API_SENDER', 'Prosto-R'),
        'wapurl' => env('PROSTOR_SMS_API_WAPURL', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Настройки сервиса prostor-sms
    |--------------------------------------------------------------------------
    |
    | http://api.prostor-sms.ru/send?phone=79185134213&text=test1&sender=Prosto-R
    |
    */

    'host' => 'api.prostor-sms.ru',
    'service_code' => '2468',
];
