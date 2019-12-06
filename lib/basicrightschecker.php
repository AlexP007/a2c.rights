<?php

namespace A2c\Rights;


/**
 * Class Editor
 * @package A2c\Rights\Editor
 */
abstract class BasicRightsChecker
{
    protected $list;
    protected $user;

    protected $dictionary = array(
        'изменить' => 'couldEdit',
        'удалить' => 'couldDelete',
    );

    public function __construct($data, User $user)
    {
        $this->data = $data;
        $this->user = $user;
    }

    abstract function run();

    protected function getDictionary($key)
    {
        return $this->dictionary[strtolower($key)];
    }
}