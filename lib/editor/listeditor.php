<?php

namespace A2c\Rights\Editor;

use A2c\Rights\User;

/**
 * Class ListEditor
 * @package A2c\Rights\Editor
 */
abstract class ListEditor
{
    protected $list;
    protected $user;

    protected $dictionary = array(
        'Изменить' => 'couldEdit',
        'Удалить' => 'couldDelete',
    );

    public function __construct($list, User $user)
    {
        $this->list = $list;
        $this->user = $user;
    }

    abstract function edit();
}