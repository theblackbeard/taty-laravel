<tr>
  <td><a href="{{$url = action('MenuController@edit', ['id' => $menu->id])}}" class="a_link">{{ $menu->title }}</a></td>
  <td>
      @if ($menu->active)
          <span class="glyphicon glyphicon-tag icon verde" title="Ativo"></span>
      @else
          <span class="glyphicon glyphicon-tag icon vermelho" title="Inativo"></span>
      @endif

  </td>
  <td>
      <a href="{{$url = action('MenuController@edit', ['id' => $menu->id])}}"><span class="btn btn-success btn-sm glyphicon glyphicon-pencil"></span></a>
      <a href="{{$url = action('MenuController@destroy', ['id' => $menu->id])}}"><span class="btn btn-danger btn-sm glyphicon glyphicon-remove"></span></a>
  </td>
</tr>
