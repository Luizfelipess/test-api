<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Method for create user
     *
     * @return void
     */
    public function create(Request $request)
    {
        $array = ['error' => ''];

        //validando
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }

        $email = $request->input('email');
        $password = $request->input('password');

        //criado novo usuário
        $newUser = new User();
        $newUser->email = $email;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->token = '';
        $newUser->save();

        return $array;
    }

    /**
     * Method for Login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $array = ['error' => ''];

        $creds = $request->only('email', 'password');

        //sera gerado ao logar
        $token = Auth::attempt($creds);

        if ($token) {
            $array['token'] = $token;
        } else {
            $array['error'] = 'Email e/ou senha incorretors';
        }

        return $array;
    }


    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $array = ['error' => ''];

        //$user = $request->user();

        //você vai pegar o usuario que esta logado com isso
        //$array['email'] = $user->email;

        //$user->tokens()->delete();

        Auth::logout();

        return $array;
    }

    /**
     * Verify user logged in
     *
     * @return void
     */
    public function me()
    {
        $array = ['error' => ''];

        $user = Auth::user();

        $array['email'] = $user->email;

        return $array;
    }
}
