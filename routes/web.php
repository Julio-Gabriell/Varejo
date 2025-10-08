<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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

// Só acessível para cargo "admin"
// Route::get('/dashboard', function () {
//     return 'Bem-vindo, Admin!';
// })->middleware('cargo:admin,gerente');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/performance', [App\Http\Controllers\PerformanceController::class, 'index'])->name('performance');

Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index'])->name('produtos');
Route::get('/produtos/form', [App\Http\Controllers\ProdutosController::class, 'CriarProduto'])->name('produtos.criar')->middleware('cargo:admin,gerente');

Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('fornecedor');
Route::get('/fornecedores/form', [App\Http\Controllers\FornecedorController::class, 'CriarFornecedor'])->name('fornecedor.criar')->middleware('cargo:admin,gerente');