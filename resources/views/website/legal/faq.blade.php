@extends('layouts.website')

@section('title')
    Work With Us | Barròco
@endsection

@section('content')

    <!-- privacy policy -->
    <div class="container">
        <div id="page-inner-faq">
            <div class="page-cover">
                <div>
                    <h2>FAQS</h2>
                </div>
            </div>
            <div class="page-inner">
                @if(!empty($faq))
                @foreach($faq as $data)
                <div class="accordion collapse-parent">
                    <div class="head collapse-custom">
                        <a href="#">{{ $data->question }}</a>
                    </div>
                    <div class="content collapse-manu">
                        <p>{{ $data->answer }}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- End privacy policy -->

@endsection
