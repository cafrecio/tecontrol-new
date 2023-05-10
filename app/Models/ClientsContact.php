<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class ClientsContact extends Model
{
    use HasFactory;

    protected $table = 'clientscontacts';
    protected $fillable = [
        'idCliente',
        'apellido_nombre',
        'telefono',
        'mail',
        'puesto',
        'observaciones'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'idCliente');
    }
}
