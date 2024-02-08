@extends('layouts.FrontEndMaster')
@section('content')

<h3>Olá! Aqui podes adicionar tarefas!</h3>
    <br>
    {{-- <ul>
        <li>
            <a href="{{route('utilizador.add')}}">Adicionar</a>
        </li>
    </ul> --}}

    {{-- <div class="container">
        <br>
        <h2>Adicionar Utilizadores</h2>
        <br> --}}

        <div class="container">
        <form method="POST" action="{{route('tarefa.create')}}">
            @csrf
            {{-- @csrf evitar sql injection
                name="" o que está "" é nome pelo qual vamos aceder a isto
                quando clicamos em enviar pega nos dados e manda-nos para a rota de criar utilizador --}}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="texto" name="name" class="form-control" id="exampleFormControlInput1" required>
                @error('name')
                <div class="alert alert-danger">
                    O nome que colocou não é válido
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                <input type="text" name="task" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
                @error('email')
                <div class="alert alert-danger">
                    O email que colocou já está registado
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User ID</label>
                <select name="" id=""></select>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput1">
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <br>
        <a class="btn btn-success" href="{{route('home.index')}}">Voltar</a>
        <br>
        </div>

    @endsection
