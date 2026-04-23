<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Exports\ProductsDemoExport;

class ProductImport extends Component
{
    use WithFileUploads;

    public $importFile;

    public function downloadDemo()
    {
        return Excel::download(new ProductsDemoExport, 'products_demo_format.xlsx');
    }

    public function import()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            Excel::import(new ProductsImport, $this->importFile->getRealPath());
            $this->importFile = null;
            session()->flash('success', 'Products imported successfully.');
            return $this->redirectRoute('product.list');
        } catch (\Exception $e) {
            $this->addError('importFile', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function back()
    {
        return $this->redirectRoute('product.list', navigate: true);
    }

    public function render()
    {
        return view('livewire.product.product-import');
    }
}
