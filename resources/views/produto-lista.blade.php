@extends('template.main_template')

@section('content')

<main class="container mt-5">

    <div>

        <div class="d-flex justify-content-between align-items-center">

            <h3 class="mb-4">
                <i class="bi bi-plus-circle"></i>
                Lista de Produtos
            </h3>
            
            <a href="{{ route('produtoForm')}}" class="btn btn-primary mb-3">
                <i class="bi bi-person-plus"> </i>
                Cadastrar Produto
            </a>



        </div>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>

        @if(session("success"))
        <div class="alert alert-success m-3">
            {{session("success")}}
        </div>
        @endif

    </div>

</main>

@endsection