<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = 'DNI';

    protected $keyType = 'string';

    public $timestamps = 'false';

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'DNI'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gerente_general()
    {
        return $this->hasOne(Gerente_General::class, 'DNI', 'DNI');
    }

    public function gerente_tecnico()
    {
        return $this->hasOne(Gerente_Tecnico::class, 'DNI', 'DNI');
    }

    public function admin_logistica()
    {
        return $this->hasOne(Admin_Logistica::class, 'DNI', 'DNI');
    }

    public function operador()
    {
        return $this->hasOne(Gerente_Tecnico::class, 'DNI', 'DNI');
    }
}
