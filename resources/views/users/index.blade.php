@extends('layout.appdata')
@section('main')
  <div id="app">
    {{-- <header-component></header-component> --}}
    <router-view></router-view>
    {{-- <footer-component></footer-component> --}}
  </div>
@endsection
@push('script')
  <script src="/js/app.js"></script>
  <script>
    // console.log(window.location.href);
  </script>
@endpush