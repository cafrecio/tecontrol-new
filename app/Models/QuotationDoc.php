<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'nro',
        'fecha',
        'factura',
        'monto'
    ];
}
