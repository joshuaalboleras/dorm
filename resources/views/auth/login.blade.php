@extends('layouts.auth.index')
@section('content')
<div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login Card -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" width="50" height="50">
                                <span class="app-brand-text demo text-heading fw-bold">CMMS</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Clinic Management System</h4>
                        <p class="mb-6">Please sign in to your account to continue</p>

                        <form id="formAuthentication" class="mb-6" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required autocomplete="email" autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="current-password"
                                        placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="mb-6">
                                <button type="submit" class="btn btn-primary d-grid w-100">Login</button>
                            </div>
                        </form>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                        <p class="text-center">
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </p>
                        @endif

                        <!-- Register Link -->
                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('register') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login Card -->
            </div>
        </div>
    </div>
@endsection