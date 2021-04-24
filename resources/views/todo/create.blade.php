@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Create Todo</h1>
   <hr>
   <form action="/todo" method="POST">
      @include('inc.todoForm')
   </form>
</div>
@stop
