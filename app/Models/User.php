<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'email',
        'password',
        'role',
        'anio_egreso',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function isEgresado()
    {
        return $this->role === 'egresado';
    }

    public function isGestor()
    {
        return $this->role === 'gestor';
    }

    // Alias para compatibilidad con políticas/llamadas que usan isManager
    public function isManager()
    {
        return $this->isGestor();
    }

    // Alias para compatibilidad con calling isStudent() desde vistas/layouts
    public function isStudent()
    {
        return $this->isEgresado();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDirector()
    {
        return $this->role === 'director';
    }

    public function getFullNameAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    public function getInitialsAttribute()
    {
        $nombres = explode(' ', $this->nombres);
        $apellidos = explode(' ', $this->apellidos);
        return strtoupper(substr($nombres[0], 0, 1) . substr($apellidos[0], 0, 1));
    }
}
