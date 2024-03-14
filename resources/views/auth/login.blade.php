@extends('layouts.app')

@section('content')
    <div id="app" class="app app-full-height app-without-header">

        <div class="login">

            <div class="login-content">
                <form action="{{ route('login') }}" method="POST" name="login_form">
                    <h2 class="text-center border-bottom mb-2">Sign In</h2>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control fs-15px" value placeholder="">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Password</label>
                            <a href="#" class="ms-auto text-muted">Forgot password?</a>
                        </div>
                        <input type="password" class="form-control  fs-15px" value placeholder="">
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
    <!-- main content end -->
@endsection
