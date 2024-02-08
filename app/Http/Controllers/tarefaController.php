<?php

namespace App\Http\Controllers;

use App\Models\_Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tarefaController extends Controller{

    public function allTarefa(){
        $tarefas = $this->getTarefas();

        // DB::table('_tasks')->updateOrInsert([
        //     'name'=> 'Estudar android development', ],
        //     [ 'updated_at' => now(),
        //     'created_at' => now(),
        // ]);
        // $tarefas = DB::table('_tasks')->get();

        return view ('tasks.tarefas', compact('tarefas')); //quando carregar a view tem que levar as tarefas
    }

    public function viewTasks($id){

        $tarefas = DB::table('_tasks')
        ->where('_tasks.id', $id)
        ->join('users', 'user_id', '=', 'users.id')
        ->select('_tasks.*', 'users.name as usname')
        ->first();

        $users = DB::table('users')->get();

        return view ('tasks.view_task', compact('tarefas', 'users'));
    }

    public function addTask(){

        $users = DB::table('users')->get();

        return view('tasks.tasks_add', compact('users')); //aqui vai para a rota do formulário para inserir novo formulário
    }

    public function createTasks(Request $request){
        //$request-> all();
        $request->validate([
            'name' => 'required|string|max:30',
        ]);

        _Tasks::insert([
            //lado esquerdo - nome da coluna em sql; lado direito nome da variável + campo
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tarefas')->with('message', 'Tarefa adicionada com sucesso!');
    }

    public function deleteTasks($id){ //para receber o id passo-o como parâmetro
        DB::table('_tasks')
        ->where('id', ($id))
        ->delete();

        return back();
    }

    public function updateTasks(Request $request){
        $request->validate([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tarefas')->with('message', 'Tarefa atualizada!');
    }

    private function getTarefas(){
        $tarefas = DB::table('_tasks')
        ->join('users', 'user_id', '=' , 'users.id')
        ->select('_tasks.*', 'users.name as user_name')
        ->get();

        return $tarefas;
    }
}
