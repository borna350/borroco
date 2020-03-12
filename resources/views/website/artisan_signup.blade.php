@extends('layouts.website')

@section('title')
    Artisan Signup | Discover Barròco
@endsection

@section('content')
    <div id="page-inner-login">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    @if(session('success'))
                    <div class="alert-golden" style="padding: 20px">
                        <strong>Success:</strong> {{ session('success') }}
                    </div>
                    @endif

                    <form class="login-form" method="POST" action="{{ route('artisan.request') }}">
                        @csrf
                        <h2>Artisan Register</h2>
                        <p class="">
                            <label for="name">NAME</label>
                            <span class="required">*</span>
                            <input type="text" class="log-Input @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" >
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </p>
                        <p class="">
                            <label for="email">EMAIL ADDRESS</label>
                            <span class="required">*</span>
                            <input type="email" class="log-Input @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" >
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </p>
                        <p class="">
                            <label for="password">Password
                                <span class="required">*</span>
                            </label>
                            <input class="log-Input @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="password">
                            @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </p>
                        <p class="">
                            <label for="password_confirmation">Confirm Password
                                <span class="required">*</span>
                            </label>
                            <input class="log-Input @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="password_confirmation">
                        </p>
                        <p>Your personal data will be used to process your order, support your experience on this website and for other purposes described in our privacy policy.</p>
                        <p class="">
                            <button type="submit" class="btn" >Register</button>
                        </p>

                        <p class="lost_password">
                            <a href="{{ url('admin/login')}}">Artisan Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
