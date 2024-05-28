@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || COMPANY PROFILE PAGE')
@section('content')
    <div class="container">
        <h1 class="common_heading">ABOUT M.H</h1>
        <div class="inner_nav ">
            <ul class="five_menu">
                <li><a href="{{ asset('/about-mh') }}" class="active">ABOUT M.H</a></li>
                <li><a href="{{ asset('/contact-details') }}">CONTACT DETAIL</a></li>
                <li><a href="{{ asset('/bank-information') }}">BANK INFORMATION</a></li>
                <li><a href="{{ asset('/why-choes-us') }}">WHY CHOOSE US ?</a></li>
                <li class="hidden-md hidden-sm"><a href="{{ asset('/endorsements') }}">ENDORSEMENT</a></li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 margin_bottom_20"><img
                    src="{{ asset('/') }}images/about-us-img.jpg" class="img-responsive center-block" alt="About Us" />
            </div>
            @php
                $settings = App\Models\Settings::first();
            @endphp
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 margin_bottom_20">
                {!! $settings->description !!}

            </div>
        </div>
    @endsection
