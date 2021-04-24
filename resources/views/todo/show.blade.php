@extends('layouts.app')

@section('content')
<div class="container">
   <a href="/todo">← Todo List</a>
   <h1>{{ $todo->title }}</h1>
   <span class="badge badge-danger">{{ $todo->due }}</span>
   <hr>
   <p>{{ $todo->body }}</p>
</div>
@stop
