<?php

namespace A2c\Rights\UserFactory;

use A2c\Rights\User\User;

/**
 * Class UserFactory
 * @package A2c\Rights\UserFactory
 */
abstract class UserFactory
{
    abstract public function getUser();
}