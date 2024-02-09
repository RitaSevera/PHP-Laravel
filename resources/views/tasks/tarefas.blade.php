@extends('layouts.FrontEndMaster')
@section('content')
{{-- @section ('content2') --}}
<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Tarefas</button>
</div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data</th>
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
            <td>{{$item->due_at}}</td>
            <td>{{$item->user_name}}</td>
            <td><a href="{{route('tarefa.view', $item->id)}}" class="btn btn-info">Ver | Atualizar</a></td>
            <td><a href="{{route('tarefa.delete', $item->id)}}" class="btn btn-danger">Apagar</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>

      @endsection
