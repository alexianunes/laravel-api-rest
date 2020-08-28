<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Medico;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $client = new Client([
        //     'base_uri' => 'http://127.0.0.1:8000',
        //     'connect_timeout' => false,
        // ]);
        // $response = $client->request('GET', '/api/medicos');


        $request = Request::create('/api/medicos', 'GET');
        $medicos = json_decode(Route::dispatch($request)->getContent());

        return view('home', ['medicos' => $medicos]);
    }
}
