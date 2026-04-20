<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user has a specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if user is a patient
     */
    public function isPaciente(): bool
    {
        return $this->hasRole('paciente');
    }

    /**
     * Check if user is a doctor
     */
    public function isMedico(): bool
    {
        return $this->hasRole('medico');
    }

    /**
     * Check if user is a director
     */
    public function isDirector(): bool
    {
        return $this->hasRole('director');
    }

    /**
     * Check if user has admin privileges (medico or director)
     */
    public function isAdmin(): bool
    {
        return $this->isMedico() || $this->isDirector();
    }

    /**
     * Get the patient profile for the user.
     */
    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}
