@extends('layouts.app')

@section('content')
<div class="container">
   <div class="d-flex justify-content-between align-items-center">
      <h1>Todo</h1>
      <a href="/todo/create" class="btn btn-outline-info">Add new todo</a>
   </div>
   <hr>
   @forelse($todos as $todo)
   <div class="card mb-3" style="width: 100%;">
      <div class="card-body" style="position: relative;">
         <form action="http://127.0.0.1:8000/todo/{{ $todo->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete_todo">x</button>
         </form>
         <a href="/todo/{{ $todo->id }}/edit" class="edit_todo">Edit</a>
         <h5 class="card-title d-inline-block"><a href="/todo/{{ $todo->id }}">{{ $todo->title }}</a></h5>
         <span class="badge badge-danger">Due: {{ $todo->due }}</span>
         <p class="card-text">{{ $todo->body }}</p>
      </div>
   </div>
   @empty
   <p>No todo in list</p>
   @endforelse
</div>
@stop
