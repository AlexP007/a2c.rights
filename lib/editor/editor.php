<?php

namespace A2c\Rights\Editor;

use A2c\Rights\User;

/**
 * Class Editor
 * @package A2c\Rights\Editor
 */
abstract class Editor
{
    protected $list;
    protected $user;

    protected $dictionary = array(
        'Изменить' => 'couldEdit',
        'Удалить' => 'couldDelete',
    );

    public function __construct($data, User $user)
    {
        $this->data = $data;
        $this->user = $user;
    }

    abstract function edit();

    protected function getDictionary($key)
    {
        return $this->dictionary[$key];
    }
}