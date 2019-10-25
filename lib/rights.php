<?php

namespace A2c\Rights\Rights;

/**
 * Class Rights
 *
 * Этот класс хранит в себе права
 *
 * @package A2c\Rights\Rights
 */
class Rights
{
    private $delete;
    private $edit;
    private $read;

    public function __construct(
        bool $delete = false,
        bool $edit = false,
        bool $read = false
    ) {
        if ($delete === true ) {
            $this->delete = $this->edit = $this->read = true;
            return;
        }
        $this->delete = $delete;

        if ($edit === true ) {
            $this->edit = $this->read = true;
            return;
        }
        $this->edit = $edit;
        $this->read = $read;
    }
}