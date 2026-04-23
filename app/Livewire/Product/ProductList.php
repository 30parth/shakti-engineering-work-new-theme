<?php

namespace App\Livewire\Product;

use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductList extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import()
    {
        return $this->redirectRoute('product.import', navigate: true);
    }

    public function addRecord()
    {
        return $this->redirectRoute('product.add', navigate: true);
    }

    public function editRecord($id)
    {
        return $this->redirectRoute('product.edit', $id, navigate: true);
    }

    public function deleteRecord($id)
    {
        app(ProductService::class)->delete($id);

        return $this->redirectRoute('product.list');
    }

    public function render(ProductService $service)
    {
        return view('livewire.product.product-list', [
            'records' => $service->getProduct($this->search),
        ]);
    }
}
