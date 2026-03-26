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


        //Buscar todos os registros entre 5 e 10
        $alunos = Aluno::whereBetween('id', [5, 10])->get()->toArray();

        /* try {
             //Buscar um registro pelo id
            $aluno = Aluno::find(100);
             echo "ID: ".$aluno['id']." - NOME: ".$aluno['nome']. " Curso: ".$aluno['curso']."<hr>";

             } catch (\Exception $e) {
             echo "Registro não encontrado";
         } */
        
        //Buscar o primeiro registro que atenda uma condição
      try {
            $aluno = Aluno::where('id', '>', 5)->first()->toArray();
            echo "ID: ".$aluno['id']." - NOME: ".$aluno['nome']. " Curso: ".$aluno['curso']."<hr>";

        } catch (\Exception $e) {
            echo "Registro não encontrado";
        }
    
    // select count(*) from alunos
        $totalAlunos = Aluno::count();
        echo "Total de alunos: " . $totalAlunos;


    //select avg(id) from alunos
    $mediaId = Aluno::avg('id');
    echo "<br>Média dos Ids: ". $mediaId;

    //select sum(id) from alunos
    $somaId = Aluno::sum('id');
    echo "<br>Soma dos Ids: ". $somaId;

    //select max(id) from alunos
    $maxId = Aluno::max('id');
    echo "<br>Maximo dos Ids: ". $maxId;

    //select min(id) from alunos
    $minId = Aluno::min('id');
    echo "<br>Minimo dos Ids: ". $minId;

        // echo "<pre>";
        // print_r($alunos);
        // echo"</pre>";

        // foreach($alunos as $aluno) {
        //     echo "ID: ".$aluno['id']." - NOME: ".$aluno['nome']. " Curso: ".$aluno['curso']."<hr>";
        // }

    }

    public function insert (){
        echo "<h1> INSERT </h1>";

        // Inserir novo registro

        $aluno = new Aluno();
        $aluno->nome = "Maria Silva";
        $aluno->curso = "Engenharia";
        $aluno->matricula = "123";
        $aluno->save();
    }

    public function update (){
        echo "<h1> UPDATE </h1>";
    }

    public function delete (){
        echo "<h1> DELETE </h1>";
    }
}
