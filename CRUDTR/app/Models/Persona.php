<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni'; // Definimos la clave primaria personalizada
    protected $keyType = 'string'; // Indicamos que el tipo de la clave primaria es string
    public $incrementing = false; // Indicamos que la clave primaria no es autoincremental
    protected $fillable = [ // Definimos los campos que pueden ser asignados masivamente
        'dni',
        'estado',
        'ruc',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'edad',
        'sexo',
        'foto',
        'email',
    ];

    // Definimos las relaciones con otras tablas

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'persona_dni', 'dni');
    }

    public function docente()
    {
        return $this->hasOne(Docente::class, 'persona_dni', 'dni');
    }

    //public function usuario()
    //{
    //    return $this->hasOne(Usuario::class, 'persona_dni', 'dni');
    //}
}
