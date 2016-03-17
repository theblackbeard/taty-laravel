<div id="slider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($articles as $key => $article)
        <li data-target="#slider" data-slide-to="0" class="@if($key == 0)active @endif"></li>
        @endforeach

    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner shadow-border" role="listbox">

        @foreach($articles as $key => $article)
        <div class="item @if($key == 0)active @endif">
            <a href="{{'/view/' . $article->name}}">
                <img src="{{ $article->cover  }}" alt="{{$article->title}}" title="{{$article->title }}"></a>
            <div class="carousel-caption">
                <h3>{{$article->title}}</h3>
                <p>{{$article->body}}</p>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>