@extends('template.main_template')

@section('content')

<main class="container mt-5 w-50">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                <i class="bi bi-person-plus"></i>
                Editar Produtos
            </h3>

            <form method="POST" action="{{route('produtoEditSubmit')}}">
                @csrf
                <input type="hidden" name="id" value="{{$produto->pro_id}}"/>
                <!-- NOME -->
                <div class="mb-3">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite o nome do produto"
                        value="{{ old('nome', $produto->pro_nome)}}">
                </div>
                @error('nome')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Descricao</label>
                    <input type="text" name="descricao" class="form-control" placeholder="Digite a descrição do produto"
                        value="{{ old('descricao', $produto->pro_descricao)}}">
                </div>
                @error('descricao')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <!-- SENHA -->
                <div class="mb-3">
                    <label class="form-label">Preço do Produto</label>
                    <input type="number" name="preco" class="form-control" placeholder="0.00" step = "0.01" value = "{{ old('preco', $produto->pro_preco)}}">
                </div>

                @error('preco')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <!-- BOTÕES -->
                <div class="d-flex justify-content-between">

                    <a href="#" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Voltar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i>
                        Cadastrar
                    </button>

                </div>

            </form>

        </div>

        @if(session("success"))
        <div class="alert alert-success m-3">
            {{session("success")}}
        </div>
        @endif

    </div>

</main>

@endsection