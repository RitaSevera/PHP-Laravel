@extends('layouts.FrontEndMaster')
@section('content')

    @auth
        @if (Auth::user()->user_type == 1)
            <td><a class="btn btn-info">Conta de administrador</a></td>
        @endif
    @endauth

    @auth
        Olá, {{ Auth::user()->name }}
        isto é a view do backoffice
    @endauth
@endsection
