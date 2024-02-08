@extends('layouts.FrontEndMaster')
@section('content')

<h1>Dados das tarefas</h1>
{{-- <h4>ID: {{$tasks ->id}}</h4> --}}

<h4>Nome: {{$tasks ->usname}}</h4>
<h4>Tarefa: {{$tasks ->name}}</h4>
<h4>Descrição: {{$tasks ->description}}</h4>

@endsection
