<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $primaryKey = 'placa';

    protected $keyType = 'string';

    protected $fillable = [
        'usuario',
        'anho',
        'tipo',
        'unidad',
        'placa'
    ];

    public function PermisoAutrisa()
    {
        return $this->hasOne(PermisoAutrisa::class, 'placa');
    }
}
