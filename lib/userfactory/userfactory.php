<?php

namespace A2c\Rights\UserFactory;

use A2c\Rights\User\User;

abstract class UserFactory
{
    abstract public function getUser():User;
}