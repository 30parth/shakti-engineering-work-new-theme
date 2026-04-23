<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsDemoExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return [
            [
                'Example Product',
                'A sample description',
                '1234',
                'PCS',
                '100.00',
                'exclusive',
                '18',
                '0'
            ]
        ];
    }

    public function headings(): array
    {
        return [
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
