@extends('layouts.FrontEndMaster')
@section('content')
{{-- @section ('content2') --}}
    <h3>Aqui estão todas as tarefas</h3>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Descrição</th>
            <th scope="col">Nome</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->user_name}}</td>
            <td><a href="{{route('tarefa.view', $item->id)}}" class="btn btn-info">Ver</a></td>
            <td><a href="{{route('tarefa.delete', $item->id)}}" class="btn btn-danger">Apagar</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>

      @endsection
