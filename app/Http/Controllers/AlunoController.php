<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function select (){
        echo "<h1> SELECT </h1>";

        //Buscar todos os registros
        $alunos = Aluno::all()->toArray();
        //Select from alunos


        //Ordenar registror por nome
        $alunos = Aluno::orderBy('nome')->get()->toArray();


        //Ordenar registror por nome decrescente
        $alunos = Aluno::orderBy('nome', 'desc')->get()->toArray();


        //Buscar os 3 primeiros registros
        $alunos = Aluno::limit(3)->get()->toArray();
        // select * from alunos limit 3;

        //Buscar os 3 primeiros registros ordenados por nome
        $alunos = Aluno::orderBy('nome')->limit(3)->get()->toArray();
        // select * from alunos order by nome limit 3;


        //Buscar todos os registros com ID > 5
        $alunos = Aluno::where('id', '>', 5)->get()->toArray();


        // echo "<pre>";
        // print_r($alunos);
        // echo"</pre>";

        foreach($alunos as $aluno) {
            echo "ID: ".$aluno['id']." - NOME: ".$aluno['nome']. " Curso: ".$aluno['curso']."<hr>";
        }

    }

    public function insert (){
        echo "<h1> INSERT </h1>";
    }

    public function update (){
        echo "<h1> UPDATE </h1>";
    }

    public function delete (){
        echo "<h1> DELETE </h1>";
    }
}
