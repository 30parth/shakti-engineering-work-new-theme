<div>
    <x-common.component-card title="Account List">
        <x-common.table-header />
        <x-ui.table>
            <x-ui.table.thead>
                <x-ui.table.tr>
                    <x-ui.table.th>Name</x-ui.table.th>
                    <x-ui.table.th>Email</x-ui.table.th>
                    <x-ui.table.th>Account Type</x-ui.table.th>
                    <x-ui.table.th>Actions</x-ui.table.th>
                </x-ui.table.tr>
            </x-ui.table.thead>
            <x-ui.table.tbody>
                @foreach ($records as $record)
                    <x-ui.table.tr>
                        <x-ui.table.td>{{ $record->name }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->email }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->account_type }}</x-ui.table.td>
                        <x-ui.table.td>
                            <div class="flex gap-2">
                                <x-ui.button.edit-button id="{{ $record->id }}">Edit</x-ui.button.edit-button>
                                <x-ui.button.delete-button id="{{ $record->id }}" />
                            </div>
                        </x-ui.table.td>
                    </x-ui.table.tr>
                @endforeach
            </x-ui.table.tbody>
        </x-ui.table>
        {{ $records->links() }}
    </x-common.component-card>
</div>
