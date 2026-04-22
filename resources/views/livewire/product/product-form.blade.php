<div>
    <x-common.component-card title="{{ $id ? 'Edit Product' : 'Add Product' }}">
        <form wire:submit="save" id="product-form">
            <div class="grid grid-cols-1 gap-x-6 gap-y-6 md:grid-cols-2">
                <x-ui.form.input label="Product Name" id="form.product_name" placeholder="Enter Product Name" />
                <x-ui.form.input label="Description" id="form.description" placeholder="Enter Description" />
                <x-ui.form.input label="HSN" id="form.hsn" placeholder="Enter HSN" />
                <x-ui.form.input label="Unit" id="form.unit" placeholder="Enter Unit" />
                <x-ui.form.input label="Sales Price" id="form.sales_price" placeholder="Enter Sales Price" />
                
                @php
                    $taxOptions = [
                        ['id' => 'exclusive', 'name' => 'Exclusive'],
                        ['id' => 'inclusive', 'name' => 'Inclusive'],
                    ];
                @endphp
                <x-ui.form.select label="Tax Type" id="form.tax_type" :options="$taxOptions" />

                <x-ui.form.input label="GST (%)" id="form.gst" placeholder="Enter GST %" />
                <x-ui.form.input label="Cess" id="form.cess" placeholder="Enter Cess" />
            </div>
            <x-common.form-footer formId="product-form" navigateBackRoute="product.list" />
        </form>
    </x-common.component-card>
</div>
