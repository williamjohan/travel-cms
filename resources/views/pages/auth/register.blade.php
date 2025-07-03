@extends('layouts.auth')

@section('title', 'Register')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register')}}">
            @csrf
            <div class="form-group">
                <label for="frist_name">Name</label>
                <input id="frist_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    autofocus>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="d-block">Password</label>

                <div class="input-group">
                    <input id="password" type="password"
                        class="form-control pwstrength @error('password') is-invalid @enderror"
                        data-indicator="pwindicator" name="password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                            <i class="fa fa-eye" id="eye-icon"></i>
                        </span>
                    </div>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>



                <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="password2" class="d-block">Password Confirmation</label>
                <div class="input-group">
                    <input id="password2" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation">

                    <div class="input-group-append">
                        <span class="input-group-text" onclick="toggleConfirmPassword()" style="cursor: pointer;">
                            <i class="fa fa-eye" id="confirm-eye-icon"></i>
                        </span>
                    </div>

                </div>

            </div>
            @error('password-confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <div class="form-group">
                <div class="custom-control custom-checkbox @error ('terms') is-invalid @enderror">
                    <input type="checkbox" name="terms" class="custom-control-input" id="terms">
                    <label class="custom-control-label" for="terms">I agree with the terms and conditions</label>
                </div>
                @error('terms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/auth-register.js') }}"></script>


<!-- Toggle Show/Hide Password -->
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eye-icon');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

     function toggleConfirmPassword() {
        const input = document.getElementById('password2');
        const icon = document.getElementById('confirm-eye-icon');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endpush