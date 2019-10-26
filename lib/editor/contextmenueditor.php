<?php

namespace A2c\Rights\Editor;

class ContextMenuEditor extends Editor
{
    protected $dictionary = array(
        'Добавить Товар' => 'couldEdit',
        'Удалить Товар' => 'couldDelete',
    );

    public function edit()
    {
        array_walk($this->data, function (&$elt) {
            if ($elt['TEXT'] === 'Действия') {
                $result = array();

                foreach ($elt['MENU'] as $item) {
                    if (!isset($item['TEXT'])) {
                        return;
                    }
                    $method = $this->getDictionary($item['TEXT']);
                    if (method_exists($this->user, $method) && !$this->user->$method()) {
                        return;
                    }
                    $result[] = $item;
                }
                $elt['MENU'] = $result;
            }
        });
    }
}