@extends('layouts.admin')
@section('title', 'Page Title')
@section('content')
<div id="content">
    <h1>Menus Cadastrados</h1>
    <h2>by Tatiana</h2>
</div>
     <div id="a_messages">

     </div>
<a href="/admin/menus/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Menu</a>
<div id="a_category">
    @if(count($menus) > 0)
        <table class="table">
            <tr>
                <th>Titulo</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>


        @foreach($menus as $menu)
            @include('admin.menu.menu')
        @endforeach
        </table>
    @else
        <h4 class="muted">
            Sem Menu -
            <a href="/admin/menu/new">Criar um Menu</a>
        </h4>
    @endif
</div>
   
@endsection
