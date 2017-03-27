@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 barra-acao">
            <a href="{{ route('filmes::cadastrar') }}" class="pull-right btn btn-default">Cadastrar filme</a>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Catálogo de filmes
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Ano de lançamento</th>
                                <th>Diretor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($filmes as $filme)
                            <tr>
                                <td>{{ $filme->id }}</td>
                                <td>{{ $filme->nome }}</td>
                                <td>{{ $filme->categoria->nome }}</td>
                                <td>{{ $filme->lancamento }}</td>
                                <td>{{ $filme->diretor }}</td>
                                <td>
                                    <a href="{{ route('filmes::deletar') }}" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                                 document.getElementById('deletar-filme').submit();">
                                        Excluir
                                    </a>

                                    <form id="deletar-filme" action="{{ route('filmes::deletar') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_delete" value="{{ $filme->id }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
