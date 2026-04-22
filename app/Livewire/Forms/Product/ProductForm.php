<?php

namespace App\Livewire\Forms\Product;

use App\Models\Product;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product = null;

    public $product_name;
    public $description;
    public $hsn;
    public $unit;
    public $sales_price;
    public $tax_type = 'exclusive';
    public $gst;
    public $cess;

    public function rules()
    {
        return [
            'product_name' => 'required',
            'sales_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Product Name is required',
            'sales_price.required' => 'Sales Price is required',
            'sales_price.numeric' => 'Sales Price must be a number',
        ];
    }

    public function setRecord(Product $product)
    {
        $this->product = $product;
        $this->product_name = $product->product_name;
        $this->description = $product->description;
        $this->hsn = $product->hsn;
        $this->unit = $product->unit;
        $this->sales_price = $product->sales_price;
        $this->tax_type = $product->tax_type;
        $this->gst = $product->gst;
        $this->cess = $product->cess;
    }
}
