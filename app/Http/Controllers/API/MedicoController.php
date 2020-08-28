<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Medico; 
use App\Especialidade; 
use App\MedicoEspecialidade;
use Illuminate\Support\Facades\Auth; 
use Validator;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $medicos = Medico::paginate(5);
        
        return response()->json(['data' => $medicos]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $especialidades = $data['especialidades'];

        $qtd_especialidades = count($especialidades);
        unset($data['especialidades']);

        if( $insert = Medico::create($data) ){
            for($i = 0; $i < $qtd_especialidades; $i++) {

                if(!empty($especialidades[$i])){
                    $especialidadeMedico = MedicoEspecialidade::create([
                        'medico_id' => $insert->id,
                        'idespecialidade' => $especialidades[$i]
                    ]);
                }
                
            }

            return response()->json($insert);
        }

        return response()->json(['error' => 'error_insert'], 500);

    }

    public function show($id)
    {
        if( !$medico = Medico::find($id) )
           return response()->json(['error' => 'error_not_found']);
        
        return response()->json(['data' => $medico]);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $especialidades = $data['especialidades'];

        $qtd_especialidades = count($especialidades);
        unset($data['especialidades']);

        if( !$medico = Medico::find($id) )
           return response()->json(['error' => 'error_not_found']);

        if( $update = Medico::update($data) ){

            $delete = MedicoEspecialidade::where('medico_id', $id)->delete();

            for($i = 0; $i < $qtd_especialidades; $i++) {

                if(!empty($especialidades[$i])){
                    $especialidadeMedico = MedicoEspecialidade::create([
                        'medico_id' => $id,
                        'idespecialidade' => $especialidades[$i]
                    ]);
                }
                
            }

            return response()->json(['response' => $update]);
        }


        return response()->json(['error' => 'error_not_update'], 500);
    }

    public function destroy($id)
    {
        if( !$medico = Medico::find($id) )
            return response()->json(['error' => 'error_not_found']);

        if( $delete = $medico->delete() ){

            $delete = MedicoEspecialidade::where('medico_id', $id)->delete();

            return response()->json(['response' => $delete]);
        }
        
        return response()->json(['error' => 'error_not_delete'], 500);

    }

    public function search(Request $request)
    {
        $data = $request->all();
        $medicos = Medico::search($data, 5);

        return response()->json(['data' => $medicos]);

    }
}
