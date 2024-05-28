@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || WHY CHOES US PAGE')
@section('content')
<div class="container">
    <h1 class="common_heading">Why Choose Us ?</h1>
    <div class="inner_nav ">
      <ul class="five_menu">
        <li><a href="{{asset('/about-mh')}}">About m.h</a></li>
        <li><a href="{{asset('/contact-details')}}">Contact Detail</a></li>
        <li><a href="{{asset('/bank-information')}}">Bank Information</a></li>
        <li><a href="{{asset('/why-choes-us')}}" class="active">Why Choose Us ? </a></li>
        <li><a href="voice.html">ENDORSEMENT</a></li>
      </ul>
      <div class="clr"></div>
    </div>
    <div class="row">
      <div class="col-md-6 item">
        <div class="row ">
          <div class="col-md-3">
            <img src="{{asset('/')}}images/how-to-buy-one.png" class="img-responsive center-block" alt="Experience" />
          </div>
          <div class="col-md-9">
            <h2 class="margin_top_0">Reliable Company</h2>
            <div>Discover reliability with MH Enterprise, your premier choice for car exports from Japan. We specialize
              in delivering high-quality vehicles worldwide, ensuring top-tier performance, safety, and reliability.
              Choose MH Enterprise for a seamless and trustworthy automotive experience.

            </div>
          </div>
        </div>



      </div>
      <div class="col-md-6 item border-0">
        <div class="row">
          <div class="col-md-3">
            <img src="{{asset('/')}}images/how-to-buy-two.png" class="img-responsive center-block" alt="Experience" />
          </div>
          <div class="col-md-9">
            <h2 class="margin_top_0">High Grade Excellence</h2>
            <div>At MH Enterprise, we understand the importance of trust and assurance when it comes to financial
              transactions. We guarantee a secure and transparent payment process for our valued customers. Rest easy,
              knowing that your payments are safeguarded, and your satisfaction is our commitment. Your trust in MH
              Enterprise is our utmost priority.

            </div>
          </div>
        </div>



      </div>
      <div class="col-md-6 item border-bottom-0">
        <div class="row">
          <div class="col-md-3">
            <img src="{{asset('/')}}images/how-to-three.png" class="img-responsive center-block" alt="Experience" />
          </div>
          <div class="col-md-9">
            <h2 class="margin_top_0">Cars From Diverse Sources</h2>
            <div>At MH Enterprise, we take pride in offering a diverse range of cars from various sources. Our
              collection embraces a spectrum of styles, makes, and models, ensuring you find the perfect vehicle that
              suits your unique preferences. Discover the richness of automotive diversity with us.

            </div>
          </div>
        </div>



      </div>
      <div class="col-md-6 item border-0  border-bottom-0">
        <div class="row">
          <div class="col-md-3">
            <img src="{{asset('/')}}images/how-to-four.png" class="img-responsive center-block" alt="Experience" />
          </div>
          <div class="col-md-9">
            <h2 class="margin_top_0">Source Payment Assurance</h2>
            <div>At MH Enterprise, we understand the importance of trust and assurance when it comes to financial
              transactions. We guarantee a secure and transparent payment process for our valued customers. Rest easy,
              knowing that your payments are safeguarded, and your satisfaction is our commitment. Your trust in MH
              Enterprise is our utmost priority.

            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
@endsection