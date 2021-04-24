@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Posts</h1>
   <hr />
   <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createModal">Create new post</button>


   @forelse($posts as $post)
   <div class="py-3"
      style="display: flex; flex-direction: row; align-items: center; width: 100%; justify-content: space-between;">
      <p style="position: relative;">{{ $post->title }}
      </p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"
         style="margin-left: auto; margin-right: 20px;" id="{{ $post->id }}" onclick="populate()">
         Edit
      </button>
      <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"
         id="{{ $post->id }}" onclick="confirmDelete()">
         Delete
      </button>
   </div>
   @empty
   <p>No post in the list</p>
   @endforelse


</div>
@stop


@if (str_contains($errors->first('title'), 'create'))
<script type="text/javascript">
   document.addEventListener('readystatechange', function () {
      $('#createModal').modal('show')
   });
</script>
@endif

<!-- Create Modal -->
<div class="modal" id="createModal">
   <div class="modal-dialog">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Create title</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">

            <form action="{{ route('post.store') }}" method="POST" id="create-form">
               @csrf

               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                  <p style="color:orangered" id="create_error">@error('title') {{ $message }} @enderror</p>
               </div>
               <div class="form-group">
                  <input type="submit" value="Create post" class="btn btn-outline-primary">
               </div>
            </form>

         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

      </div>
   </div>
</div>

@if (str_contains($errors->first('title'), 'edit'))
<script type="text/javascript">
   document.addEventListener('readystatechange', function () {
      $('#editModal').modal('show')
   });
</script>
@endif

<!-- Edit Modal -->
<div class="modal" id="editModal">
   <div class="modal-dialog">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Edit title</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">

            <form action="{{'post/7'}}" method="POST" id="edit-form">
               @csrf
               @method('patch')

               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                  <p style="color:orangered" id="edit_error">@error('title') {{ $message }} @enderror</p>
               </div>
               <div class="form-group">
                  <input type="submit" value="Update post" class="btn btn-outline-info">
               </div>
            </form>


         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

      </div>
   </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
   <div class="modal-dialog">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Delete confirmation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">

            <h3 id="delete-title"></h3>

            <form action="/post/7" method="POST" id="delete-form">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger">Yes Delete</button>
            </form>

         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
         </div>

      </div>
   </div>
</div>

<script>

   // Edit function
   const edit_form = document.getElementById('edit-form')

   async function populate(e) {
      e = e || window.event;
      var target = e.target || e.srcElement;
      const id = target.id;

      edit_form.action = `http://127.0.0.1:8000/post/${id}`

      const response = await fetch(`http://127.0.0.1:8000/post/${id}`)
      const tempdata = await response.json().then(data => data[0])

      edit_form.title.value = tempdata.title;
   }


   // Delete function

   const delete_form = document.getElementById('delete-form')
   const deleteTitle = document.getElementById('delete-title')

   async function confirmDelete(e) {
      e = e || window.event;
      var target = e.target || e.srcElement;
      const id = target.id;

      delete_form.action = `http://127.0.0.1:8000/post/${id}`

      const response = await fetch(`http://127.0.0.1:8000/post/${id}`)
      const tempdata = await response.json().then(data => data[0])

      deleteTitle.innerHTML = tempdata.title

   }

   // Reset values on closing modal
   document.addEventListener('readystatechange', () => {
      $('#createModal').on('hidden.bs.modal', function () {
         document.getElementById('create_error').innerHTML = '';
         document.getElementById('edit_error').innerHTML = '';
      })
      $('#editModal').on('hidden.bs.modal', function () {
         document.getElementById('create_error').innerHTML = '';
         document.getElementById('edit_error').innerHTML = '';
      })
   })

</script>
