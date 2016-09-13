<?php //{!! Form::hidden('user_id', 1) !!} ?>
<div class='form-group'>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, array('class' => 'form-control')) !!}
</div>

<div class='form-group'>
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, array('class' => 'form-control')) !!}
</div>

<div class='form-group'>
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', $article->published_at, array('class' => 'form-control')) !!}
    <?php // Carbon\Carbon::now()->format('Y-m-d');
        //$article->published_at->format('Y-m-d');
        // date('Y-m-d');
    ?>
</div>

<div class='form-group'>
    {!! Form::label('tag_lists', 'Tags:') !!}
    {!! Form::select('tag_lists[]', $tags, null, array('id'=>'tag_list', 'class' => 'form-control','multiple')) !!}
    <?php // Carbon\Carbon::now()->format('Y-m-d');?>
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText,  array('class' => 'btn btn-primary form-control')) !!}
</div>

@section('footer')
<script>
    $('#tag_list').select2({
         'placeholder': "Select a tag",
    });
</script>
@endsection
