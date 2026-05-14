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
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @if($produtos->count() > 0 )

                    @foreach($produtos as $produto)

                        <tr>
                            <td>{{ $produto -> pro_nome }}</td>
                            <td>R$ {{ number_format( $produto -> pro_preco, 2, ',', '.')}}</td>
                            <td>{{ $produto -> pro_descricao}}</td>
                            <td>
                                <a href="{{ route('produtoEdit', [ 'id'  => $produto -> pro_id ]) }}" class="btn btn-sm btn-warning">
                                    <i class ="bi bi-pencil-square"></i>
                                    Editar
                                </a>
                            </td>
                        </tr>

                    @endforeach

                @else
                    <tr>
                        <td colspan='4' class='text-center'>
                            Nenhum produto encontrado
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        @if(session("success"))
        <div class="alert alert-success m-3">
            {{session("success")}}
        </div>
        @endif

    </div>

</main>

@endsection