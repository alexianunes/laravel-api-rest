<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{

    public function login(Request $request){
        $data = $request->only([
            'username',
            'password'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401); 
        }

        if(Auth::attempt($data)){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('laravel-api')-> accessToken; 

            return response()->json(['success' => $success], 200); 
        } 
        
        return response()->json(['error'=>'Unauthorised'], 401); 
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:3']
        ]);
    }
}
