@extends('layout.appdata')
@section('main')
  <div id="app">
    <router-view></router-view>
  </div>
@endsection
@push('script')
  <script src="/js/app.js"></script>
@endpush