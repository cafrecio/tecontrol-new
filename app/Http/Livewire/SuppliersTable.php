<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\SuppliersContact;

class SuppliersTable extends Component
{
    public $suppliers;
    public $supplier;
    public $supplierContact;
    public $searchSupplier;

    protected $listeners = [
        'refreshSuppliers' => '$refresh',
    ];

    public function mount()
    {
        $this->suppliers = Supplier::all();

        if ($this->supplier && $this->supplier->supplierContact && $this->supplier->supplierContact->id) {
            $this->supplierContact = SuppliersContact::find($this->supplier->supplierContact->id);
        }
    }

    public function render()
    {
        $this->suppliers = Supplier::all();

        if ($this->supplier && $this->supplier->supplierContact && $this->supplier->supplierContact->id) {
            $this->supplierContact = SuppliersContact::find($this->supplier->supplierContact->id);
        }

        $query = Supplier::query();

        if ($this->searchSupplier) {
            $query->where('razon_social', 'like', '%' . $this->searchSupplier . '%');
        }

        $this->suppliers = $query->orderBy('razon_social')->get();

        return view('livewire.suppliers-table');
    }


    public function selectSupplier(Supplier $supplier)
    {
        $this->emit('loadSupplier', $supplier->id);
    }

    public function updatedSupplierStatus()
    {
        $this->render();
    }
    public function delete(Supplier $supplier)
    {
        $supplier->delete();
    }
}
