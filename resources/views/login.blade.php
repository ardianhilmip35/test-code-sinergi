@extends('nav')

@section('title', 'Login')

@section('content')
<div class="container-fluid" style=" margin-top: 180px; margin-bottom: 192px;">
    <div class="row justify-content-center">
        <div class="card shadow border-1" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Login Admin</h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                        <label class="form-check-label ps-2" for="exampleCheck1">Show Password</label>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('register'))
                            <a class="btn btn-info text-light" type="button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</div>
@endsection