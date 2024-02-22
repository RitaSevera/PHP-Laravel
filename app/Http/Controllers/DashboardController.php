<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function viewDash(){

        // $isAdmin = Auth::user()->user_type == User::TYPE_ADMIN ? true : false;
        // $message = null;

        // if($isAdmin){
        //     $message = 'Conta de Administrador';
        // }
        // return view ('backOffice.view', compact('message'));

        return view ('backOffice.view');
    }

    // public function __construct(){
    //     $this->middleware(['auth']);
    // } Posso ter isto aqui ou nas rotas
}
