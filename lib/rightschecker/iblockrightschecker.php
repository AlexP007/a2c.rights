<?php


namespace A2c\Rights\RightsChecker;


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

        if ($this->user->couldDelete()
            || in_array($this->iBlockId, $this->excluded)) {
            return true;
        }
        $APPLICATION->ThrowException('Вы не можете удалить этот элемент');
        return false;
    }
}