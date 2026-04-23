<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::select(
            'id',
            'product_name',
            'description',
            'hsn',
            'unit',
            'sales_price',
            'tax_type',
            'gst',
            'cess'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'Description',
            'HSN',
            'Unit',
            'Sales Price',
            'Tax Type',
            'GST',
            'Cess',
        ];
    }
}
