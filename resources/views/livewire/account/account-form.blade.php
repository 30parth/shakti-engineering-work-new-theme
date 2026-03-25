<div>
    <x-common.component-card title="Add Account">
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <x-ui.form.input label="Name" wire:model="name" />
                </div>
                <div>
                    <x-ui.form.input label="Email" wire:model="email" />
                </div>
                <div>
                    <x-ui.form.input type="password" label="Password" wire:model="password" />
                </div>
                <div>
                    <x-ui.form.input type="password" label="Confirm Password" wire:model="password_confirmation" />
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-3">
                <x-ui.button type="submit" wire:loading.attr="disabled">Save</x-ui.button>
            </div>
        </form>


        <div class="grid grid-cols-3 gap-4">
            <div class="">01</div>
            <div class="">02</div>
            <div class="">03</div>
            <div class="col-span-2 ">04</div>
            <div class="">05</div>
            <div class="">06</div>
            <div class="col-span-2 ">07</div>
        </div>
    </x-common.component-card>
</div>
