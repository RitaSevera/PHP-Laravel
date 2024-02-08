<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(){
        // adicionar users na base de dados;
        // DB::table('users')->updateOrInsert([
        //     'email'=> 'ana@hotmail.com', ],
        //     ['name'=> 'anaRita',
        //     'password'=> 'anarita',
        //     'updated_at' => now(),
        //     'created_at' => now(),
        // ]);

        // $users = DB::table('users')->get(); //vai à tabela de users e vai buscar todos
        // $myUser = DB::table('users')->where('email', 'rita@hotmail.com') ->first(); //vai buscar apenas este utilizador
        //$myUser = DB::table('users')->where('password', '12345') ->get();//vai-me buscar todos os que têm esta password, se eu fosse pôr first, em vez de get, ele só me dava uma pessoa (a primeira que encontra com aquela password)
        //dd($users); //aparece-me na página os dados dos users todos, serve para eu ver se estou a receber tudo da base de dados
        //dd($myUser);


        return view('utilizador.utilizador'); //view tem uma pasta utilizador e o ficheiro chama-se utilizador
    }

    public function createUser(Request $request){
        //$request-> all();
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:13'
        ]);
        User::insert([
            //lado esquerdo - nome da coluna em sql; lado direito nome da variável + campo
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //isto encripta a pass
        ]);

        return redirect()->route('utilizador.all')->with('message', 'Adicionado com sucesso!');
        //$request->email(); isto se só quisesse o email
        //dd($request->all());
    }

    public function updateUser(Request $request){

        $request->validate([
            'phone' => 'min:9',
        ]);

        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('utilizador.all')->with('message', 'Atualizado com sucesso!');
    }

    public function allUser(){
        $hello = 'Finalmente vamos para o código';
        $helloAgain = 'cucu';
        $daysOfWeek = $this->diasSemana();
        $info = $this->courseInfo();
        $users = $this->getContacts();

       // dd($info);
       // var_dump($info);
        return view('utilizador.todosUtilizadores', compact('hello', 'helloAgain', 'daysOfWeek', 'info', 'users'));
    }

    public function viewUser($id){

        $myUser = DB::table('users')
        ->where('id', $id)
        ->first();

        return view ('utilizador.view', compact('myUser'));
    }

    public function deleteUser($id){
        DB::table('_tasks')
        ->where('user_id', ($id))
        ->delete();
        //como havia users com tarefas, se eu não fosse pôr isto, não podia apagar os users que tinham tarefas

        DB::table('users')
        ->where('id', ($id))
        ->delete();

        return back();
    }

    public function diasSemana(){
        $daysOfWeek = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'];
        return $daysOfWeek;
    }

    private function courseInfo(){
        $courseInfo = ['name' => 'Software Developer', 'year' => 2024, 'modules' => ['PHP', 'WebServices', 'Java'],['Teste', 10, 'Rita', 'Severa']];
        return $courseInfo;
    }
    private function getContacts(){
        // $contacts = [['id' => 1, 'name' => 'Rita', 'phone' => '9124564378', 'email' => 'rita@hotmail.com'], ['id' => 2, 'name' => 'Nuno', 'phone' => '916574897', 'email' => 'nuno@hotmail.com'], ['id' => 3, 'name' => 'João', 'phone' => '919854356', 'email' => 'joao@hotmail.com']];
        $users = DB::table('users')->get();



        // $users = User::get(); //é para ir buscar o model - User.php

        // $adminType = User::TYPE_ADMIN;

        return $users;
        //ao fazer assim, a página atualiza sempre que é adicionado um user
     }
}
