@extends('layouts.FrontEndMaster')
@section('content')

<form method="POST" action="{{route('password.email')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Recuperar</button>
</form>
<br>
<a class="btn btn-secondary" href="{{route('home.index')}}">Voltar</a>

@endsection
