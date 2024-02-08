    @extends('layouts.FrontEndMaster')
    @section ('content')
    {{-- @section ('content2') --}}

    {{-- <h3>Hello World, estamos nas views.</h3> --}}
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
    {{-- <h3>Dados do Cesae</h3>
    <h5>Nome</h5>
    <p>{{$infoCesae['name']}}</p>
    <h5>Morada</h5>
    <p>{{$infoCesae['address']}}</p>
    <h5>Email</h5>
    <p>{{$infoCesae['email']}}</p> --}}

    @endsection
