@extends('layouts.website')

@section('title')
    Login | Discover Barròco
@endsection

@section('content')
    <div id="page-inner-login">
        <div class="container">
            @if ($errors->has('email') || $errors->has('password'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-black" style="padding-bottom: 20px">
                            @error('email')
                            <strong>Error:</strong> {{ $message }}
                            @enderror
                            @error('password')
                            <br>
                            <strong>Error:</strong> {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <form class="login-form" method="post" action="{{ route('login')}}">
                        @csrf
                        <h2>Login</h2>
                        <p class="">
                            <label for="email">Username or email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="log-Input  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p class="">
                            <label for="password">Password
                                <span class="required">*</span>
                            </label>
                            <input class="log-Input @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p class="">
                            <button type="submit" class="woocommerce-Button btn">Log In</button>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="{{route('user.reset')}}">Lost your password?</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <h2>Register</h2>
                        <p class="">
                            <label for="email">EMAIL ADDRESS</label>
                            <span class="required">*</span>
                            <input type="email" class="log-Input @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p class="">
                            <label for="password">Password
                                <span class="required">*</span>
                            </label>
                            <input class="log-Input @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p>Your personal data will be used to process your order, support your experience on this website and for other purposes described in our privacy policy.</p>
                        <p class="">
                            <button type="submit" class="woocommerce-Button btn" >Register</button>
                        </p>

                        <p class="lost_password">
                            <a href="{{route('artisan.register')}}">Register Artisan</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
