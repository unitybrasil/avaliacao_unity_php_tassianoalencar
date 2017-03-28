<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Filme;
use Toastr;

class CategoriasController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Request $request)
    {
    	try {
    		$categoria = new Categoria;
	    	$categoria->nome = $request->input('nome');
	    	$categoria->save();

	    	return $categoria;
    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }
}
