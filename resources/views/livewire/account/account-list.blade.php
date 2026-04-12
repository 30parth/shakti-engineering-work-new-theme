<div>
    <x-common.component-card title="Account List">
        <x-common.table-header />
        <x-ui.table.table>
            <x-ui.table.thead>
                <x-ui.table.tr>
                    <x-ui.table.th>Name</x-ui.table.th>
                    <x-ui.table.th>Email</x-ui.table.th>
                    <x-ui.table.th>Account Type</x-ui.table.th>
                    <x-ui.table.th>Actions</x-ui.table.th>
                </x-ui.table.tr>
            </x-ui.table.thead>
            <x-ui.table.tbody>
                @foreach($records as $record)
                    <x-ui.table.tr>
                        <x-ui.table.td>{{ $record->name }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->email }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->account_type }}</x-ui.table.td>
                        <x-ui.table.td>
                            <x-ui.button wire:click="editRecord({{ $record->id }})">Edit</x-ui.button>
                            <x-ui.button wire:click="deleteRecord({{ $record->id }})">Delete</x-ui.button>
                        </x-ui.table.td>
                    </x-ui.table.tr>
                @endforeach
            </x-ui.table.tbody>
        </x-ui.table.table>
    </x-common.component-card>
</div>
