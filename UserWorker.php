<?php

namespace Helpers;

use Bitrix\Main\UserGroupTable;

class UserWorker
{

    private $user_id;

    function __construct($user_id = false)
    {
        if(!$user_id){
            global $USER;
            $this->user_id = $USER->GetID();
        }
        else{
            $this->user_id = $user_id;
        }
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function isInGroup(int $group_id) : bool
    {
        $params = [
            'filter' => ['USER_ID' => $this->user_id],
            'select' => ['GROUP_ID'],
            'cache' => [
                'ttl' => 60,
                'cache_joins' => true,
            ]
        ];

        $db_group = UserGroupTable::getList($params);
        $arr_groups = $db_group->FetchAll();

        if($arr_groups){
            if(in_array($group_id, array_column($arr_groups, 'GROUP_ID'))){
                return true;
            }
        }

        return false;
    }

}