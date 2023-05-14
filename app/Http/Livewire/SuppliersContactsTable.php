<?php

namespace App\Http\Livewire;

use App\Models\SuppliersContact;
use App\Models\Supplier;
use Livewire\Component;

class SuppliersContactsTable extends Component
{
    public $supplierSelected = null;
    public $editedContactId;
    public $apellido_nombre;
    public $telefono;
    public $mail;
    public $puesto;
    public $nApellidoNombre;
    public $nTelefono;
    public $nMail;
    public $nPuesto;

    public $contacts;

    protected $listeners = [
        'loadSupplier' => 'loadSupplier',
    ];

    public function loadSupplier($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        $this->supplierSelected = $supplier_id;
        $this->loadContacts();
    }
    public function loadContacts()
    {
        $supplier = Supplier::find($this->supplierSelected);
        $this->contacts = $supplier? $supplier->supplier()->get(): null;
    }

    public function editedContactId($contactId)
    {
        $this->editedContactId = $contactId;
        $contact = SuppliersContact::find($contactId);
        $this->apellido_nombre = $contact->apellido_nombre;
        $this->telefono = $contact->telefono;
        $this->mail = $contact->mail;
        $this->puesto = $contact->puesto;
    }

    public function updateContact()
    {
        $this->validate([
            'apellido_nombre' => 'required',
            'telefono' => 'nullable',
            'mail' => 'nullable|email',
            'puesto' => 'nullable',
        ]);

        $contact = SuppliersContact::find($this->editedContactId);
        $contact->update([
            'apellido_nombre' => $this->apellido_nombre,
            'telefono' => $this->telefono,
            'mail' => $this->mail,
            'puesto' => $this->puesto,
        ]);

        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->editedContactId = null;
        $this->reset([
            'apellido_nombre',
            'telefono',
            'mail',
            'puesto',
        ]);
    }

    public function deleteContact($contactId)
    {
        SuppliersContact::destroy($contactId);
    }

    public function addContact()
    {
        $this->validate([
            'nApellidoNombre' => 'required',
            'nTelefono' => 'nullable',
            'nMail' => 'nullable|email',
            'nPuesto' => 'nullable',
        ]);

        SuppliersContact::create([
            'apellido_nombre' => $this->nApellidoNombre,
            'telefono' => $this->nTelefono,
            'mail' => $this->nMail,
            'puesto' => $this->nPuesto,
            'suppliers_id' => $this->supplierSelected,
        ]);

        $this->reset([
            'nApellidoNombre',
            'nTelefono',
            'nMail',
            'nPuesto',
        ]);
    }

    public function render()
    {
        $this->contacts = $this->supplierSelected ? SuppliersContact::where('suppliers_id', $this->supplierSelected)->get() : [];
        return view('livewire.suppliers-contacts-table');
    }
}
