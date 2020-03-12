@extends('layouts.website')

@section('title')
    Reset Password | Discover Barròco
@endsection

@section('content')
    <div id="page-inner-login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert-black" style="padding-bottom: 20px"><strong>Error:</strong> Please provide a valid email address.</div>
                </div>
            </div>
            <div class="row">
                <div class="form-middle">
                    <form class="login-form" method="post">
                        <h2>Reset Password</h2>
                        <p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
                        <p class="">
                            <label for="username">Username or email address
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="log-Input" name="username" id="username">
                        </p>
                        <p class="">
                            <input type="submit" class="woocommerce-Button btn" name="login" value="Reset Password">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
