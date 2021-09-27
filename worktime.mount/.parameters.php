<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

// Формирование массива параметров
$arComponentParameters = [
    'GROUPS' => [],

    'PARAMETERS' => [

        'USER_ID' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('USER_ID'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],

        'MOUNT' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('MOUNT'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ],

    ],
];