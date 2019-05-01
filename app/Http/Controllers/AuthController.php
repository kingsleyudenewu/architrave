<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->errorResponse('Invalid details');
        }

        try{
            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials)){
                return $this->errorResponse('Unauthorized');
            }

            if ( Auth::check() ) {
                $user = Auth::user();
                $tokenResult = $user->createToken(env("APP_SECRET"));

                return $this->successResponse('success', $tokenResult->accessToken);
            }
        }
        catch (\Exception $exception){
            return $this->errorResponse('faile', $exception->getMessage());
        }
    }
}
