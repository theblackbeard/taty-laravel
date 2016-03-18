@extends('layouts.admin')
@section('title', 'Artigos Adicionados')
@section('content')

<a href="/admin/article/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Artigo</a>
<div id="a_category">
    @if(count($articles)> 0)
        <table class="table">
            <tr>
                <th>Titulo</th>
                <th>Menu</th>
                <th>Categoria</th>
                <th>Ação</th>
            </tr>
            @foreach($articles as $article)
                @include('admin.article.article')
            @endforeach
        </table>
    @else
        <h4 class="muted">
            Sem Artigo -
            <a href="/admin/article/new">Criar uma Artigo</a>
        </h4>
    @endif
</div>


@endsection
