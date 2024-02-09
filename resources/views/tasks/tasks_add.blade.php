@extends('layouts.FrontEndMaster')
@section('content')

<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Adicionar tarefas</button>
</div>
    <br>

        <div class="container">
        <form method="POST" action="{{route('tarefa.create')}}">
            @csrf
            {{-- @csrf evitar sql injection
                name="" o que está "" é nome pelo qual vamos aceder a isto
                quando clicamos em enviar pega nos dados e manda-nos para a rota de criar utilizador --}}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tarefa</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" required>
                @error('name')
                <div class="alert alert-danger">
                    A tarefa inválida
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                <input type="text" value="{{old('description')}}" name="description" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User ID</label>
                <select name="user_id" id="">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="alert alert-danger">
                    Não pode atribuir a tarefa a este utilizador
                </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <br>
        <a class="btn btn-success" href="{{route('home.index')}}">Voltar</a>
        <br>
        </div>

    @endsection
