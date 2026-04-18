<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Address;

class AccountService
{
    public function getAccount(string $search)
    {
        $query = Account::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        return $query->paginate(config('app.pagination_limit'));
    }

    public function insert($data)
    {
        extract($data);

        $account = Account::create([
            'account_type' => 'customer',
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'gst_no' => $gst_no,
            'gst_treatment_type' => $gst_treatment_type,
        ]);

        $address = Address::create([
            'account_id' => $account->id,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'pin_code' => $pin_code,
            'country' => $country,
        ]);
    }

    public function update($id, $data)
    {
        extract($data);

        $account = $this->findById($id);

        $account->update([
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'gst_no' => $gst_no,
            'gst_treatment_type' => $gst_treatment_type,
        ]);

        $account->addresses->update([
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'pin_code' => $pin_code,
            'country' => $country,
        ]);
    }

    public function delete($id)
    {
        $account = $this->findById($id);
        $account->addresses->delete();
        $account->delete();
    }

    public function findById($id)
    {
        return Account::find($id);
    }
}
