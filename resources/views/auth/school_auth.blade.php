@extends('layouts.app')

@section('content')
    <div id="app" class="app app-full-height app-without-header">

        <div class="login">

            <div class="login-content">
                <form action="{{ route('school.login.post') }}" method="POST" name="login_form">
                    @csrf
                    <h1 class="text-center">School Sign In</h1>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"
                               class="form-control form-control-lg fs-15px @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" name="email" placeholder="username@address.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Password</label>
                            <a href="#" class="ms-auto text-muted">Forgot password?</a>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg fs-15px" value
                               placeholder="Enter your password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value id="customCheck1">
                            <label class="form-check-label fw-500" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
                </form>
            </div>

        </div>

        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

    </div>

@endsection

