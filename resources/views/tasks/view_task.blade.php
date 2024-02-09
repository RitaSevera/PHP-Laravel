@extends('layouts.FrontEndMaster')
@section('content')

{{-- <h1>Detalhes das tarefas</h1>
<h4>ID: {{$tasks ->id}}</h4>

<h4>Nome: {{$tasks ->usname}}</h4>
<h4>Tarefa: {{$tasks ->name}}</h4>
<h4>Descrição: {{$tasks ->description}}</h4> --}}

<br>

<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Ver | Atualizar detalhes da tarefa - {{$tarefas->name}}</button>
</div>

<form method="POST" action="{{route('tarefa.update')}}">
    @csrf

        <input type="hidden" name="id" value="{{$tarefas->id}} id=">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tarefa</label>
        <input type="texto" value="{{$tarefas->name}}" name="name" class="form-control" id="exampleFormControlInput1" required>
        @error('name')
        <div class="alert alert-danger">
            A tarefa que colocou não é válida
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Descrição</label>
        <input value="{{$tarefas->description}}" type="text" name="description" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Data de entrega</label>
        <input type="date" name="due_at" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User ID</label>
        <select name="user_id" id="">
            @foreach ($users as $user)
            <option value="{{$user->id}}" @if ($user->id == $tarefas->user_id) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>

      </div>

      <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
