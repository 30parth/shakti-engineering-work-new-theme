<div>
    <x-common.component-card title="{{ $id ? 'Edit Account' : 'Add Account' }}">
        <form wire:submit="save" id="account-form">
            <div class="grid grid-cols-1 gap-x-6 gap-y-6 md:grid-cols-2">
                <x-ui.form.input label="Company Name" id="form.company_name" placeholder="Enter Company Name" />
                <x-ui.form.input label="Name" id="form.name" placeholder="Enter Name" />
                <x-ui.form.input label="Email" id="form.email" placeholder="Enter Email" />
                <x-ui.form.input label="Phone" id="form.phone" placeholder="Enter Phone" />
                <x-ui.form.input label="GST No." id="form.gst_no" placeholder="Enter GST No." />
                <x-ui.form.input label="GST Treatment Type" id="form.gst_treatment_type"
                    placeholder="Enter GST Treatment Type" />
                <x-ui.form.input label="Address" id="form.address" placeholder="Enter Address" />
                <x-ui.form.input label="City" id="form.city" placeholder="Enter City" />
                <x-ui.form.input label="State" id="form.state" placeholder="Enter State" />
                <x-ui.form.input label="Pin Code" id="form.pin_code" placeholder="Enter Pin Code" />
                <x-ui.form.input label="Country" id="form.country" placeholder="Enter Country" />
            </div>
            <x-common.form-footer formId="account-form" navigateBackRoute="account.list" />
        </form>
    </x-common.component-card>
</div>
