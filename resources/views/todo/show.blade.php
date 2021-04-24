@extends('../layouts/master')
@section('title', 'todo')

@section('content')
<div class="container py-5">
   <a href="/todo">← Go back</a>
   <h1>{{ $todo->title }}</h1>
   <span class="badge badge-danger">{{ $todo->due }}</span>
   <hr>
   <p>{{ $todo->body }}</p>
</div>
@stop
