<?php

namespace A2c\User\User;

use A2c\Rights\Rights;

/**
 * Class basicuser
 *
 * Базовый класс
 *
 * @package A2c\User\User
 */
abstract class basicuser
{
    private $rights;

    /**
     * basicuser constructor.
     *
     * В конструкторе обязательно
     * должны быть определны права
     *
     * @param Rights $rights
     */
    public function __construct(Rights $rights)
    {
        $this->rights = $rights;
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
}