<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envios extends Model
{
    use HasFactory;
    protected $fillable = [
        'idcliente',
        'idpaquete',
        'domicilio',
        'envio',
    ];
}
