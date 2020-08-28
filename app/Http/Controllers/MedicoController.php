<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('medicos.index');
    }

    public function create(){
        return view('medicos.create');
    }

    public function edit(){
        return view('medicos.edit');
    }

    public function destroy(){
        return view('medicos.destroy');
    }
}
