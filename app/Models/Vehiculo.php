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

    public $timestamps = false;

    public $incrementing = false;

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

    public function PermisoMTC()
    {
        return $this->hasOne(PermisoMTC::class, 'placa');
    }
    public function PermisoTranspMercancia()
    {
        return $this->hasOne(PermisoTranspMercancia::class, 'placa');
    }
    public function Soat()
    {
        return $this->hasOne(Soat::class, 'placa');
    }

    public function RegistrosMantenimiento()
    {
        return $this->hasMany(RegistroMantenimiento::class, 'placa_vehiculo', 'placa');
    }
}
