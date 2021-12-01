<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'registros_mantenimiento';

    protected $primaryKey  = 'id';

    public $timestamps = false;

    protected $fillable = [
        'fecha_emision',
        'fecha_salida',
        'nombre_taller',
        'km_actual',
        'nro_factura',
        'nro_proforma',
        'placa_vehiculo'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa_vehiculo', 'placa');
    }

    public function detalleMantenimiento()
    {
        return $this->hasMany(DetalleMantenimiento::class, 'id_registro', 'id');
    }

    public function observacionMantenimiento()
    {
        return $this->hasMany(ObservacionMantenimiento::class, 'id_registro', 'id');
    }
}
