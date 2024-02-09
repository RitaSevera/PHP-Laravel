<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
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

        $tarefas = DB::table('tasks')
        ->where('tasks.id', $id)
        ->join('users', 'user_id', '=', 'users.id')
        ->select('tasks.*', 'users.name as usname')
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
            'description' => 'string|max:200',
            'user_id' => 'required|integer|exists:users,id',
         ]);

          Task::insert([
               //lado esquerdo - nome da coluna em sql; lado direito nome da variável + campo
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'due_at' => now(),
            'status' => 1,
           ]);

            //dd($request->all());

        //  DB::table('_tasks')-> insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'user_id' => $request->user_id,
        // ]);

        return redirect()->route('tarefas')->with('message', 'Tarefa adicionada com sucesso!');
    }

    public function deleteTasks($id){ //para receber o id passo-o como parâmetro
        DB::table('tasks')
        ->where('id', ($id))
        ->delete();

        return back();
    }

    public function updateTasks(Request $request){
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'string|max:200',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        Task::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'due_at' => $request->due_at,
        ]);

        return redirect()->route('tarefas')->with('message', 'Tarefa atualizada!');
    }

    private function getTarefas(){
        $tarefas = DB::table('tasks')
        ->join('users', 'user_id', '=' , 'users.id')
        ->select('tasks.*', 'users.name as user_name')
        ->get();

        return $tarefas;
    }
}
