<?php

namespace App\Livewire\Account;

use Livewire\Component;
use App\Models\Account;

class AccountList extends Component
{
    public $records;

    public function addRecord()
    {
        return $this->redirectRoute('account.add');
    }

    public function render()
    {
        $this->records = Account::all();
        return view('livewire.account.account-list');
    }
}
