<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	'NAME' => Loc::getMessage('COMPONENT_NAME'),
	'DESCRIPTION' => Loc::getMessage('COMPONENT_DESCR'),
	'PATH' => array(
		'ID' => 'utility',
	),
);
?>