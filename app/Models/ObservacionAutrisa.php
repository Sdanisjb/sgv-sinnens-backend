<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservacionAutrisa extends Model
{
    use HasFactory;

    protected $table = 'observaciones_autrisa';

    public $timestamps = false;

    protected $fillable = [
        'placa_vehiculo',
        'descripcion'
    ];

    public function permisoAutrisa()
    {
        return $this->belongsTo(PermisoAutrisa::class, 'placa', 'placa_vehiculo');
    }
}
