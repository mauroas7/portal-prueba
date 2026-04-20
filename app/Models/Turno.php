<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha',
        'hora',
        'estado',
        'notas',
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora' => 'datetime:H:i',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
