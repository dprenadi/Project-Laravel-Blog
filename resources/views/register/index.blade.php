@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5" style="margin-top: 100px">
    <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <form action="/register" method="post">
            @csrf

            {{-- FORM NAME --}}
            <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" required value="{{ old('name') }}">
            <label for="name">Name</label>
                @error('name')    
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            {{-- END FORM NAME --}}

            {{-- FORM USERNAME --}}
            <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" name="username" required value="{{ old('username') }}">
            <label for="username">Username</label>
                @error('username')    
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            {{-- END FORM USERNAME --}}

            {{-- FORM USERNAME --}}
            <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
            <label for="email">Email address</label>
                @error('email')    
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            {{-- END FORM USERNAME --}}

            {{-- FORM PASSWORD --}}
            <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>
                @error('password')    
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            {{-- END FORM PASSWORD --}}

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            <small class="d-block text-center mt-3">
                Already Registered ? <a href="/login" class="text-decoration-none">Login Now!</a>
            </small>

        </form>
    </main>
    </div>
</div>


@endsection