<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
     protected $fillable = ['corte_id', 'foto_url', 'latitud', 'longitud'];

    public function corte()
    {
        return $this->belongsTo(Corte::class);
    }
}
