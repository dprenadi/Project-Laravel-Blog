@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5" style="margin-top: 100px">

        {{-- FLASH MESSAGE->SUCCESS REGIS --}}
        @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- END FLASH MASSAGE->SUCCESS REGIS --}}

        {{-- FLASH MESSAGE->FAILED LOGIN --}}
        @if (session()->has('loginError'))    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- END FLASH MASSAGE->FAILED LOGIN --}}


    <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="/login" method="post">
            @csrf

            {{-- EMAIL LOGIN --}}
            <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- END EMAIL LOGIN --}}

            {{-- PASSWORD LOGIN --}}
            <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>
            </div>
            {{-- END PASSWORD LOGIN --}}

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            <small class="d-block text-center mt-3">
                Not Registered? <a href="/register" class="text-decoration-none">Register Now!</a>
            </small>

        </form>
    </main>
    </div>
</div>


@endsection