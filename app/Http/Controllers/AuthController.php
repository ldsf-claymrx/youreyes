<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getViewLogin() {
        return view('login');
    }

    public function getViewRegister() {
        return view('register');
    }

    public function registerApplication(Request $request) {
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',

            'lastname.required' => 'Los apellidos son obligatorios.',
            'lastname.regex' => 'Los apellidos solo puede contener letras y espacios.',

            'position.required' => 'El ministerio que tienes actualmente es obligatorio.',

            'email.required' => 'El correo eletrónico es obligatorio.',
            'email.regex' => 'Solo ingresa el nombre de tu correo, el dominio lo pone por automatico.',

            'password.required' => 'La contraseña es obligatoria. Favor de llenar este campo.',
            'password.string' => 'La contraseña ingresada no es un formato valido.',

            'sex.required' => 'Por favor, seleccione una opción.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'position' => 'required',
            'email' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'password' => 'required|string',
            'sex' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $User = new User;
            $User->name = $request->input('name');
            $User->lastname = $request->input('lastname');
            $User->email = $request->input('email').'@cca.com';
            $User->password = Hash::make($request->input('password'));
            $User->position = $request->input('position');
            $User->active = '2';
            $User->sex = $request->input('sex');
            $User->authorization_level = 'ADMIN';
            $User->save();   

            return response()->json([
                'status' => 'success',
                'message' => 'Ahora solo espera a que aprueben tu solicitud, para poder entrar al sistema.',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Al intentar registrar una solicitud',
            ], 401);
        }

    }

    public function authLogin(Request $request) {

        $messages = [
            'email.required' => 'El correo eletrónico es obligatorio.',
            'email.email' => 'El correo electrónico ingresado, no cuenta con el formato Email.',
            'email.string' => 'El correo electrónico ingresado no es valido.',
            'password.required' => 'La contraseña es obligatoria. Favor de llenar este campo.',
            'password.string' => 'La contraseña ingresada no es un formato valido.'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();    
            return response()->json([
                'status' => 'success',
                'redirect' => url('/dashboard')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Credenciales incorrectas. Por favor, inténtelo de nuevo.',
        ], 401);
    }

    public function authLogout() {
        Auth::logout();
        return redirect('/');
    }
}
