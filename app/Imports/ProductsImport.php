<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row['product_name'] ?? $row['productname'] ?? null,
            'description' => $row['description'] ?? null,
            'hsn' => $row['hsn'] ?? null,
            'unit' => $row['unit'] ?? null,
            'sales_price' => $row['rate'] ?? 0,
            'tax_type' => 'exclusive',
            'gst' => $row['gst_tax'] ?? 0,
            'cess' => $row['cess'] ?? 0,
        ]);
    }
}
