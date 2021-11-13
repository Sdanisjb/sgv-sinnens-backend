<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoMTC extends Model
{
    use HasFactory;

    protected $table = 'permisos_mtc';

    protected $primaryKey = 'placa';

    protected $keyType = 'string';

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
