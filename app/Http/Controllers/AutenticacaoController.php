<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class AutenticacaoController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function loginFormSubmit(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'senha' => 'required|min:6',
            ],

            [
                'email.required' => 'O campo email é obrigatório',
                'email.email' => 'O campo email deve ser um endereço de email válido',
                'senha.required' => 'O campo senha é obrigatório',
                'senha.min' => 'A senha deve conter no minimo 6 caracteres'
            ]
        );

        $usuario = Usuarios::where('usu_email', $request->email)->first();

        if (!$usuario) {
            return redirect()->route("loginForm")->with("error", "Usuario não encontrado.");
        }
    }
}
