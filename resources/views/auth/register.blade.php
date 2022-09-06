@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            @include('inc.logo')
        </div>
        <h1 class="text-center">Sign Up</h1>
        @if ($refer != 'default')
            <div class="card bg-theme opacity-5">
                <div class="card-body text-white">
                    <h4 class="card-title mb-0">Your Sponser: {{ $refer }}</h4>
                </div>
            </div>
        @endif
        <div class="text-white text-opacity-50 text-center mb-4">
            One Admin ID is all you need to access all the Admin services.
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control form-control-lg bg-white bg-opacity-5"
                value="{{ old('name') }}" placeholder="Enter your Full Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" name="username" class="form-control form-control-lg bg-white bg-opacity-5"
                value="{{ old('username') }}" placeholder="Enter your Username">
        </div>
        <div class="mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control form-control-lg bg-white bg-opacity-5"
                value="{{ old('email') }}" placeholder="Enter your Email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" id="password" name="password" class="form-control form-control-lg bg-white bg-opacity-5"
                placeholder="Enter your Password">
            <div class="text-end mt-2">
                <a href="javascript:void();" id="showPassword"
                    class="ms-auto text-white text-decoration-none text-opacity-50">Show
                    Password</a>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" class="form-control form-control-lg bg-white bg-opacity-5"
                placeholder="Confirm Password">
        </div>
        <input type="hidden" name="refer" id="refer" value="{{ $refer }}">
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="customCheck1" required />
                <label class="form-check-label" for="customCheck1">I Agree to the Terms</label>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign
            Up</button>
        <div class="text-center text-white text-opacity-50">
            Already have an Admin ID? <a href="{{ route('login') }}">Sign In</a>.
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $('#showPassword').click(function () {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    </script>
@endsection
