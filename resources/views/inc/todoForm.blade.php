@csrf
<div class="form-group">
   <label for="title">Title</label>
   <input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{ old('title') }}">
   <p style="color:orangered" id="edit_error">@error('title') {{ $message }} @enderror</p>
</div>
<div class="form-group">
   <label for="body">Body</label>
   <textarea name="body" id="body" cols="30" rows="10" class="form-control"
      placeholder="description">{{ old('body') }}</textarea>
   <p style="color:orangered" id="edit_error">@error('body') {{ $message }} @enderror</p>
</div>
<div class="form-group">
   <label for="due">Due</label>
   <input type="text" name="due" id="due" class="form-control" placeholder="date/day" value="{{ old('due') }}">
   <p style="color:orangered" id="edit_error">@error('due') {{ $message }} @enderror</p>
</div>
<div class="form-group">
   <a href="/todo" class="btn btn-outline-secondary">Go Back</a>
   <input type="submit" value="Create" class="btn btn-primary">
</div>
