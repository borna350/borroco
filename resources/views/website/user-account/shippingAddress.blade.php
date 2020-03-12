@extends('layouts.website')

@section('title')
   Shipping Address | Barròco
@endsection

@section('content')
    <div id="account-inner">
        <div class="container ">
            @include('website.includes.user_navbar')

            <div class="user-info">
                <form method="post" action="{{route('store.shipping')}}" enctype="multipart/form-data">
                        @csrf
                     
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>FIRST NAME</label>
                            <br>
                            <input type="text" class="input-text" name="first_name" value="{{ old('first_name', isset($data->first_name) ? $data->first_name:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>LAST NAME</label>
                            <br>
                            <input type="text" class="input-text" name="last_name" value="{{ old('last_name', isset($data->last_name) ? $data->last_name:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label class="optional">COMPANY NAME (OPTIONAL)</label>
                            <br>
                            <input type="text" class="input-text" name="company_name" value="{{ old('company_name', isset($data->company_name) ? $data->company_name:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>COUNTRY </label>
                            <br>
                            <input type="text" class="input-text" name="country_id" value="{{ old('country_id', isset($data->country_id) ? $data->country_id:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>STREET ADDRESS</label>
                            <br>
                            <input type="text" class="input-text" placeholder="House number and street name" name="street_address" value="{{ old('street_address', isset($data->street_address) ? $data->street_address:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <br>
                            <input type="text" class="input-text" placeholder="Apartment, suite, unit etc. (optional)" name="apartment_name" value="{{ old('apartment_name', isset($data->apartment_name) ? $data->apartment_name:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>TOWN / CITY</label>
                            <br>
                            <input type="text" class="input-text" name="town" value="{{ old('town', isset($data->town) ? $data->town:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>STATE / COUNTY</label>
                            <br>
                            <input type="text" class="input-text" name="district" value="{{ old('district', isset($data->district) ? $data->district:'') }}">
                        </p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="">
                            <label>POSTCODE / ZIP</label>
                            <br>
                            <input type="text" class="input-text" name="post_code" value="{{ old('post_code', isset($data->post_code) ? $data->post_code:'') }}">
                        </p>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                            <button type="submit" class="btn btn-raised btn-success btn-round waves-effect">Save Address</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
