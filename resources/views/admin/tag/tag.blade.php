<tr>
    <td><a href="{{$url = action('TagController@edit', ['id' => $tag->id])}}" class="a_link">{{ $tag->title }}</a></td>

    <td>
        <a href="{{$url = action('TagController@edit', ['id' => $tag->id])}}"><span class="btn btn-success btn-sm glyphicon glyphicon-pencil"></span></a>
        <a href="{{$url = action('TagController@destroy', ['id' => $tag->id])}}"><span class="btn btn-danger btn-sm glyphicon glyphicon-remove"></span></a>
    </td>
</tr>
