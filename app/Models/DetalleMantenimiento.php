<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'detalles_mantenimiento';

    public $timestamps = false;

    protected $fillable = [
        'id_registro',
        'descripcion',
        'monto'
    ];

    public function registroMantenimiento()
    {
        return $this->belongsTo(RegistroMantenimiento::class, 'id_registro', 'id');
    }
}
