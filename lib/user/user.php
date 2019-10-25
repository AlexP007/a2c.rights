<?php

namespace A2c\Rights\User;

use A2c\Rights\Rights;
use CUser;

/**
 * Class User
 *
 * Базовый класс
 *
 * @package A2c\Rights\User
 */
abstract class User
{
    private $rights;
    private $id = null;
    private $groups = null;
    private $name;
    private $reflection;

    /**
     * User constructor.
     *
     * В конструкторе обязательно
     * должны быть определны права
     *
     * @param Rights $rights
     */
    public function __construct(Rights $rights)
    {
        $this->reflection = new \ReflectionClass($this);
        $this->name = $this->reflection->getName();
        $this->rights = $rights;
        $this->id = CUser::GetID();
    }

    /**
     * @return bool
     */
    public function couldDelete()
    {
        return $this->rights->delete;
    }

    /**
     * @return bool
     */
    public function couldEdit()
    {
        return $this->rights->edit;
    }

    /**
     * @return bool
     */
    public function couldRead()
    {
        return $this->rights->read;
    }

    public function getGroups()
    {
        if (!$this->groups)
            $this->groups = CUser::GetUserGroup($this->id);

        return $this->groups;
    }

    public function getName()
    {
        return $this->name;
    }
}