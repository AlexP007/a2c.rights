<?php


namespace A2c\Rights\RightsChecker;

use A2c\Rights\BasicRightsChecker;

/**
 * Class IBlockRightsChecker
 *
 * Слушает события удаления, обновления
 * инфоблоков. Проверяет для каждого
 * пользователя соответствующие права
 *
 * @package A2c\Rights\RightsChecker
 */
class IBlockRightsChecker extends BasicRightsChecker
{
    public function run()
    {
        global $APPLICATION;

        if ($this->user->couldDelete()) {
            return true;
        }
        $APPLICATION->ThrowException('Вы не можете удалить этот элемент');
        return false;
    }
}