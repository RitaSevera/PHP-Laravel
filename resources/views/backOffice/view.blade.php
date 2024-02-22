@extends('layouts.FrontEndMaster')
@section('content')
<br>
    @auth
        @if (Auth::user()->user_type == 1)
            <td><a class="alert alert-success">Conta de administrador</a></td>
        @endif
    @endauth
    <br>
    <br>
    <br>
    @auth
        Olá, {{ Auth::user()->name }}
        isto é a view do backoffice
    @endauth

    {{-- @auth
        @if ($message)
        <div class="alert alert-success">
            <h6>Conta de administrador</h6>
        </div>
        @endif
    @endauth --}}
@endsection
