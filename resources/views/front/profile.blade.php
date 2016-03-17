@extends('layouts.home')
@section('title', 'Meu Perfil')
@section('content')
    <div id="photo_perfil"class="col-xs-12 col-sm-6">
        <a href="#" class="thumbnail">
            <img src="/uploads/c5d801d1d900ee4d27f69426569a33b31453874037914.jpeg" class="effect"  />
        </a>
    </div>
    <section id="perfil" data-wow-delay="1s" class="col-xs-12 col-sm-6">
        @if(count($about)>0)
        <p>{{$about[0]->description}}</p>
        @else
        <p>Sem Perfil Cadastrado</p>
        @endif
    </section>
    <div class="bloco"></div>
@endsection