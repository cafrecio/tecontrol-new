<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'moneda',
        'textoNota',
        'compra',
        'venta',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
