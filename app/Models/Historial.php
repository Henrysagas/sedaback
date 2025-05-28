<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = ['corte_id', 'tecnico_id', 'observaciones', 'estado_final'];

    public function corte()
    {
        return $this->belongsTo(Corte::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }
}
