@extends('layouts.FrontEndMaster')
@section('content')

<h1>Ver | Atualizar dados do user {{$myUser ->name}}</h1>
{{-- <h4>Nome: {{$myUser ->name}}</h4>
<h4>Email: {{$myUser ->email}}</h4>
<h4>Password: {{$myUser ->password}}</h4> --}}

<form method="POST" action="{{route('users.update')}}">
    @csrf
    {{-- @csrf evitar sql injection
        name="" o que está "" é nome pelo qual vamos aceder a isto
        quando clicamos em enviar pega nos dados e manda-nos para a rota de criar utilizador --}}

        <input type="hidden" name="id" value="{{$myUser->id}} id=">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="texto" value="{{$myUser->name}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
        @error('name')
        <div class="alert alert-danger">
            O nome que colocou não é válido
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input disabled type="email" value="{{$myUser->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
        @error('email')
        <div class="alert alert-danger">
            O email que colocou já está registado
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Morada</label>
        <input type="texto" value="{{$myUser->address}}" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Rua/Apartamento">
        {{-- @error('address')
        <div class="alert alert-danger">
            Morada inválida
        </div>
        @enderror --}}
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Telemóvel</label>
        <input type="text" value="{{$myUser->phone}}" name="phone" class="form-control" id="exampleFormControlInput1">
        @error('phone')
        <div class="alert alert-danger">
            O contacto está errado
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
