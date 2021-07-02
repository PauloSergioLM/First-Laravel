<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'uf', 'email'];

    public function produtos(){

        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
