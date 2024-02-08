@extends('layouts.FrontEndMaster')
@section('content')

<h3>Adicionar tarefas!</h3>
    <br>

        <div class="container">
        <form method="POST" action="{{route('tarefa.create')}}">
            @csrf
            {{-- @csrf evitar sql injection
                name="" o que está "" é nome pelo qual vamos aceder a isto
                quando clicamos em enviar pega nos dados e manda-nos para a rota de criar utilizador --}}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tarefa</label>
                <input type="texto" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" required>
                @error('name')
                <div class="alert alert-danger">
                    A tarefa que colocou não é válida
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
              </div>

              <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <br>
        <a class="btn btn-success" href="{{route('home.index')}}">Voltar</a>
        <br>
        </div>

    @endsection
