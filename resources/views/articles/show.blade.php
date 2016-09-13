@extends('app')

@section('content')
    
    <h2>{{$article->title}}</h2>
    <div>{{$article->body}}</div>
    
    <p>Published Date: {{$article->published_at}}</p>
    
    @unless($article->tags->isEmpty())
    <h1>Tags</h1>
    <ul class='list-group'>
    @foreach($article->tags as $tag)
        <li class="list-group-itemt"> 
            {!! link_to_action('TagsController@show', $tag->name, [$tag->name]) !!}
        </li>
    @endforeach
    </ul>
    @endunless
    
    <p>{!! link_to_action('ArticlesController@edit', 'Edit', [$article->id]) !!}</p>
    
    <div>
        {!! Form::open(['action'=>['ArticlesController@destroy', $article->id], 'method' => 'delete', 'id' =>'article-delete-form', 'class' =>'inline-block']) !!}
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close()!!}
    </div>
        
@stop