<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    
    // Nombre de la tabla
    protected $table = 'docentes';

    // Clave primaria
    protected $primaryKey = 'persona_dni';

    // Indicar que la clave primaria no es autoincremental
    public $incrementing = false;

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['persona_dni', /* other fillable fields */];

    // Definir la relación con el modelo Persona
    public function persona()
    {
        // Un Docente pertenece a una Persona a través de la columna 'dni' en Persona y 'persona_dni' en Docente
        return $this->belongsTo(Persona::class, 'dni', 'persona_dni');
    }
}
