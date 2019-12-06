<?php


namespace A2c\Rights\RightsChecker;

use A2c\Rights\BasicChecker;
use A2c\Rights\User;
use A2c\Helper\Traits\Loader;
use CIBlockElement;

abstract class BasicRightsChecker extends BasicChecker
{
    use Loader;

    const MODULE_NAME = 'iblock';

    protected $iBlockId;
    protected $excluded = [14];

    public function __construct($data, User $user)
    {
        parent::__construct($data, $user);
        $this->iBlockId = $this->getIBlockIdByElement($data['id']);
    }

    private function getIBlockIdByElement($elementId)
    {
        self::includeModule();
        return CIBlockElement::GetIBlockByID($elementId);
    }
}