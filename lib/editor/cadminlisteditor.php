<?php

namespace A2c\Rights\Editor;

use A2c\Rights\User;
use CAdminList;
use CAdminListRow;

class CAdminListEditor extends Editor
{
    protected $dictionary = array(
        'Изменить' => 'couldEdit',
        'Удалить' => 'couldDelete',
    );

    public function __construct(CAdminList $list, User $user)
    {
        parent::__construct($list, $user);
    }

    public function edit()
    {
        $rows = $this->data->aRows;

        foreach ($rows as $row) {
            $this->modify($row);
        }
    }

    private function modify(CAdminListRow $row)
    {
        $actions = $row->aActions;
        $result = array();

        foreach ($actions as $action) {
            if (!isset($action['TEXT']) ) {
                continue;
            }

            $method = $this->getDictionary($action['TEXT']);
            if (method_exists($this->user, $method) && !$this->user->$method() ) {
                continue;
            }
            $result[] = $action;
        }

        $row->aActions = $result;
    }
}