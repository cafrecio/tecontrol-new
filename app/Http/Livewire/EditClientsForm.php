<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class EditClientsForm extends Component
{
    public $client;
    public $selectedClientId;

    protected $listeners = [
        'loadClient' => 'loadClient'
    ];

    protected $rules = [
        'client.razon_social' => 'required',
        'client.tipo_cliente' => 'required',
        'client.CUIT' => 'nullable|numeric|digits:11',
        'client.direccion' => 'nullable|max:255',
        'client.telefono' => 'nullable|max:255',
        'client.condicion' => 'nullable|max:255',
        'client.observaciones' => 'nullable',
    ];

    public function mount()
    {
        $this->client = new Client();
        $this->selectedClientId = null;
    }

    public function loadClient($client_id)
    {
        $client = Client::find($client_id);
        $this->selectedClientId = $client_id;
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.edit-clients-form');
    }

    public function saveClient()
    {
        $this->validate();

        if ($this->selectedClientId) {
            // Editar cliente existente
            $client = Client::find($this->selectedClientId);
            $client->update($this->client->toArray());
        } else {
            // Crear nuevo cliente
            $Creador=Client::create($this->client->toArray());
            dd($Creador);
        }

        // Restablecer los valores del cliente y el ID seleccionado
        $this->client = new Client();
        $this->selectedClientId = null;

        // Emitir evento para actualizar la lista de clientes
        $this->emit('refreshClients');
    }
}
