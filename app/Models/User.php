<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     use Notifiable;

    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];

    protected $hidden = ['password'];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function cortes()
    {
        return $this->hasMany(Corte::class);
    }
}
