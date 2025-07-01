<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // o el nombre correcto de tu tabla
    protected $primaryKey = 'ID_Cliente'; // o el nombre correcto de tu PK

    public $timestamps = false; // Agrega esta línea

    protected $fillable = [
        'DNI',
        'Nombre',
        'Apellido_Paterno',
        'Apellido_Materno',
        'Correo',
        'Telefono',
        'Direccion',
        'Estado_Cliente',
    ];
}
