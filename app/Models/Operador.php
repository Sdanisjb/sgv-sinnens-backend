<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    use HasFactory;

    protected $table = 'operadores';

    protected $primaryKey = 'DNI';

    protected $keyType = 'string';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'DNI'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'DNI', 'DNI');
    }
}
