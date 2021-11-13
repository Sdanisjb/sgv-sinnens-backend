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
}
