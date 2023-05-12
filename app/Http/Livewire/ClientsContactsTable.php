<?php

namespace App\Http\Livewire;

use App\Models\ClientsContact;
use App\Models\Client;
use Livewire\Component;

class ClientsContactsTable extends Component
{
    public $clientSelected = null;
    public $editedContactId;
    public $apellido_nombre;
    public $telefono;
    public $mail;
    public $puesto;
    public $observaciones;
    public $nApellidoNombre;
    public $nTelefono;
    public $nMail;
    public $nPuesto;
    public $nObservaciones;
    public $contacts;

    protected $listeners = [
        'loadClient' => 'loadClient',
    ];

    public function loadClient($client_id)
    {
        $client = Client::find($client_id);
        $this->clientSelected = $client_id;
        $this->loadContacts();
    }
    public function loadContacts()
    {
        $client = Client::find($this->clientSelected);
        $this->contacts = $client? $client->client()->get(): null;
    }

    public function editedContactId($contactId)
    {
        $this->editedContactId = $contactId;
        $contact = ClientsContact::find($contactId);
        $this->apellido_nombre = $contact->apellido_nombre;
        $this->telefono = $contact->telefono;
        $this->mail = $contact->mail;
        $this->puesto = $contact->puesto;
        $this->observaciones = $contact->observaciones;
    }

    public function updateContact()
    {
        $this->validate([
            'apellido_nombre' => 'required',
            'telefono' => 'required',
            'mail' => 'required|email',
            'puesto' => 'nullable',
            'observaciones' => 'nullable',
        ]);

        $contact = ClientsContact::find($this->editedContactId);
        $contact->update([
            'apellido_nombre' => $this->apellido_nombre,
            'telefono' => $this->telefono,
            'mail' => $this->mail,
            'puesto' => $this->puesto,
            'observaciones' => $this->observaciones,
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
            'observaciones',
        ]);
    }

    public function deleteContact($contactId)
    {
        ClientsContact::destroy($contactId);
    }

    public function addContact()
    {
        $this->validate([
            'nApellidoNombre' => 'required',
            'nTelefono' => 'required',
            'nMail' => 'required|email',
            'nPuesto' => 'nullable',
            'nObservaciones' => 'nullable',
        ]);

        ClientsContact::create([
            'apellido_nombre' => $this->nApellidoNombre,
            'telefono' => $this->nTelefono,
            'mail' => $this->nMail,
            'puesto' => $this->nPuesto,
            'observaciones' => $this->nObservaciones,
            'clients_id' => $this->clientSelected,
        ]);

        $this->reset([
            'nApellidoNombre',
            'nTelefono',
            'nMail',
            'nPuesto',
            'nObservaciones',
        ]);
    }

    public function render()
    {
        $this->contacts = $this->clientSelected ? ClientsContact::where('clients_id', $this->clientSelected)->get() : [];
        return view('livewire.clients-contacts-table');
    }
}
