<nav role="navigation" class="navbar navbar-inverse">
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class=""><a href="/home">home</a></li>
            <li class=""><a href="/articles">Articles</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
             <li><a href="/home">{!! (Auth::user()!=null)?Auth::user()->name:'' !!}</a></li>
            <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
        </ul>
    </div>
</nav>
