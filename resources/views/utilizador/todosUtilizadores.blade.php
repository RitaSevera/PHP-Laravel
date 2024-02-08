@extends('layouts.FrontEndMaster')
@section('content')
{{-- @section ('content2') --}}
    <h3>Olá, aqui vão estar todos os utilizadores</h3>
    <br>

    {{-- <p>{{ $hello }}</p>
    <p>{{$helloAgain}}</p> --}}
    {{-- <h5>Dia da semana</h5>
    <p>{{$daysOfWeek[4]}}</p> --}}
    {{-- <h5>Nome do curso</h5>
    <p>{{$info['name']}}</p>
    <h5>Módulo escolhido</h5>
    <p>{{$info['modules'][2]}}</p>
    <h5>Aluna</h5>
    <p>{{$info[0][2]}}</p> --}}
    {{-- <ul>
        <li>
            <p>{{$contacts[0]['name']}}</p>
        </li>
    </ul> --}}
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('users.view', $user->id)}}" class="btn btn-info">Ver | Atualizar</a></td>
            <td><a href="{{route('users.delete', $user->id)}}" class="btn btn-danger">Apagar</a></td>
            {{-- <td><button class="btn btn-info">Apagar</button></td> --}}
          </tr>
        </tbody>
        @endforeach
      </table>

{{-- <ul>
        @foreach ($contacts as $user)
        <li>
            {{$user['name']}} e o telemóvel é {{$user['phone']}}
        </li>
        @endforeach
    </ul>--}}
@endsection
