<?php

namespace A2c\Rights\Editor;

use A2c\Rights\BasicChecker;
use A2c\Rights\User;

class ContextMenuEditor extends BasicChecker
{
    public function __construct(array $data, User $user)
    {
        parent::__construct($data, $user);
    }

    public function run()
    {
        array_walk($this->data, function (&$elt) {
            if ($elt['TEXT'] === 'Действия') {
                $result = array();

                foreach ($elt['MENU'] as $item) {
                    if (!isset($item['TEXT'])) {
                        continue;
                    }

                    $method = $this->getDictionary(
                        explode(' ', $item['TEXT'])[0]
                    );
                    if (method_exists($this->user, $method) && !$this->user->$method()) {
                        continue;
                    }
                    $result[] = $item;
                }
                $elt['MENU'] = $result;
            }
        });

        return $this->data;
    }
}