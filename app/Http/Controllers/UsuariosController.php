<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //exibir o formulário de cadastro de usuário
    public function usuarioForm(){
        return view("usuario-Form");
    }

    // validar e processar o formulário de cadastro de usuário
    public function usuarioFormSubmit(Request $request){
       
        $request->validate([
            "nome" => "required|min:2|max:150",
            "email" => "required|email",
            "senha" => "required|min:6"
        ],[
            "nome.required" => "O campo nome é obrigatório",
            "nome.min" => "O nome deve conter no mínimo 2 caracteres",
            "nome.max" => "O nome deve conter no máximo 150 caracteres",
            "email.required" => "O campo email é obrigatório",
            "email.email" => "Digite um email válido",
            "senha.required" => "O campo senha é obrigatório",
            "senha.min" => "A senha deve conter no mínimo 6 caracteres"
        ]);
    }
}
