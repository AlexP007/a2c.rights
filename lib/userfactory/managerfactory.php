<?php

namespace A2c\Rights\UserFactory;

use A2c\Rights\User\Manager;

/**
 * Class ManagerFactory
 * @package A2c\Rights\UserFactory
 */
class ManagerFactory extends UserFactory
{
    public function getUser()
    {
        return new Manager();
    }
}