<div>
    <x-common.component-card title="Product List">
        <x-common.table-header />
        <x-ui.table>
            <x-ui.table.thead>
                <x-ui.table.tr>
                    <x-ui.table.th>Product Name</x-ui.table.th>
                    <x-ui.table.th>HSN</x-ui.table.th>
                    <x-ui.table.th>Sales Price</x-ui.table.th>
                    <x-ui.table.th>Tax Type</x-ui.table.th>
                    <x-ui.table.th>Actions</x-ui.table.th>
                </x-ui.table.tr>
            </x-ui.table.thead>
            <x-ui.table.tbody>
                @foreach ($records as $record)
                    <x-ui.table.tr>
                        <x-ui.table.td>{{ $record->product_name }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->hsn }}</x-ui.table.td>
                        <x-ui.table.td>{{ $record->sales_price }}</x-ui.table.td>
                        <x-ui.table.td>{{ ucfirst($record->tax_type) }}</x-ui.table.td>
                        <x-ui.table.td>
                            <x-common.action-button id="{{ $record->id }}" />
                        </x-ui.table.td>
                    </x-ui.table.tr>
                @endforeach
            </x-ui.table.tbody>
        </x-ui.table>
        {{ $records->links() }}
    </x-common.component-card>
</div>
