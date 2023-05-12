<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\ClientsContact;
use Illuminate\Http\Request;

class ClientsTable extends Component
{
    public $clients;
    public $client;
    public $clientContact;
    public $searchClient;
    public $clientStatus;

    protected $listeners = [
        'refreshClients' => '$refresh',
    ];

    public function mount()
    {
        $this->clients = Client::all();

        if ($this->client && $this->client->clientContact && $this->client->clientContact->id) {
            $this->clientContact = ClientsContact::find($this->client->clientContact->id);
        }
    }

    public function render()
    {
        $this->clients = Client::all();

        if ($this->client && $this->client->clientContact && $this->client->clientContact->id) {
            $this->clientContact = ClientsContact::find($this->client->clientContact->id);
        }

        $query = Client::query();

        if ($this->searchClient) {
            $query->where('razon_social', 'like', '%' . $this->searchClient . '%');
        }

        if ($this->clientStatus) {
            $query->where('tipo_cliente', '=', $this->clientStatus);
        }

        $this->clients = $query->orderBy('razon_social')->get();

        return view('livewire.clients-table');
    }


    public function selectClient(Client $client)
    {
        $this->emit('loadClient', $client->id);
    }

    public function updatedClientStatus()
    {
        $this->render();
    }
    public function delete(Client $client)
    {
        $client->delete();
    }
}
