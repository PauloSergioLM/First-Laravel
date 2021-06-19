<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'teste1';
        $contato->telefone = '(00) 00000-0000';
        $contato->email = 'emailteste@teste.com';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Nada';
        $contato->save();
        */
        factory(SiteContato::class, 100)->create();
    }
}
