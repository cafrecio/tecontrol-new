<?php

namespace App\Http\Livewire\Admin\Quotation;

use Livewire\Component;
use App\Models\Quotation;
use App\Models\QuotationState;
use App\Models\QuotationPriority;
use App\Models\QuotationType;
use App\Models\Client;
use App\Models\Product;
use App\Models\QuotationDetail;
use App\Models\Currency;

class Edit extends Component
{
    public $quotation;
    public $quotationStates;
    public $quotationPriorities;
    public $quotationTypes;
    public $clients;
    public $contacts;
    public $products;
    public $currencies;

    public $searchTerm;
    public $total;

    public $editDetalleId;

    protected $rules = [
        'quotation.nro' => 'required|numeric',
        'quotation.client_id' => 'required',
        'quotation.fecha' => 'required',
        'quotation.quotation_state_id' => 'required',
        'quotation.quotation_priority_id' => 'required',
        'quotation.quotation_type_id' => 'required',

        'quotation.solicitudCotizacion' => 'nullable',
        'quotation.cotizacion' => 'nullable',
        'quotation.ordenCompra' => 'nullable',
        'quotation.observaciones' => 'nullable',
        'quotation.contacto' => 'nullable',
        'quotation.ref' => 'nullable',
        'quotation.validezOferta' => 'nullable',
        'quotation.condicion' => 'nullable',
        'quotation.plazoEntrega' => 'nullable',
        'quotation.lugarEntrega' => 'nullable',
        'quotation.nota' => 'nullable',
        'quotation.fechaContacto' => 'nullable',
        'quotation.detalleContacto' => 'nullable'
    ];

    public function render()
    {
        $this->contacts = $this->quotation->client_id ? Client::find($this->quotation->client_id)->client : [];
        $this->products = Product::with('moneda')->search($this->searchTerm)->orderBy('descripcion_cotizacion')->get();
        
        $total = 0;
        foreach ($this->quotation->quotationDetails as $detail) {
            $subtotal = $detail['precio'] * $detail['cantidad'] * $detail['cotizacion'];
            $total += $subtotal;
        }
        $this->total = $total;

        return view('livewire.admin.quotation.edit');
    }

    public function mount(Quotation $quotation){
        $this->quotation = $quotation;
        $this->quotationStates = QuotationState::all();
        $this->quotationPriorities = QuotationPriority::all();
        $this->quotationTypes = QuotationType::all();
        $this->clients = Client::all();
        $this->products = Product::all();
        $this->currencies = Currency::all();
    }
}
