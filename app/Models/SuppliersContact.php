<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class SuppliersContact extends Model
{
    use HasFactory;

    protected $table = 'supplierscontacts';

    protected $fillable = [
        'suppliers_id',
        'apellido_nombre',
        'mail',
        'telefono',
        'puesto',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

}
