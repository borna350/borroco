@extends('layouts.website')

@section('title')
    My Account | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')

            <div class="user-info">
                <div class="welcome">
                <div class="user">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</div>
                    <p>From your account dashboard you can view your <a
                                href="#">recent orders</a>, manage your <a
                                href="#">shipping and billing
                            addresses</a> and <a href="#">edit your
                            password and account details</a>.</p>
                    <p>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
