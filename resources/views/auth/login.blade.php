@extends('auth/auth-master')

@section('content')

<div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="sidebar-brand">
                      <img class="logo" src="{{ asset('assets/images/aquamonia_logo_wide.png') }}" height="50px">
                    </a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="authCheck">
                          Remember me
                        </label>
                      </div>
                      <div>

                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                    {{ __('Login') }}
                                </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                        @endif
                        <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="twitter"></i>
                          Login with twitter
                      </div>
                      <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>-->
                    </form>
                  </div>
                </div>
              </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
