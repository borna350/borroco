@extends('layouts.website')

@section('title')
    The excellence of Italian Craftsmanship | Discover Barròco
@endsection

@section('content')
    <div id="home">
        <div class="head">
            <a href="{{ route('shop') }}">
                @if(!empty($homeBanner->logo))
                    <img src="{{ asset('media/home-banner/'.$homeBanner->logo) }}" alt="Barròco Logo">
                @else
                    <img src="{{ asset('website/img/logo.svg') }}" alt="Barròco Logo">
                @endif
            </a>
        </div>
        <div class="big-cover" style="background-image:url('https://barrocoitalia.com/wp-content/uploads/2018/07/Hp-cover-2.jpg');">
            <div class="overlay"></div>

            <div class="content">
                @if(!empty($homeBanner->title))
                    <h1>{{ $homeBanner->title }}</h1>
                @else
                    <h1>The excellence of Italian Craftsmanship</h1>
                @endif

                @if(!empty($homeBanner->subtitle))
                    <p>{{ $homeBanner->subtitle }}</p>
                @else
                    <p>We tell about Artisans stories. Learn &amp; Shop from the most skilled Italian Artisans.</p>
                @endif

                <a class="btn-underline">SEE MORE</a>
            </div>
        </div>
        <div class="container container-expanded">
            <div class="launches">
                @if(!empty(getAllCategories()))
                    @foreach(getAllCategories() as $category)
                        <div>
                            <div class="launch">
                                <div class="inner">
                                    <a href="{{url('shop/'.$category->slug)}}">
                                        <span class="image">
                                            @if($category->image)
                                                <img src="{{ asset('media/category/'. $category->image) }}" alt="{{ $category->title }}">
                                            @else
                                                <img src="{{ asset('website/img/placeholder/category-deft.png') }}" alt="{{ $category->title }}">
                                            @endif
                                        </span>
                                        <span class="lbl text-uppercase">{{ $category->title }} COLLECTION</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div>
                    <div class="launch">
                        <div class="inner">
                            <a href="{{route('shop.artisans')}}">
                                <span class="image">
                                    <img src="https://barrocoitalia.com/wp-content/uploads/2018/11/lancio-artisans-splashpage-800x800.jpg"> </span>
                                <span class="lbl">SHOP BY ARTISANS</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($homeVideos))
        <div class="video-carousel owl-carousel owl-carouse3">
            @foreach($homeVideos as $key => $video)
            <div class="item" data-id="{{ $key }}">
                <a class="youtube-logo" href="{{ $video->link }}" data-fancybox></a>
                <img src="{{ asset('media/home-video/'.$video->image) }}" alt="">
            </div>
            @endforeach
        </div>
            @foreach($homeVideos as $key => $videoTi)
                <div  class="caption carosule-caption {{ $key == 0 ? 'active':'' }} caption{{ $key }}">
                    <h3>{{ $videoTi->title }}</h3>
                    <p>{{ $videoTi->subtitle }}</p>
                    <a href="#" class="link-underline">SEE MORE</a>
                </div>
            @endforeach
        @endif
    </div>
@endsection
