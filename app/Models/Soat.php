<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soat extends Model
{
    use HasFactory;

    protected $table = 'soats';

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
