<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'user_id',
        'especialidad',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class, 'medico_id');
    }
}
