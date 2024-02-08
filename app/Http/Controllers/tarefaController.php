<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tarefaController extends Controller
{
    public function addTask(){
        return view('tasks_add.tasks'); //aqui vai para a rota do formulário para inserir novo formulário
    }

    public function createTasks(Request $request){
        //$request-> all();
        $request->validate([
            'task' => 'required|string|max:50',
            'name' => 'required|string|min:13'
        ]);
        User::insert([
            //lado esquerdo - nome da coluna em sql; lado direito nome da variável + campo
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('tarefas')->with('message', 'Tarefa adicionada com sucesso!');
        //$request->email(); isto se só quisesse o email
        //dd($request->all());
    }

    public function updateTasks(){

    }

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

    private function getTarefas(){
        $tarefas = DB::table('_tasks')
        ->join('users', 'user_id', '=' , 'users.id')
        ->select('_tasks.*', 'users.name as user_name')
        ->get();
        return $tarefas;
    }

    public function viewTasks($id){

        $tasks = DB::table('_tasks')
        ->where('_tasks.id', $id)
        ->join('users', 'user_id', '=', 'users.id')
        ->select('_tasks.*', 'users.name as usname')
        ->first();

        return view ('tasks.view_task', compact('tasks'));
    }

    public function deleteTasks($id){
        DB::table('_tasks')
        ->where('id', ($id))
        ->delete();

        return back();
    }
}
