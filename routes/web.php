<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('auth.login');
});


/*
|--------------------------------------------------------------------------
| AUTENTICAÇÃO VIA GOOGLE
|--------------------------------------------------------------------------
*/

// Redireciona ao Google
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

// Callback do Google
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user(); // sem stateless()

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name'      => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar'    => $googleUser->getAvatar(),
            'password'  => Hash::make(Str::random(16)),
        ]
    );

    Auth::login($user);

    return redirect('/home');
});

Auth::routes();


/*
|--------------------------------------------------------------------------
| ROTAS PRINCIPAIS
|--------------------------------------------------------------------------
*/

Route::get('/home',         [App\Http\Controllers\HomeController::class,       'index'])->name('home');
Route::get('/performance',  [App\Http\Controllers\PerformanceController::class,'index'])->name('performance');
Route::get('/produtos',     [App\Http\Controllers\ProdutoController::class,    'index'])->name('produtos');
Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('fornecedor');
Route::get('/vendas',       [App\Http\Controllers\VendaController::class,      'index'])->name('vendas');
Route::get('/dividas',      [App\Http\Controllers\DividaController::class,     'index'])->name('dividas');

/*
|----------------------------------------------------------------------
| DÍVIDAS
|----------------------------------------------------------------------
*/

    Route::get('/dividas/form',              [App\Http\Controllers\DividaController::class, 'create'])->name('divida.form');
    Route::post('/dividas/criar',            [App\Http\Controllers\DividaController::class, 'store'])->name('divida.criar');
    Route::get('/dividas/{id}/formeditar',   [App\Http\Controllers\DividaController::class, 'edit'])->name('divida.formEditar');
    Route::put('/dividas/{id}/editar',       [App\Http\Controllers\DividaController::class, 'update'])->name('divida.editar');
    Route::delete('dividas/{id}/deletar',    [App\Http\Controllers\DividaController::class, 'destroy'])->name('divida.deletar');


/*
|--------------------------------------------------------------------------
| ROTAS DE VENDAS
|--------------------------------------------------------------------------
*/

Route::get('/vendas/form',              [App\Http\Controllers\VendaController::class, 'create'])->name('vendas.form');
Route::post('/vendas/criar',            [App\Http\Controllers\VendaController::class, 'store'])->name('vendas.criar');
Route::get('/vendas/{id}/formeditar',   [App\Http\Controllers\VendaController::class, 'edit'])->name('vendas.formEditar');
Route::put('/vendas/{id}/editar',       [App\Http\Controllers\VendaController::class, 'update'])->name('vendas.editar');
Route::delete('vendas/{id}/deletar',    [App\Http\Controllers\VendaController::class, 'destroy'])->name('vendas.deletar');


/*
|--------------------------------------------------------------------------
| ROTAS RESTRITAS (ADM / GERENTE)
|--------------------------------------------------------------------------
*/

Route::middleware('cargo:adm,gerente')->group(function () {

    /*
    ----------------------------------------------------------------------
    | PRODUTOS
    ----------------------------------------------------------------------
    */
    Route::get('/produtos/form',             [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.form');
    Route::post('/produtos/criar',           [App\Http\Controllers\ProdutoController::class, 'store'])->name('produtos.criar');
    Route::get('/produtos/{id}/formeditar',  [App\Http\Controllers\ProdutoController::class, 'edit'])->name('produtos.formEditar');
    Route::put('/produtos/{id}/editar',      [App\Http\Controllers\ProdutoController::class, 'update'])->name('produtos.editar');
    Route::delete('produtos/{id}/deletar',   [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produtos.deletar');

    /*
    ----------------------------------------------------------------------
    | FORNECEDORES
    ----------------------------------------------------------------------
    */
    Route::get('/fornecedores/form',              [App\Http\Controllers\FornecedorController::class, 'create'])->name('fornecedor.form');
    Route::post('/fornecedores/criar',            [App\Http\Controllers\FornecedorController::class, 'store'])->name('fornecedor.criar');
    Route::get('/fornecedores/{id}/formeditar',   [App\Http\Controllers\FornecedorController::class, 'edit'])->name('fornecedor.formEditar');
    Route::put('/fornecedores/{id}/editar',       [App\Http\Controllers\FornecedorController::class, 'update'])->name('fornecedor.editar');
    Route::delete('fornecedores/{id}/deletar',    [App\Http\Controllers\FornecedorController::class, 'destroy'])->name('fornecedor.deletar');

});