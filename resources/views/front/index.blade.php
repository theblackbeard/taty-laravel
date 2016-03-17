@extends('layouts.home')
@section('title', 'Ultimos Projetos')
@section('content')
    <section id="content">

       @if(count($articles) > 0)
         @include('front.partials.slide')
       @endif



        <div class="bloco"></div>

        <h3 class="content esquerda">Contato</h3>

        <div id="quick-contact" data-wow-delay="1s">
            <p class='tel'><span class="glyphicon glyphicon-earphone"></span>(011) 9 1245 1241
                &nbsp&nbsp </p>
            <p class='email'><span class="glyphicon glyphicon-envelope"></span>tatianasouza01@gmail.com</p>
            <p class='cidade'> São Paulo - SP </p>
        </div>
        <div class="bloco"></div>

    </section>

@endsection