@extends('layout.admin.admin-appdata')
@section('title', 'Admin | Posts')
@section('main')
  <h1 class="my-3">Create New Posts</h1>
  <form action="{{ route('create.posts') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="writer" class="form-label">Writer</label>
      <input type="text" name="writer" class="form-control @error('writer') is-invalid @enderror" id="writer" value="{{ old('writer') }}">
      @error('writer')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category" value="{{ old('category') }}">
      @error('category')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      @error('content')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}"</textarea>
    </div>
    <div class="d-flex justify-content-end">
      <a href="/admin/posts" class="btn btn-dark">Cancel</a>
      <button type="submit" class="btn btn-primary mx-2">Submit</button>
    </div>
  </form>
@endsection
@push('script')
  <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#content' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>
@endpush