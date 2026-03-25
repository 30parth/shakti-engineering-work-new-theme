<?php

namespace App\Livewire\Account;

use Livewire\Component;

class AccountList extends Component
{

    public function addRecord()
    {
        return $this->redirectRoute('account.add');
    }

    public function render()
    {
        return view('livewire.account.account-list');
    }
}
