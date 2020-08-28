<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        // $client = new Client([
        //     'base_uri' => 'http://127.0.0.1:8000',
        //     'connect_timeout' => false,
        //     'timeout'         => 30.0,
        // ]);
        // $response = $client->request('POST', '/api/login', [
        //     'form_params' => [
        //         'username' => $request->input('username'),
        //         'password' => $request->input('password'),
        //     ]
        // ]);

        $data = $request->only([
            'username',
            'password'
        ]);

        $request = Request::create('/api/login', 'POST', $data);

        $response = json_decode(Route::dispatch($request)->getContent());

        if($response['success']) {
            return redirect()->route('home');
        }
    }
}
