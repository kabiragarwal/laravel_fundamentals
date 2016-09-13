@extends('app')

@section('content')
    
    <h1>Artilces List</h1>
    <hr>
    @foreach($articles as $article)
        <h2>
           <?php // <a href="articles/{{$article->id}}">{{$article->title}}</a> ?>
           <?php //  <a href="{{action('ArticlesController@show',[$article->id])}}">{{$article->title}}</a>?>
            <a href="{{url('articles', $article->id)}}">{{$article->title}}</a>
        </h2>
        <div>{{$article->body}}</div>
    @endforeach

    
    
    
@stop