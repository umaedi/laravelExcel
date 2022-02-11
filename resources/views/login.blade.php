@extends('layouts.auth')
 @section('content')
 <main class="form-signin">
    <form action="{{ route('authenticate') }}" method="POST">
      @csrf
      <img class="mb-4" src="{{ asset('images/microsoft-excel.svg') }} " alt="" width="80" height="78">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      @if (session()->has('msg'))
      <div class="alert alert-warning" role="alert">
        {{ session('msg') }}
      </div>
      @endif
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control @error('email') ? is-invalid @enderror" id="floatingInput" placeholder="name@example.com" autocomplete="off" req>
        @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') ? is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
    </form>
  </main>   
 @endsection   



    

