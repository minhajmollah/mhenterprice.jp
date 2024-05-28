@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || How To Buy PAGE')
@section('content')
<div class="container">
    <h1 class="common_heading">HOW TO BUY
    </h1>
    <div class="inner_nav hidden-xs">
      <ul class="why_menu how">
        <li><a href="{{asset('/stock-list')}}">Search Stock</a></li>


        <li><a href="{{asset('/how-to-buy')}}" class="active">How to Buy</a></li>
        <li><a href="{{asset('/faq')}}">FAQ</a></li>
        <li class="hidden-md hidden-sm"><a href="{{asset('/freight-table')}}">FREIGHT TABLE</a></li>
        <li><a href="{{asset('/vehicle-inquiry')}}">Vehicle Inquiry</a></li>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img src="{{asset('/')}}images/stock.PNG" alt=" " img-fluid" style="width: 100%;">
      </div>
    </div>
  </div>

  <div class="container" style="margin-top: 40px;">
    <div class="row ">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_20">
        <div><img src="{{asset('/')}}images/img-01.png" class="img-responsive center-block" alt="Stock Search" /></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 extra">
        <div class="howbuy_box first_how_margin">
          <div>
            <div class="stock-number">
              1
            </div>
            <div class="how_sec">
              <h2>Search Your Vehicle</h2>
              <div>
                Explore your ideal car effortlessly with our user-friendly
                search feature. Whether you're looking for a specific make,
                model, <span class="text-bold">Year </span>, or price range, our intuitive filters make the

                process seamless.
              </div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="my-30">
      <div class="border-after"></div>
    </div>

    <div class="row ">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_20">
        <div class="howbuy_box first_how_margin">
          <div>
            <div class="stock-number">
              2
            </div>
            <div class="how_sec">
              <h2>Get free Quotation</h2>
              <div>Simply fill ut our GET QUOTATION form, and our team
                will swiftly provide you with a customized invoice
                featuring exclusive discounts.

              </div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div><img src="{{asset('/')}}images/img-02.png" class="img-responsive center-block" alt="Get Quote" /></div>
      </div>
    </div>
    <div class="my-30">
      <div class="border-after"></div>
    </div>

    <div class="row ">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_20">
        <div><img src="{{asset('/')}}images/img-03.png" class="img-responsive center-block" alt="Stock Search" /></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="howbuy_box first_how_margin">
          <div>
            <div class="stock-number">
              3
            </div>
            <div class="how_sec">
              <h2>Complete Your Payment</h2>
              <div>Initiate a telegraphic transfer for your transaction. Once
                completed, please provide us with a copy of the

                telegraphic transfer for swift confirmation by an email.</div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="my-30">
      <div class="border-after"></div>
    </div>
    <div class="row ">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_20">
        <div class="howbuy_box first_how_margin">
          <div>
            <div class="stock-number">
              4
            </div>
            <div class="how_sec">
              <h2>Prepared your Shipment</h2>
              <div>Find your dream car from high quality Japanese used vehicles available for export at competitive
                prices
                in our </div>
            </div>
            <div class="clr"></div>
          </div>

        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div><img src="{{asset('/')}}images//img-04.png" class="img-responsive center-block" alt="Stock Search" /></div>
      </div>
    </div>
    <div class="my-30">
      <div class="border-after"></div>
    </div>
    <div class="row margin_bottom_50">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_20">
        <div><img src="{{asset('/')}}images/img-05.png" class="img-responsive center-block" alt="Stock Search" /></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="howbuy_box first_how_margin">
          <a>
            <div class="stock-number">
              5
            </div>
            <div class="how_sec">
              <h2>Prepared for shipment</h2>
              <div>Upon full payment, we'll swiftly conclude export
                formalities and send your documents via post.

                Document will be sent to you or your requested address.</div>
            </div>
            <div class="clr"></div>
          </a>
        </div>
      </div>
    </div>

    <div class="clr"></div>
  </div>

@endsection
