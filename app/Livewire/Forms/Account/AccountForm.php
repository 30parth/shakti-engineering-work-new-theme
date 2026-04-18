<?php

namespace App\Livewire\Forms\Account;

use App\Models\Account;
use Livewire\Form;

class AccountForm extends Form
{
    public ?Account $account = null;

    public $company_name;

    public $name;

    public $email;

    public $phone;

    public $gst_no;

    public $gst_treatment_type;

    public $address;

    public $city;

    public $state;

    public $pin_code;

    public $country;

    public $date = '';

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'date.required' => 'Date is required',
        ];
    }

    public function setRecord(Account $account)
    {
        $this->account = $account;
        $this->company_name = $account->company_name;
        $this->name = $account->name;
        $this->email = $account->email;
        $this->phone = $account->phone;
        $this->gst_no = $account->gst_no;
        $this->gst_treatment_type = $account->gst_treatment_type;
        $this->address = $account->addresses->address;
        $this->city = $account->addresses->city;
        $this->state = $account->addresses->state;
        $this->pin_code = $account->addresses->pin_code;
        $this->country = $account->addresses->country;

    }
}
