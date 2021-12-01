<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservacionMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'observaciones_mantenimiento';

    protected $primaryKey = null;


    public $timestamps = false;

    protected $fillable = [
        'id_registro',
        'descripcion'
    ];

    public function registroMantenimiento()
    {
        return $this->belongsTo(RegistroMantenimiento::class, 'id_registro', 'id');
    }
}
