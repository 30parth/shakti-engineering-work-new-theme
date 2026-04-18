<div>
    <x-common.component-card title="Add Account">
        <form wire:submit="save">

            <div class="grid grid-cols-1 gap-x-6 gap-y-7 md:grid-cols-2">
                <div class="mt-3">
                    <x-ui.form.input label="Company Name" id="form.company_name" placeholder="Enter Company Name" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Name" id="form.name" placeholder="Enter Name" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Email" id="form.email" placeholder="Enter Email" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Phone" id="form.phone" placeholder="Enter Phone" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="GST No." id="form.gst_no" placeholder="Enter GST No." />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="GST Treatment Type" id="form.gst_treatment_type"
                        placeholder="Enter GST Treatment Type" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Address" id="form.address" placeholder="Enter Address" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="City" id="form.city" placeholder="Enter City" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="State" id="form.state" placeholder="Enter State" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Pin Code" id="form.pin_code" placeholder="Enter Pin Code" />
                </div>
                <div class="mt-3">
                    <x-ui.form.input label="Country" id="form.country" placeholder="Enter Country" />
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <x-ui.button type="submit" wire:loading.attr="disabled">Save</x-ui.button>
            </div>
        </form>
    </x-common.component-card>
</div>
