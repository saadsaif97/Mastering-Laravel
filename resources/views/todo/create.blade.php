@extends('../layouts/master')
@section('title', 'create todo')

@section('content')
<div class="container py-5">
   <h1>Create Todo</h1>
   <hr>
   <form action="/todo" method="POST">
      @include('inc.todoForm')
   </form>
</div>
@stop
