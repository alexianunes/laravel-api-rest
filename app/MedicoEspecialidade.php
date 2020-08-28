<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialidade extends Model
{
    protected $fillable = ['medico_id', 'especialidade_id'];
}
