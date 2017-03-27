<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filme;

class Categoria extends Model
{
    protected $fillable = [
    	'nome'
    ];

    public function filmes()
    {
    	return $this->hasMany(Filme::class);
    }
}
