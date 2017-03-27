<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Filme;
use Toastr;

class FilmesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function create()
    {
    	$categorias = Categoria::all();

    	return view('create', [
    		'categorias' => $categorias
    	]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'lancamento' => 'required',
            'diretor' => 'required',
            'categoria' => 'required|not_in:0'
        ]);

        $nome = $request->input('nome');
        $lancamento = $request->input('lancamento');
        $diretor = $request->input('diretor');
        $categoria = $request->input('categoria');

        $validacaoFilme = Filme::where('nome', $nome)->first();

        if (count($validacaoFilme)) {

            if ($validacaoFilme->categoria_id == $categoria) {
                Toastr::error('Você não pode criar um filme com mesmo nome e mesmo diretor.', 'Ops!');
                return redirect()->route('filmes::cadastrar');
            }            
        }

        try {
            $filme = new Filme;
            $filme->nome = $nome;
            $filme->lancamento = $lancamento;
            $filme->diretor = $diretor;
            $filme->categoria_id = $categoria;
            $filme->save();

            Toastr::success('Filme cadastrado com sucesso.', 'Yeah!');
            return redirect()->route('filmes::listar');

        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Ops!');
            return redirect()->route('filmes::listar');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id_delete');

        try {
            $filme = Filme::findOrFail($id);
            $filme->delete();

            Toastr::success('Filme deletado com sucesso.', 'Yeah!');
            return redirect()->route('filmes::listar');

        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Ops!');
            return redirect()->route('filmes::listar');
        }
    }
}
