<?php

namespace A2c\Rights;

use Bitrix\Main\GroupTable;
use CUser;

/**
 * Class User
 *
 * Создает пользователя
 * и определяет права
 *
 * @package A2c\Rights\User
 */
class User
{
    private $id;
    private $rights;
    private $groups = array();

    const ADMIN = Rights::CLIENTS | Rights::DELETE | Rights::EDIT | Rights::READ;
    const MANAGER = Rights::CLIENTS | Rights::EDIT | Rights::READ;
    const CONTENT_MANAGER = Rights::EDIT | Rights::READ;

    /**
     * User constructor.
     *
     * В конструкторе обязательно
     * должны быть определны права
     *
     * @param Rights $rights
     */
    public function __construct()
    {
        // Получим юзера и группы
        $this->id = CUser::GetId();
        $groups = CUser::GetUserGroup($this->id);

        $rights = 0b0;

        foreach ($groups as $groupId) {
            // Получим название группы
            $group = GroupTable::getRowById($groupId)['STRING_ID'];
            $this->groups[] = $group;

            // Получим права группы
            $group = strtoupper($group);
            if ($constRights = constant("self::$group") ) {
                $rights |= $constRights;
            }
        }

        $this->rights = new Rights($rights);
    }

    /**
     * @return bool
     */
    public function couldManageClients()
    {
        return $this->rights->getClients;
    }
    /**
     * @return bool
     */
    public function couldDelete()
    {
        return $this->rights->getDelete;
    }

    /**
     * @return bool
     */
    public function couldEdit()
    {
        return $this->rights->getEdit;
    }

    /**
     * @return bool
     */
    public function couldRead()
    {
        return $this->rights->getRead;
    }

    /**
     * Возвращает список групп к которым
     * принадлежит пользователь
     *
     * @return mixed|null
     */
    public function getGroups():array
    {
        return $this->groups;
    }

    /**
     * Возвращает id
     *
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }
}