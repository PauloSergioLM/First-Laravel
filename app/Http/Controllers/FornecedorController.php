<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $for = [
            0 => ['nome' => 'joão', 'status' => 'n', 'cpf' => null, 'ddd' => '11', 'telefone' => '98181-8181'],
            1 => ['nome' => 'Victor', 'status' => 's', 'cpf' => '010.000.000-00', 'ddd' => '12', 'telefone' => '98181-0000'],
            2 => ['nome' => 'Sergio', 'status' => 's', 'cpf' => '010.010.000-00', 'ddd' => '32', 'telefone' => '98181-1111'],
            3 => ['nome' => 'Paulo', 'status' => 's', 'cpf' => '000.000.000-00', 'ddd' => '18', 'telefone' => '98184-1874'],
            4 => ['nome' => 'Lima', 'status' => 'n', 'cpf' => '011.000.000-00', 'ddd' => '85', 'telefone' => '98181-0101']];
            $msg = isset($for[1]['cpf']) ? 'CPF cadastrado' : 'Não tem CPF esse corno';
            echo $msg;
        return view('app.fornecedor.index', compact('for'));
    }
}
