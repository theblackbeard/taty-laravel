@extends('layouts.admin')
@section('title', 'Categorias Cadastrados')
@section('content')
<a href="/admin/category/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Categoria</a>
<div id="a_category">
    @if(count($categories) > 0)
        <table class="table">
            <tr>
                <th>Titulo</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>


            @foreach($categories as $category)
                @include('admin.category.category')
            @endforeach
        </table>
    @else
        <h4 class="muted">
            Sem Categoria -
            <a href="/admin/category/new">Criar uma Categoria</a>
        </h4>
    @endif
</div>
   
@endsection
