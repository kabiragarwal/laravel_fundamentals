@if($errors->any())
<ul class='list-group'>
    @foreach($errors->all() as $error)
    <li class='list-group-item alert alert-danger'>{{$error}}</li>
    @endforeach
</ul>
@endif