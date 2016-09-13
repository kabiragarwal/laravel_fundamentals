@extends('app')

@section('content')
    
    <h2>Write a new Article</h2>
    
    <hr/>
    
    <?php //{!! Form::open(array('url' => 'articles')) !!} ?>
    {!! Form::model($article = new \App\Article, array('url' => 'articles')) !!}
    
        @include('articles.form_partial',['submitButtonText' => 'Add Article'])
    
    {!! Form::close() !!}
    
    
    @include('errors.list')
    
@stop