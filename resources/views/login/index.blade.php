@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-4">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
          <label for="email">Username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button name="login" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      {{-- <small class="d-block text-center mt-3">Not Registered? <a class="text-decoration-none" href="/register">Register Now!</a></small> --}}
  </main>
  </div>
</div>



@endsection