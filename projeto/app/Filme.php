<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Categoria;

class Filme extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $fillable = [
    	'nome', 'lancamento', 'diretor'
    ];

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }
}