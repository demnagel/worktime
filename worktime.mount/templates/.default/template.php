<?php
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $componentPath
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true) die() ;

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if($arResult['TIME_MINUTES']){
    $time_mess = Loc::getMessage('TIME_CAPTION') . ' ' .floor($arResult['TIME_MINUTES'] / 60);
    $time_mess .= Loc::getMessage('HOUR') . ' ' . ($arResult['TIME_MINUTES'] % 60) . Loc::getMessage('MINUTES');
    
    echo Loc::getMessage('TASKS') . ' ' . $arResult['COUNT_TASKS'] . '<br/>';
    echo $time_mess;
}