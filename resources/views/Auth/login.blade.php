@extends('layout.appdata')
@section('main')
  <section class="text-center">
    <main class="form-signin">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <form action="{{ route('login.user') }}" method="POST">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="hidden" name="token" value="{{ bcrypt('hehe') }}">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="remember" value="true"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a href="/register" style="color: #202020; text-decoration: none">Create Account</a>
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
      </form>
    </main>
  </section>
@endsection
@push('css')
  <style>
    body {
      background-color: #f5f5f5;
    }
    section {
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }
    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }
  </style>
@endpush