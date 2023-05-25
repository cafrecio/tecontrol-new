<?php

namespace App\Http\Livewire\Admin\Doc;

use App\Models\Client;
use App\Models\Quotation;
use Livewire\Component;

class Index extends Component
{
    public $ano;
    public $mes;
    public $client_id;
    public $quotations;
    public $clients;

    public function mount(){
        $this->ano = date('Y');
        $this->clients=Client::whereHas('quotations', function($query){
            $query->whereYear('fecha', $this->ano);
        })->get();
    }

    public function render()
    {
        $quotations = Quotation::whereYear('fecha', $this->ano);

        if ($this->mes){ 
            $quotations = $quotations->whereMonth('fecha', $this->mes);
            $this->clients=Client::whereHas('quotations', function($query){
                $query->whereYear('fecha', $this->ano);
                if ($this->mes) 
                    $query->whereMonth('fecha', $this->mes);
            })->get();
        }
        else{
            $this->clients=Client::whereHas('quotations', function($query){
                $query->whereYear('fecha', $this->ano);
            })->get();
        }

        if($this->client_id) 
            $quotations = $quotations->where('client_id', $this->client_id);

        $this->quotations =$quotations->orderBy('fecha')->get();

        return view('livewire.admin.doc.index');
    }

    public function borrarFiltros(){
        $this->ano = date('Y');
        $this->mes = null;
        $this->client_id = null;
    }
}
