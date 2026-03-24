<div>
    {{-- The whole future lies in uncertainty: live immediately. - Seneca --}}
    <x-common.component-card title="User List">

        <x-ui.table.table>
            <x-ui.table.thead>
                <x-ui.table.tr>
                    <x-ui.table.th>Name</x-ui.table.th>
                    <x-ui.table.th>Email</x-ui.table.th>
                    <x-ui.table.th>Role</x-ui.table.th>
                    <x-ui.table.th>Actions</x-ui.table.th>
                </x-ui.table.tr>
            </x-ui.table.thead>
            <x-ui.table.tbody>
                {{-- @foreach ($users as $user) --}}
                <x-ui.table.tr>
                    <x-ui.table.td>1</x-ui.table.td>
                    <x-ui.table.td>1</x-ui.table.td>
                    <x-ui.table.td>1</x-ui.table.td>
                    <x-ui.table.td>
                        1
                        {{-- <x-ui.button wire:click="edit({{ $user->id }})">Edit</x-ui.button>
                        <x-ui.button wire:click="delete({{ $user->id }})">Delete</x-ui.button> --}}
                    </x-ui.table.td>
                </x-ui.table.tr>
                {{-- @endforeach --}}
            </x-ui.table.tbody>
        </x-ui.table.table>

    </x-common.component-card>
</div>
