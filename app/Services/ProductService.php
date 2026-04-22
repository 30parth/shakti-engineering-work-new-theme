<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProduct(string $search)
    {
        $query = Product::query();

        if ($search) {
            $query->where('product_name', 'like', "%{$search}%");
        }

        return $query->paginate(config('app.pagination_limit', 10));
    }

    public function insert($data)
    {
        Product::create([
            'product_name' => $data['product_name'] ?? null,
            'description'  => $data['description'] ?? null,
            'hsn'          => $data['hsn'] ?? null,
            'unit'         => $data['unit'] ?? null,
            'sales_price'  => $data['sales_price'] ?? 0,
            'tax_type'     => $data['tax_type'] ?? 'exclusive',
            'gst'          => $data['gst'] ?? 0,
            'cess'         => $data['cess'] ?? 0,
        ]);
    }

    public function update($id, $data)
    {
        $product = $this->findById($id);

        $product->update([
            'product_name' => $data['product_name'] ?? $product->product_name,
            'description'  => $data['description'] ?? $product->description,
            'hsn'          => $data['hsn'] ?? $product->hsn,
            'unit'         => $data['unit'] ?? $product->unit,
            'sales_price'  => $data['sales_price'] ?? $product->sales_price,
            'tax_type'     => $data['tax_type'] ?? $product->tax_type,
            'gst'          => $data['gst'] ?? $product->gst,
            'cess'         => $data['cess'] ?? $product->cess,
        ]);
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        $product->delete();
    }

    public function findById($id)
    {
        return Product::find($id);
    }
}
