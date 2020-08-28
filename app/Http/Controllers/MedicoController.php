<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Especialidade;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $medicos = Medico::get();
        dd($medicos);
        return view('medicos.index');
    }

    public function create(){
        $especialidadesArray = Especialidade::get();

        return view('medicos.create', ['especialidadesArray' => $especialidadesArray]);
    }

    public function edit($id){
        $especialidadesArray = Especialidade::get();

        $request = Request::create('/api/medicos/show', 'GET', array('id' => $id));
        $response = json_decode(Route::dispatch($request)->getContent());

        return view('medicos.edit', ['especialidadesArray' => $especialidadesArray, 'medico' => $response]);
    }

}
