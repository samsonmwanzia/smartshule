@extends('layouts.app')

@section('content')
    <div id="app" class="app app-full-height app-without-header">

        <div class="register">

            <div class="register-content">
                <form action="{{ route('school.register.post') }}" method="POST" name="register_form">
                    @csrf
                    <h2 class="text-center">Create School account</h2>
                    <div class="mb-3">
                        <label class="form-label">School Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg fs-15px @error('name') is-invalid @enderror" placeholder="" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">School Email Address <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control form-control-lg fs-15px @error('email') is-invalid @enderror"  placeholder="" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">School Phone <span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control form-control-lg fs-15px @error('phone') is-invalid @enderror" placeholder="" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">School Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control form-control-lg fs-15px @error('address') is-invalid @enderror" placeholder="" value="{{ old('address') }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control form-control-lg fs-15px @error('password') is-invalid @enderror" value="">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg fs-15px @error('password_confirmation') is-invalid @enderror" value="">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                           <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                            <label class="form-check-label fw-500" for="customCheck1">I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-theme btn-lg fs-15px fw-500 d-block w-100">Sign Up</button>
                    </div>
                    <div class="text-muted text-center">
                        Already have an School Email ID? <a href="{{ route('login') }}">Sign In</a>
                    </div>
                </form>
            </div>

        </div>


        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>


    </div>
@endsection
