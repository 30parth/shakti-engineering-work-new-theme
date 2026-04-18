<?php

namespace App\Livewire\Account;

use App\Services\AccountService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AccountList extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addRecord()
    {
        return $this->redirectRoute('account.add', navigate: true);
    }

    public function editRecord($id)
    {
        return $this->redirectRoute('account.edit', $id, navigate: true);
    }

    public function deleteRecord($id)
    {
        app(AccountService::class)->delete($id);

        return $this->redirectRoute('account.list');
    }

    public function render(AccountService $service)
    {
        return view('livewire.account.account-list', [
            'records' => $service->getAccount($this->search),
        ]);
    }
}
