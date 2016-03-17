<tr>
    <td>{{$article->title}}</td>
    <td>{{$article->nameMenu($article->menu_id)}}</td>
    <td>{{$article->titleCategory($article->category_id)}}</td>
    <td>
        <a href="{{$url = action('ArticleController@gallery', ['id' => $article->id])}}" title="Adicionar Fotos na Galeria desse Artigo"><span class="btn btn-info btn-sm glyphicon glyphicon glyphicon-film"></span></a>
        <a href="{{$url = action('ArticleController@edit', ['id' => $article->id])}}" title="Editar Artigo"><span class="btn btn-primary btn-sm glyphicon glyphicon-pencil"></span></a>
        <a href="{{$url = action('ArticleController@destroy', ['id' => $article->id])}}" title="Excluir Artigo"><span class="btn btn-danger btn-sm glyphicon glyphicon-remove"></span></a>
        @if(!$article->status)
        <a href="{{$url = action('ArticleController@status', ['id' => $article->id, 'active' => '1'])}}" title="Ativar Artigo"><span class="btn btn-info btn-sm glyphicon glyphicon-eye-close"></span></a>
        @else
        <a href="{{$url = action('ArticleController@status', ['id' => $article->id, 'active' => '0'])}}" title="Inativar Artigo"><span class="btn btn-success btn-sm glyphicon glyphicon-eye-open"></span></a>
        @endif
        <a href="{{$url = action('ArticleController@detail', ['name' => $article->name])}}" title="Visualizar Artigo" target="_blank"><span class="btn btn-warning btn-sm glyphicon glyphicon-new-window"></span></a>
    </td>
</tr>