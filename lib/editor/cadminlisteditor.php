<?php

namespace A2c\Rights\Editor;

use A2c\Rights\User\User;
use CAdminList;

class CAdminListEditor extends ListEditor
{
   public function __construct(CAdminList $list, User $user)
   {
       parent::__construct($list, $user);
   }

   public function edit()
   {
        $groups = $this->user->getGroups();
        $currentGroup = $this->user->getName();
   }

}