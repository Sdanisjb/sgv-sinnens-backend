<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoTranspMercancia extends Model
{
    use HasFactory;

    protected $table = 'permisos_transp_mercancia';

    protected $primaryKey = 'placa';

    protected $keyType = 'string';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'placa',
        'fecha_renovacion',
        'fecha_venc',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa');
    }
}
