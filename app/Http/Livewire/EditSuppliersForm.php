<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;

class EditSuppliersForm extends Component
{
    public $supplier;
    public $selectedSupplierId;

    protected $listeners = [
        'loadSupplier' => 'loadSupplier',
        'loadSupplierConf' => 'loadSupplierConf'
    ];

    protected $rules = [
        'supplier.razon_social' => 'required',
        'supplier.nac_imp' => 'nullable',
        'supplier.rubro' => 'nullable',
        'supplier.direccion' => 'nullable|max:255',
        'supplier.telefono' => 'nullable|max:255',
        'supplier.condicion' => 'nullable|max:255',
        'supplier.observaciones' => 'nullable',
    ];

    public function mount()
    {
        $this->supplier = new Supplier();
        $this->selectedSupplierId = null;
    }

    public function loadSupplier($supplier_id)
    {
        if ($this->selectedSupplierId && $this->supplier->isDirty())
            $this->emit('supplierDirty', $supplier_id);
        else
            $this->loadSupplierConf($supplier_id);
    }


    public function loadSupplierConf($supplier_id)
    {
        if ($supplier_id) {
            $this->supplier = Supplier::find($supplier_id);
            $this->selectedSupplierId = $supplier_id;
        } else {
            $this->supplier = new Supplier();
            $this->selectedSupplierId = null;
        }
    }

    public function render()
    {
        return view('livewire.edit-suppliers-form');
    }

    public function saveSupplier()
    {
        $this->validate();
        $this->supplier->save();
        $this->emit('refreshSuppliers');
    }
}
