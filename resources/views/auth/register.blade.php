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
                    <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
                        <form class="forms-sample" method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      </div>

                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>

                      <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                          Remember me
                        </label>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary text-white me-2 mb-2 mb-md-0">Sign up</a>
                        <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="twitter"></i>
                          Sign up with twitter
                        </button>
                      </div>
                      <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
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