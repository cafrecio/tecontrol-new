<?php

namespace App\Http\Livewire\Admin\Quotation;

use App\Models\Client;
use App\Models\Quotation;
use App\Models\QuotationState;
use Livewire\Component;
use App\Models\QuotationPriority;

class Index extends Component
{
    public $cotizaciones;
    public $cliente_id;
    public $finalizadas = false;
    public $clients;
    public $estado_id = 2;
    public $quotationStates;
    public $quotationPriorities;
    public $prioridad_id;
    
    public function mount($cliente_id = null){
        $this->cliente_id = $cliente_id;
    }
    public function render()
    {   
        $this->cotizaciones = Quotation::orderBy('fecha');

        if($this->cliente_id){
            $this->cotizaciones = $this->cotizaciones->where('client_id', $this->cliente_id);
        }

        if($this->estado_id){
            $this->cotizaciones = $this->cotizaciones->where('quotation_state_id', $this->estado_id);
        }

        if($this->prioridad_id){
            $this->cotizaciones = $this->cotizaciones->where('quotation_priority_id', $this->prioridad_id);
        }

        if(!$this->finalizadas){
            $this->cotizaciones = $this->cotizaciones->where('quotation_state_id', '<', 5);
        }

        
        $this->cotizaciones = $this->cotizaciones->get();
        $this->clients = Client::whereHas('quotations')->get();
        $this->quotationStates = QuotationState::all();
        $this->quotationPriorities = QuotationPriority::all();


        return view('livewire.admin.quotation.index');
    }
}
