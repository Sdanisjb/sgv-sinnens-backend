<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoAutrisa extends Model
{
    use HasFactory;

    protected $table = 'permisos_autrisa';

    protected $primaryKey = 'placa';

    protected $keyType = 'string';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'placa',
        'fecha_emision',
        'fecha_venc',
        'fecha_examen',
        'hora_lev_obs',
        'lugar_lev_obs'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa');
    }

    function observacion()
    {
        return $this->hasMany(ObservacionAutrisa::class, 'placa_vehiculo', 'placa');
    }
}
