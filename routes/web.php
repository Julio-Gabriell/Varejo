<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


// Rota para redirecionar o usuário ao Google
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user(); // sem stateless()

    // Exemplo: Criar/Logar usuário
    $user = \App\Models\User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'avatar' => $googleUser->getAvatar(),
        'password' => Hash::make(Str::random(16)),
    ]);

    Auth::login($user);

    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/performance', [App\Http\Controllers\PerformanceController::class, 'index'])->name('performance');

Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index'])->name('produtos');

Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('fornecedor');

Route::middleware('cargo:adm,gerente')->group(function () {
    Route::get('/produtos/form', [App\Http\Controllers\ProdutosController::class, 'ViewCriarProduto'])->name('produtos.form');
    Route::post('/produtos/criar', [App\Http\Controllers\ProdutosController::class, 'CriarProduto'])->name('produtos.criar');
    Route::get('/produtos/{id}/formeditar', [App\Http\Controllers\ProdutosController::class, 'VierEditarProduto'])->name('produtos.formEditar');
    Route::put('/produtos/{id}/editar', [App\Http\Controllers\ProdutosController::class, 'EditarProduto'])->name('produtos.editar');
    Route::delete('produtos/{id}/deletar', [App\Http\Controllers\ProdutosController::class, 'deletar'])->name('produtos.deletar');

    Route::get('/fornecedores/form', [App\Http\Controllers\FornecedorController::class, 'ViewCriarFornecedor'])->name('fornecedor.form');
    Route::post('/fornecedores/criar', [App\Http\Controllers\FornecedorController::class, 'CriarFornecedor'])->name('fornecedor.criar');
});