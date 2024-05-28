@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || ENDORSEMENT PAGE')
@section('content')
<div class="container">
   <h1 class="common_heading">ENDORSEMENT</h1>
    <div class="inner_nav " style="margin-bottom:10px;">
      <ul class="five_menu">
        <li><a href="{{asset('/about-mh')}}">Company Background</a></li>
        <li><a href="{{asset('/contact-details')}}">Contact Details</a></li>
        <li><a href="{{asset('/bank-information')}}">Bank Details</a></li>
        <li><a href="{{asset('/why-choes-us')}}">Why Choose Us</a></li>
        <li class="hidden-md hidden-sm">
            <a href="{{asset('/endorsements')}}" class="active">ENDORSEMENT</a>
        </li>
      </ul>
      <div class="clr"></div>
    </div>
</div>
  <div class="container">
    <div class="row testimonial" style="margin-top: 30px;">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 margin_bottom_10">
        <img src="{{asset('/images/testi.jpg')}}" class="img-responsive center-block" style="height: 170px; width: 300px;"
          alt="Robert Desouza from Kenya" />
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <h3 class="margin_top_0 font_24 margin_bottom_5 site_color">A pleasure to doing business with you!!</h3>
        <div class="margin_bottom_20">I received my car Nissan Note in good condition and am thankful to you for your
          trustworthy business.<br />
          Very clean, high performance and fuel efficient.</div>
        <div class="font_18 font_bold">Robert Desouza</div>
        <div class="font_14 gray_color">Ghana</div>
        <div class="image">
          <img src="{{asset('/images/ghana.png')}}" alt="" style=" height: 25px;width: 40px;border-radius: 0px;border: 0;">
        </div>
      </div>
    </div>
    <div class="testimonial_line" style="border: 0px;"></div>
  </div>
@endsection