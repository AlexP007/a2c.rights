<?php

namespace A2c\Rights\User;

use A2c\Rights\Rights;

/**
 * Class Manager
 *
 * Может читать и записывать
 *
 * @package A2c\Rights\User
 */
class Manager extends User
{
    /**
     * manager constructor.
     */
    public function __construct()
    {
        parent::__construct(
            new Rights(false, true)
        );
    }
}