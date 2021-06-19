<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Nome';
        $fornecedor->uf = 'Uf';
        $fornecedor->email = 'Email@email.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Nome teste',
            'uf' => 'ts',
            'email' => 'Emailteste@emailteste.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Nome-teste',
            'uf' => 'Ut',
            'email' => 'Emailt@teste.com'
     ]);

    }
}
