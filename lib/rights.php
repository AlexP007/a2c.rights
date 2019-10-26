<?php

namespace A2c\Rights;

/**
 * Class Rights
 *
 * Этот класс хранит в себе права
 * и высчитает их при вплощении
 *
 * @package A2c\Rights\Rights
 */
class Rights
{
    private $delete = false;
    private $edit = false;
    private $read = false;
    private $clients = false;

    const READ = 0b1;
    const EDIT = 0b10;
    const DELETE = 0b100;
    const CLIENTS = 0b1000;

    public function __construct(int $rights) {
        if ($rights & self::CLIENTS) {
            $this->clients = true;
        }
        if ($rights & self::DELETE) {
            $this->delete = true;
        }
        if ($rights & self::EDIT) {
            $this->edit = true;
        }
        if ($rights & self::READ) {
            $this->read = true;
        }
    }

    /**
     * Магический метод чтобы
     * удобно доставать свойства
     *
     * @param $property
     * @return mixed
     */
    public function __get($property):bool
    {
        $property = strtolower(str_replace('get', '' , $property) );
        return $this->$property;
    }
}