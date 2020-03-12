@extends('layouts.website')

@section('title')
    My Account | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')

            <div class="user-info">
            <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                {{-- @method('PATCH') --}}
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>FIRST NAME</label>
                            <br>
                            <input type="text" class="input-text" name="first_name" value="{{ old('first_name', isset($user->first_name) ? $user->first_name:'') }}">
                            @error('first_name')
                                <strong class="text-denger">{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>LAST NAME</label>
                            <br>
                            <input type="text" class="input-text" name="last_name" value="{{ old('last_name', isset($user->last_name) ? $user->last_name:'') }}">
                            @error('last_name')
                                <strong class="text-denger">{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>EMAIL ADDRESS</label>
                            <br>
                            <input type="text" class="input-text" name="email" value="{{ old('email', isset($user->email) ? $user->email:'') }}">
                            @error('email')
                                <strong class="text-denger">{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="pink-box">
                   <div class="row">
                       <div class="col-md-12">
                           <h3>Password change</h3>
                       </div>
                       <div class="col-md-6 col-12">
                           <p class="">
                               <label>CURRENT PASSWORD</label>
                               <br>
                               <input type="text" class="input-text" name="current_password" >
                               @error('current_password')
                                <strong class="text-denger">{{ $message }}</strong>
                                @enderror
                           </p>
                       </div>
                       <div class="col-md-6 col-12">
                           <p class="">
                               <label>NEW PASSWORD</label>
                               <br>
                               <input type="text" class="input-text" name="password">
                               @error('password')
                               <strong class="text-denger">{{ $message }}</strong>
                               @enderror
                           </p>
                       </div>
                       <div class="col-md-6 col-12">
                           <p class="">
                               <label>CONFIRM NEW PASSWORD</label>
                               <br>
                               <input type="text" class="input-text" name="password_confirmation">
                           </p>
                       </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">Save changes</button>
                    </div>
                </div>
        </form>
            </div>
        </div>
    </div>
@endsection
