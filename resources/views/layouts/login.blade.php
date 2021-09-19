@extends('layouts/main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">
@if(session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>
        </div>

@endif

@if(session()->has('loginError'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="Close"></button>
        </div>

@endif



    <a class="h3 mb-3 fw-normal m-5" href="/login">Daftar Kursus</a>
    
    <main class="form-signin">
      
        <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
        <form action="/login" method="post">
            @csrf
        <div class="form-floating">
          <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required >
          <label for="email">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                  {{ $message }}

              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
    </main>
</div>
</div>
    
    
        

@endsection