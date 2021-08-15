@extends('layout.appdata')
@section('main')
  <section class="text-center">
    <main class="form-signin">
      <form action="{{ route('register.user') }}" method="POST">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        
        <div class="form-floating mb-2">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="name" value="{{ old('name') }}">
          <label for="floatingInput">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="floatingInput" placeholder="username" value="{{ old('username') }}">
          <label for="floatingInput">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
          <label for="floatingInput">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <a href="/login" style="color: #202020; text-decoration: none">Already have Account</a>
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