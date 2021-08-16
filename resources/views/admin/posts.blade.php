@extends('layout.admin.admin-appdata')
@section('title', 'Admin | Posts')
@section('main')
  <div class="container">
    <h1 class="my-3">Blog Posts</h1>
    <a class="btn btn-primary my-1" href="/admin/posts/create">New Post <i class="bi bi-plus-circle"></i></a>
    <div class="table-responsive">
      <table id="myTable" class="text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Writer</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $count = 1;
          @endphp
          @foreach ($posts as $post)
            <tr>
              <td>{{ $count }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category }}</td>
              <td>{{ $post->writer }}</td>
              <td>{{ date('d F Y', strtotime($post->updated_at)) }}</td>
              <td>
                <a href="/admin/posts/update/{{ $post->id }}" class="btn btn-success">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a href="/admin/posts/delete/{{ $post->id }}" class="btn btn-danger">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>
            @php
                $count++
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
@push('script')
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>
@endpush