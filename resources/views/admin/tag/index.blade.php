@extends('layouts.admin')
@section('title', 'Tags Cadastradas')
@section('content')

    <a href="/admin/tag/new" class="btn btn-link a_link"><span class="glyphicon glyphicon-plus icon"></span>Criar Menu</a>
    <div id="a_category">
        @if(count($tags) > 0)
            <table class="table">
                <tr>
                    <th>Titulo</th>
                    <th>Ação</th>
                </tr>


                @foreach($tags as $tag)
                    @include('admin.tag.tag')
                @endforeach
            </table>
        @else
            <h4 class="muted">
                Sem Menu -
                <a href="/admin/tag/new">Criar uma tag</a>
            </h4>
        @endif
    </div>

@endsection
