<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\Product\ProductForm as Form;
use App\Services\ProductService;
use Livewire\Component;

class ProductForm extends Component
{
    public Form $form;

    public $id = 0;

    private ProductService $service;

    public function boot(ProductService $service)
    {
        $this->service = $service;
    }

    public function mount($id = null)
    {
        if ($id) {
            $this->id = $id;
            $this->form->setRecord($this->service->findById($id));
        }
    }

    public function save()
    {
        $this->form->validate();

        if ($this->id) {
            $this->service->update($this->id, $this->form->all());
        } else {
            $this->service->insert($this->form->all());
        }

        $this->redirectRoute('product.list', navigate: true);
    }

    public function back()
    {
        $this->redirectRoute('product.list', navigate: true);
    }

    public function render()
    {
        return view('livewire.product.product-form');
    }
}
