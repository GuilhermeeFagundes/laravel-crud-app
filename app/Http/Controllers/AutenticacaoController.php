<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Crypt;

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

  
        try {

            $senhaBanco = Crypt::decrypt($usuario->usu_senha);

            // comparar senha fornecida com a do banco

            if ($request->senha !== $senhaBanco) {

                return redirect()->route("loginForm")->with("error", "Usuário e/ou senha incorretos");
            }

            session([
                'id' => $usuario->usu_id,
                'nome' => $usuario->usu_nome,
                'email' => $usuario->usu_email
            ]);

            // dd($usuario);
            return redirect("index");
            
        } catch (\Exception $e) {

            return redirect()->route("loginForm")->with("error", "Usuário e/ou senha incorretos");
        }

    }

    public function logout(){
        session()->flush();
        return redirect()->route("loginForm");
    }
}
