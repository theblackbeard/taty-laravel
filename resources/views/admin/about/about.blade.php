<blockquote>
    {{$about->description}}
</blockquote>
<hr>
<a href="{{$url = action('AboutController@edit', ['id' => $about->id])}}"><span class="btn btn-success btn-sm glyphicon glyphicon-pencil"></span></a>
<a href="{{$url = action('AboutController@destroy', ['id' => $about->id])}}"><span class="btn btn-danger btn-sm glyphicon glyphicon-remove"></span></a>
