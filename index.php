<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Helpers\UserWorker;

$user_wk = new UserWorker();

if($user_wk->isInGroup(WORKTIME_GROUP)){
    try{
        $APPLICATION->IncludeComponent(
            'dev:worktime.mount',
            '',
            [
                'USER_ID' => $user_wk->getUserId(),
                'MOUNT' => date('m')
            ],
            false);
    } catch (Exception $e) {
        if($user_wk->isInGroup(ADMIN_GROUP)){
            echo $e->getMessage();
        }
        else{
            echo 'Возникла ошибка, сообщите администратору';
        }
    }
}
else{
    echo 'У вас нет прав на просмотр контента';
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>