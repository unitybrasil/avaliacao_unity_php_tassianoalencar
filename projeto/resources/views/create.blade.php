@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Novo filme</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('filmes::salvar') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label for="nome">Nome do filme</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome do filme" name="nome">

                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('lancamento') ? 'has-error' : '' }}">
                                    <label for="ano">Ano de lançamento</label>
                                    <input type="text" class="form-control" id="ano" placeholder="2017" name="lancamento">

                                    @if ($errors->has('lancamento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lancamento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diretor') ? 'has-error' : '' }}">
                                    <label for="diretor">Diretor</label>
                                    <input type="text" class="form-control" id="diretor" placeholder="Nome do diretor" name="diretor">

                                    @if ($errors->has('diretor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('diretor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" class="form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="0">Selecione uma categoria</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('categoria'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('categoria') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <button type="button" id="add-categoria" class="btn">add categoria</button>
                            </div>
                        </div>
 
                        <button type="submit" class="btn btn-default">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myForm" class="hide">
    <form id="popForm" method="post">
        <div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="text" name="nome">
            </div>
            <button type="button" class="btn btn-primary" data-loading-text="Sending info.."><em class="icon-ok"></em> Save</button>
        </div>
    </form>
</div>
@endsection
