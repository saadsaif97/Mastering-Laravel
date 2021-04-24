@extends('../layouts/master')
@section('title', 'create todo')

@section('content')
<div class="container py-5">
   <h1>Create Todo</h1>
   <hr>
   <form action="/todo/{{ $todo->id }}" method="POST">
      @method("PUT")

      @csrf
      <div class="form-group">
         <label for="title">Title</label>
         <input type="text" name="title" id="title" class="form-control" placeholder="title"
            value="{{ old('title',$todo->title) }}">
         <p style="color:orangered" id="edit_error">@error('title') {{ $message }} @enderror</p>
      </div>
      <div class="form-group">
         <label for="body">Body</label>
         <textarea name="body" id="body" cols="30" rows="10" class="form-control"
            placeholder="description">{{ old('body',$todo->body) }}</textarea>
         <p style="color:orangered" id="edit_error">@error('body') {{ $message }} @enderror</p>
      </div>
      <div class="form-group">
         <label for="due">Due</label>
         <input type="text" name="due" id="due" class="form-control" placeholder="date/day"
            value="{{ old('due',$todo->due) }}">
         <p style="color:orangered" id="edit_error">@error('due') {{ $message }} @enderror</p>
      </div>
      <div class="form-group">
         <a href="/todo" class="btn btn-outline-secondary">Go Back</a>
         <input type="submit" value="Update" class="btn btn-info">
      </div>

   </form>
</div>
@stop
