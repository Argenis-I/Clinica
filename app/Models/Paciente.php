<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public function psicologos(){

        return $this->hasMany('App\Models\Psicologo','paciente_id','id');
    }

}
