<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    protected $primaryKey = 'ID_Terrreno';
    public $incrementing = true;
    public $timestamps = false; // Si no usas created_at/updated_at
}
