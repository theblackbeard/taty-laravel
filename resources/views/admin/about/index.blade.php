@extends('layouts.admin')
@section('title', 'Perfil Criado')
@section('content')

    <a href="/admin/about/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Perfil</a>

    <div id="a_category">
        @if(count($abouts) > 0)
            @foreach($abouts as $about)
                @include('admin.about.about')
            @endforeach
        @else
            <h4 class="muted">
                Sem Perfil -
                <a href="/admin/about/new">Criar um Perfil</a>
            </h4>
        @endif
    </div>
@endsection