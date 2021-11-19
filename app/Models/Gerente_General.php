<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerente_General extends Model
{
    use HasFactory;

    protected $table = 'gerentes_generales';

    protected $primaryKey = 'DNI';

    protected $keyType = 'string';

    public $timestamps = false;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'DNI'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'DNI', 'DNI');
    }
}
