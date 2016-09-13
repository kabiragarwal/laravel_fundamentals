@extends('app')

@section('content')
    
    <h2>Edit Article: {{ $article->title}}</h2>
    
    <hr/>
    
    {!! Form::model($article, array('method' => 'PATCH', 'action' => ['ArticlesController@update', 'id' => $article->id])) !!}
    
     @include('articles.form_partial',['submitButtonText' => 'Update Article'])
    
    {!! Form::close() !!}
    
    
    @include('errors.list')
    
@stop