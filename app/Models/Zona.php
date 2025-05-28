<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
       protected $fillable = ['nombre', 'descripcion'];

    public function cortes()
    {
        return $this->hasMany(Corte::class);
    }
}
