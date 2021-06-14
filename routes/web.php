<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return 'Ola!, Bem vindo ao curso!';
});
*/
/*Route::get('/sobre-nos', function () {
    return 'Sobre nós';
});
*/
/*Route::get('/contato', function () {
    return 'Contatos';
});
*/
/* Route::get($uri, $callback) return */

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato','ContatoController@contato')->name('site.contato');

Route::get('/login', function(){return 'login'; })->name('site.login');


Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'clientes'; })->name('app.clientes');

    Route::get('/fornecedores', function(){return 'fornecedores'; })->name('app.fornecedores');

    Route::get('/produtos', function(){return 'produtos'; })->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'Roda 1';
})->name('site.rota1');
  

Route::get('/rota2', function(){
  return redirect()->route('site.rota1');
})->name('site.rita2');

//Route::redirect('/rota2','/rota1');

route::fallback(function(){
    echo '<center><br><br><h2>A rota acessada não existe. <br> <a href="'.route('site.index').'">Click aqui</a> para ir para a página principal.</h2></center>';
});