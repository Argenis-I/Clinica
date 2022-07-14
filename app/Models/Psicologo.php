<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;
    //Función de relación de Psicólogo a paciente

    public function paciente(){

        return $this->belongsTo('App\Models\Paciente');
    }
    
}


