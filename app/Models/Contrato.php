<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'ID_Contrato';
    public $timestamps = false;
    protected $fillable = [
        'ID_Cliente', 'ID_Terreno', 'Fecha_Inicio', 'Fecha_Firma', 'Estado_Contrato'
    ];
}
