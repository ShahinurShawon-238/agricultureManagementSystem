@extends('admin.admin_master')
@section('login')
    <body class="account-page">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">
                    <div class="account-logo">
                        <a href="{{ route('dashboard') }}"><img src="{{ asset('backend/img/logo.png') }}" alt="Admin Dashboard"></a>
                    </div>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Login</h3>
                            <p class="account-subtitle">Access to our dashboard</p>
                            @if ( session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input class="form-control" id="email" type="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-auto">
                                            <a class="text-muted" href="{{ route('password.request') }}">
                                                Forgot password?
                                            </a>
                                        </div>
                                    </div>
                                    <input class="form-control" id="password" type="password" name="password" required>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Login</button>
                                </div>
                                <div class="account-footer">
                                    <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
