    @extends('layouts.FrontEndMaster')
    @section ('content')
    {{-- @section ('content2')

    <h3>Hello World, estamos nas views.</h3>
    <br>
    <h5>Links disponíveis</h5>
    <ul>
        <li>
            <a href="{{route('bemvindos')}}">Vai para casa</a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{route('utilizador.all')}}">Todos os utilizadores</a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{route('utilizador.add')}}">Adiconar utilizadores</a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{route('tarefas')}}">Ver todas as tarefas</a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{route('tarefa.add')}}">Adicionar tarefas</a>
        </li>
    </ul>
<h3>Dados do Cesae</h3>
    <h5>Nome</h5>
    <p>{{$infoCesae['name']}}</p>
    <h5>Morada</h5>
    <p>{{$infoCesae['address']}}</p>
    <h5>Email</h5>
    <p>{{$infoCesae['email']}}</p> --}}
<br>
    @auth
        Olá, {{Auth::user()->name}}
    @endauth

    {{-- @auth
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="false">
        <div class="toast-header">
          <img src="..." class="rounded me-2" alt="...">
          <strong class="me-auto">Projeto</strong>
          <small>11 mins ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Olá, {{Auth::user()->name}}
        </div>
      </div>
      @endauth --}}

    {{-- <br>
    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('utilizador.all')}}">Check</a></li>
            <li><a class="dropdown-item" href="{{route('utilizador.add')}}">Create</a></li>
          </ul>
        </div>
        <div class="btn-group dropend" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Tasks
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('tarefas')}}">Check</a></li>
            <li><a class="dropdown-item" href="{{route('tarefa.add')}}">Create</a></li>
          </ul>
        </div>
      </div> --}}

    @endsection
