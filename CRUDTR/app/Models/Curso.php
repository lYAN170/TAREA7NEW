<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estudiante_id', // Cambiar 'docente_id' por 'estudiante_id'
        'estado',
    ];

    public function docente()
    {
    return $this->belongsTo(Estudiante::class, 'docente_id');
    }

}
