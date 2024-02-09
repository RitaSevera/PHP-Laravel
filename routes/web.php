<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () { //aqui é o que aparece no site
    return view('welcome'); //é o nome da view
})->name('bemvindos'); //este é o que uso para chamar, é o nome da rota

Route::get('/home',[IndexController::class, 'index'])->name('home.index');

//post vai buscar info a algum sítio (site) e traz para o projeto
Route::get('/hello', function () { //get vem ao projeto e lê alguma coisa que passa para o site
    return '<h1>Hello turma de SoftDev</h1>';
})->name('home.hello');

Route::get('/hello/{nome}', function ($nome) {
    return '<h1>Hello turma de SoftDev</h1>'.$nome;
});
//user
Route::get('/utilizador/todos', [UserController::class, 'allUser'])->name('utilizador.all');
Route::get('/utilizador/add', [UserController::class, 'addUser'])->name('utilizador.add');
Route::post('/utilizador/create', [UserController::class, 'createUser'])->name('utilizador.create');
Route::post('/utilizador/update', [UserController::class, 'updateUser'])->name('users.update');
Route::get('/users/view/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
//tasks
Route::get('/tarefas', [tarefaController::class, 'allTarefa'])->name('tarefas'); //aqui estão todas as tarefas
Route::get('/tarefas/view{id}', [tarefaController::class, 'viewTasks'])->name('tarefa.view'); //Dados das tarefas (detalhes)
Route::get('/tarefas/delete{id}', [tarefaController::class, 'deleteTasks'])->name('tarefa.delete');
Route::post('/tarefas/create', [tarefaController::class, 'createTasks'])->name('tarefa.create');
Route::get('/tarefas/add', [tarefaController::class, 'addTask'])->name('tarefa.add');
Route::post('/tarefas/update', [tarefaController::class, 'updateTasks'])->name('tarefa.update');

Route::get('/backoffice', [DashboardController::class,'viewDash'])->name('backoffice.view')->middleware('auth');


Route::fallback(function () {
    return view('main.fallback');
});


