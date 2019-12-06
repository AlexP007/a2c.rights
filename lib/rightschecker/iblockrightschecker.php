<?php


namespace A2c\Rights\RightsChecker;

use A2c\Rights\BasicRightsChecker;

class IBlockRightsChecker extends BasicRightsChecker
{
    public function run()
    {
        global $APPLICATION;

        if ($this->user->couldDelete()) {
            return true;
        }
        $APPLICATION->ThrowException('Вы не можете удалять элементы');
        return false;
    }
}