<tr>
    <td><a href="{{$url = action('CategoryController@edit', ['id' => $category->id])}}" class="a_link">{{ $category->title }}</a></td>
    <td>
        @if ($category->active)
            <span class="glyphicon glyphicon-tag icon verde" title="Ativo"></span>
        @else
            <span class="glyphicon glyphicon-tag icon vermelho" title="Inativo"></span>
        @endif

    </td>
    <td>
        <a href="{{$url = action('CategoryController@edit', ['id' => $category->id])}}"><span class="btn btn-success btn-sm glyphicon glyphicon-pencil"></span></a>
        <a href="{{$url = action('CategoryController@destroy', ['id' => $category->id])}}"><span class="btn btn-danger btn-sm glyphicon glyphicon-remove"></span></a>
    </td>
</tr>
