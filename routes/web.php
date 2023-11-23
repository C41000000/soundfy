<?php
use App\Http\Controllers\FeedAtividadesController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ArtistaController;
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

//Route::get('/', function () {
//    return view('login');
//});


Route::middleware(['web'])->prefix('autenticacao')->group(function (){
    Route::post('/cadastro', [AutenticacaoController::class, 'cadastro'])->name('cadastro');
    Route::any('/login', [AutenticacaoController::class, 'login'])->name('login');
    Route::get('/logout', [AutenticacaoController::class, 'logout'])->name('logout');

});


Route::get('/', [FeedAtividadesController::class, 'index'])->name('inicio');

Route::prefix('musica')->group(function () {
    Route::get('/', [MusicaController::class, 'index']);
    Route::get('/cadastro', [MusicaController::class, 'showForm']);
    Route::post('/cadastro', [MusicaController::class, 'store']);
});

Route::prefix('genero')->group(function (){
    Route::post('/store', [GeneroController::class, 'store'])->name('store');
});


Route::prefix('artista')->group(function (){
    Route::get("/perfil/{id}", [ArtistaController::class, 'index'])->name("perfil");
    Route::any('/edit/{id}', [ArtistaController::class, 'edit'])->name('editar-usuario');
    Route::any('/descricao/{id}', [ArtistaController::class, 'updateDescription'])->name('editar-descricao');
    Route::post('/store', [ArtistaController::class, 'store']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
