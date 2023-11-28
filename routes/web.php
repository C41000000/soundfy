<?php
use App\Http\Controllers\FeedAtividadesController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ProjetoMusicalController;
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
    Route::get('/lista', [MusicaController::class, 'list']);
    Route::get('/editar', [MusicaController::class, 'show']);
    Route::get('/salvar/{id}', [MusicaController::class, 'update']);
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

Route::prefix('projeto')->group(function (){
    Route::get('/listagem', [ProjetoMusicalController::class, 'index'])->name('projetos');
    Route::any('/create', [ProjetoMusicalController::class, 'create'])->name('criar-projeto');
    Route::any('/edit/{id}', [ProjetoMusicalController::class, 'edit'])->name('editar-projeto');
    Route::get('/details/{id}', [ProjetoMusicalController::class, 'details'])->name('ver-projeto');
    Route::get('/delete/{id}', [ProjetoMusicalController::class, 'delete'])->name('deletar-projeto');
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
