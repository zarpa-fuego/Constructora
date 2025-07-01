<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    protected $fillable = ['nombre', 'provincia_id'];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
>>>>>>> c9fd628b3ff62f2610b393ab1417eb8cd8f12007
}
