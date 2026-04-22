<?php

namespace App\Livewire\Product;

use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
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
