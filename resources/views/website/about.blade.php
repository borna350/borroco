@extends('layouts.website')

@section('title')
    Our Woman Selection | Barròco
@endsection

@section('content')

    <!-- About -->
    <div class="about">
        <div class="about-1">
            <div class="container">
                <div class="bio">
                    <div class="wrapper">
                        <div class="cell">
                            <div class="image">
                                @if(!empty($about->about_logo))
                                    <img src="{{ asset('media/about/'.$about->about_logo) }}" alt="Barròco Logo">
                                @else
                                    <img src="{{ asset('website/img/logo.svg') }}" alt="Barròco Logo">
                                @endif

                            </div>
                        </div>
                        <div class="cell">
                            <div class="text"><h3>About<br></h3>
                                @if(!empty($about->about_description))
                                    <p>{{$about->about_description}}</p>
                                @endif
                                <ul>
                                    @if(!empty($about->based_in))
                                        <li><span>BASED IN</span>{{$about->based_in}}</li>
                                    @endif
                                    @if(!empty($about->founded))
                                        <li><span>FOUNDED</span> {{$about->founded}}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="craft">
                    <div class="image">
                        @if(!empty($about->about_banner_image))
                            <img src="{{ asset('media/about/'.$about->about_banner_image) }}" alt="">
                        @endif
                    </div>
                    <div class="text">
                        @if(!empty($about->banner_title))
                            <h3>{{ $about->banner_title }}</h3>
                        @else
                            <h3>Crafsmanship <br>World</h3>
                        @endif
                        @if(!empty($about->banner_description))
                            <p>{{ $about->banner_description }}</p>
                        @endif

                    </div>
                </div>
                @if(!empty($team))
                    <div class="team"><h3>Barròco Team</h3>
                        <div class="grid">
                            @foreach($team as $data)
                                <div class="member">
                                    @if(!empty($data->image))
                                        <img src="{{ asset('media/team/'.$data->image) }}" alt="">
                                    @endif
                                    <span>{{ $data->name }} </span> {{ $data->designation }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="map">
                    <div class="wrapper">
                        <div class="cell">
                            <div class="map-wrap" id="map">

                            </div>
                        </div>
                        <div class="cell">
                            <div class="text">

                                <img src="{{ asset('website/img/logo.svg') }}" alt="Barròco Logo">

                                <div class="box">

                                    @if(!empty($about->address))
                                        <span></span>{{ $about->address }} <br>
                                    @endif

                                    @if(!empty($about->email))
                                        <a href="">{{ $about->email }}</a>
                                    @endif
                                </div>
                                @if(!empty($follow))
                                    <div class="box"><span>FOLLOW US</span>
                                        @foreach($follow as $data)
                                            <a href="{{ $data->social_media_link }}"
                                               target="_blank">{{ $data->social_media_name }}</a><br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-expanded">
                <div class="quote">“To create a work of art is to create the World.”</div>
            </div>
        </div>
    </div>
    <!-- End About -->
@endsection
