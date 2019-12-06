<?php

namespace A2c\Rights\Editor;

use A2c\Rights\BasicRightsChecker;
use A2c\Rights\User;
use CAdminList;
use CAdminListRow;

class CAdminListEditor extends BasicRightsChecker
{
    public function __construct(CAdminList $list, User $user)
    {
        parent::__construct($list, $user);
    }

    public function run()
    {
        $rows = $this->data->aRows;

        foreach ($rows as $row) {
            $this->modifyRow($row);
        }

        $this->modifyActions();
    }

    private function modifyRow(CAdminListRow $row)
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

    private function modifyActions()
    {
        $actions = $this->data->arActions;
        $result = array();

        foreach ($actions as $key => $val) {
            if (!is_string($val) ) {
                continue;
            }

            $method = $this->getDictionary($val);
            if (method_exists($this->user, $method) && !$this->user->$method() ) {
                continue;
            }
            $result[$key] = $val;
        }

        $this->data->arActions = $result;
    }
}