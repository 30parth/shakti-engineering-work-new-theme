<?php

namespace App\Livewire\Account;

use App\Livewire\Forms\Account\AccountForm as Form;
use App\Services\AccountService;
use Livewire\Component;

class AccountForm extends Component
{
    public Form $form;

    public $id = 0;

    private AccountService $service;

    public function boot(AccountService $service)
    {
        $this->service = $service;
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->id = $id;
            $this->form->setRecord($this->service->findById($id));
        }
    }

    public function save()
    {
        $this->form->validate();

        if ($this->id) {
            $this->service->update($this->id, $this->form->all());
        } else {
            $this->service->insert($this->form->all());
        }

        $this->redirectRoute('account.list', navigate: true);
    }

    public function render()
    {
        return view('livewire.account.account-form');
    }
}
