<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    protected $fillable = ['user_id', 'zona_id', 'estado', 'fecha_asignacion'];

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }

    public function historial()
    {
        return $this->hasOne(Historial::class);
    }
}
