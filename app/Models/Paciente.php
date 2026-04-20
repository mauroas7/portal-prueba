<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // "Lista blanca" de campos permitidos para la asignación masiva
    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'dni',
    ];

    /**
     * Get the user account associated with the patient profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
