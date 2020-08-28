<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['nome', 'crm', 'telefone'];


    /** UM MÉDICO PODE TER N ESPECIALIDADES */
    public function especialidades(){
        return $this->hasMany('App\MedicoEspecialidade', 'medico_id', 'id');
    }

    public function search($data, $totalPage)
    {
        return $this->where('nome', $data['key-search'])
                    ->orWhere('crm', 'LIKE', "%{$data['key-search']}%")
                    ->paginate($totalPage);
    }
}
