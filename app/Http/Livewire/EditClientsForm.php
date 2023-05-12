<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class EditClientsForm extends Component
{
    public $client;
    public $selectedClientId;

    protected $listeners = [
        'loadClient' => 'loadClient',
        'loadClientConf' => 'loadClientConf'
    ];

    protected $rules = [
        'client.razon_social' => 'required',
        'client.tipo_cliente' => 'required',
        'client.cuit' => 'nullable',
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
        if ($this->selectedClientId && $this->client->isDirty())
            $this->emit('clientDirty', $client_id);
        else
            $this->loadClientConf($client_id);
    }


    public function loadClientConf($client_id)
    {
        if ($client_id) {
            $this->client = Client::find($client_id);
            $this->selectedClientId = $client_id;
        } else {
            $this->client = new Client();
            $this->selectedClientId = null;
        }
    }

    public function render()
    {
        return view('livewire.edit-clients-form');
    }

    public function saveClient()
    {
        $this->validate();
        $this->client->save();
        $this->emit('refreshClients');
    }
}
