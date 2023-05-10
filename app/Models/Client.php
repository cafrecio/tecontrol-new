<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientsContact;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'razon_social',
        'tipo_cliente',
        'cuit',
        'direccion',
        'telefono',
        'condicion',
        'observaciones',
    ];

    public function client()
    {
        return $this->hasOne(ClientsContact::class, 'idCliente');
    }

    public function scopeSearch(Builder $query, Request $request): Builder
    {
        return $query->when($request->input('razon_social'), function ($query) use ($request) {
            return $query->where('razon_social', 'like', '%' . $request->input('razon_social') . '%');
        })->when($request->input('tipo_cliente'), function ($query) use ($request) {
            return $query->where('tipo_cliente', 'like', '%' . $request->input('tipo_cliente') . '%');
        });
    }
    
}
