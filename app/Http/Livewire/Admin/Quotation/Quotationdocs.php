<?php

namespace App\Http\Livewire\Admin\Quotation;

use Livewire\Component;
use App\Models\Quotation;
use App\Models\QuotationDoc;
use Livewire\WithFileUploads;

class Quotationdocs extends Component
{
    use WithFileUploads;

    public $quotation;
    public $quotationDocs;

    public $nroNew;
    public $fechaNew;
    public $facturaNew;
    public $montoNew;

    protected $rules=[
        'nroNew'    => 'required',
        'fechaNew'  => 'required',
        'facturaNew'=> 'required',
        'montoNew'  => 'required'
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(Quotation $quotation){
        $this->quotation = $quotation;
    }

    public function render()
    {
        $this->quotationDocs = $this->quotation->quotationDocs;
        return view('livewire.admin.quotation.quotationdocs');
    }

    public function addFact(){
        $this->validate();

        $newdoc = New QuotationDoc;
        $newdoc->nro = $this->nroNew;
        $newdoc->quotation_id = $this->quotation->id;
        $newdoc->fecha = $this->fechaNew;
        $newdoc->monto = $this->montoNew;
        $newdoc->factura = $this->facturaNew->store('factura', 'public');

        $newdoc->save();

        $this->reset(['nroNew','fechaNew','facturaNew','montoNew' ]);
        $this->emit('refresh');
        $this->emit('calcTotal');
    }

    public function deleteFact(QuotationDoc $quotationdoc)
    {
        $quotationdoc->delete();
        $this->emit('refresh');
        $this->emit('calcTotal');
    }
}
