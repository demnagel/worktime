<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

class WorkTimeComponent extends CBitrixComponent {

    private function _checkLibs()
    {
        Loc::loadMessages(__FILE__);

        if (!\Bitrix\Main\Loader::includeModule('tasks')) {
            throw new \Exception(Loc::getMessage('ERROR_TASK_MODULE'));
        }
    }

    public function executeComponent() {
        $this->_checkLibs();

        $this->arResult = $this->getData();
        $this->includeComponentTemplate();
    }

    private function getData()
    {
        $filter = [
            'USER_ID' => $this->arParams['USER_ID']
        ];

        $filter = array_merge($filter, $this->timeFilter($this->arParams['MOUNT']));
        $res = CTaskElapsedTime::GetList(['TASK_ID', 'MINUTES'], $filter);

        $elapsedTime = 0;
        $tasks = [];

        if($res->SelectedRowsCount()){
            while ($arElapsed = $res->Fetch())
            {
                $tasks[] = $arElapsed['TASK_ID'];
                $elapsedTime += $arElapsed["MINUTES"];
            }
        }

        $tasks = array_unique($tasks);
        return ['TIME_MINUTES' => $elapsedTime, 'COUNT_TASKS' => count($tasks)];
    }

    private function timeFilter($mount)
    {
        $lastDay = date('t', time());
        $year = date('Y');

        return [
            ">=DATE_CREATE" => "01.$mount.$year 00:00",
            "<=DATE_CREATE" => "$lastDay.$mount.$year 23:59"
        ];
    }
}