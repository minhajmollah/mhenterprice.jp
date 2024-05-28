@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || HOME PAGE')
@section('content')
<style>

</style>
    @include('frontend.pages.home.banner')
    <div class="container">
        @include('frontend.pages.home.search')
        <div class="clr"></div>
        <ul class="maker_ulli hidden-lg">
            @foreach ($categories as $category)
                <li><a href="{{ asset('car/categories/') . '/' . $category->id }}"><img style="height:60px;width:60px; "
                            src="{{ asset($category->photo) }}" alt=""> </a>
                    <p>{{ $category->title }}</p>
                </li>
            @endforeach


        </ul>
        <div class="clr"></div>
        <div class="row" >
            <div class="margin_bottom_10" style="margin-left:auto;width:80px;">
                <select name="currency" id="currency_switch" class="form-control">
                    <option value="jpy">JPY</option>
                    <option value="usd">USD</option>
                </select>
            </div>
            <div class="col-lg-2 hiddem-md hidden-sm ">
                <div class="hp_makeulli">
                    <h2>Search by Make</h2>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <div class="d-flex align-items-center">
                                    <a href="{{ asset('car/categories/') . '/' . $category->id }}">
                                        <img src="{{ asset($category->photo) }}" alt=""
                                            style="background-position: -6px -2px;width: 35px;height: 25px;">
                                            </a>
                                <a href="{{ asset('car/categories/') . '/' . $category->id }}" style="color:rgb(51, 51, 51)">
                                    <p style="margin-top:10px; margin-left:10px">{{ $category->title }}</p>
</a>
                               
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="hp_makeulli">
                    <h2>Search by Type</h2>
                    <ul>
                        @foreach ($types as $type)
                            <li>
                                @php
                                    $icon_name = Illuminate\Support\Str::lower($type->title);
                                @endphp

                                <a href="{{ asset('/types/products') . '/' . $type->id }}">
                                    <span class="fa-mk fa-mk-{{ $icon_name }}"></span>
                                    <strong>{{ $type->title }}</strong>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <h3 class="hp_heading margin_top_0">Latest Arrival</h3>
                <div class="row" id="home_product" style="display:flex;flex-wrap:wrap;">
                    @foreach ($products as $product)
                        @php
                            $photoString = $product->photo;
                            $photosArray = explode(',', $photoString);
                            $firstPhoto = trim($photosArray[0]);
                        @endphp
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="hp_stock">
                                @php
                                    $rawValue_usd = $product->price_usd ?? 0;
                                    $formattedValue_usd = number_format($rawValue_usd, 0);
                                    $rawValue = $product->price_jpy ?? 0;
                                    $formattedValue = number_format($rawValue, 0);
                                @endphp
                                @if ($product->is_discount)
                                    @php
                                        $discounted_jp = $product->price_jpy - $product->price_jpy * ($product->discount / 100);
                                        $discounted_jp = number_format($discounted_jp, 0);
                                        $discounted_us = $product->price_usd - $product->price_usd * ($product->discount / 100);
                                        $discounted_us = number_format($discounted_us, 0);

                                    @endphp
                                @endif
                                <a href="{{ asset('/car-details/' . $product->id) }}">
                                    <div class="image">
                                        <img src="{{ asset($firstPhoto) }}" alt="{{ $product->title }}"
                                            class="img-responsive center-block">
                                    </div>
                                    <div class="price price_jpy_jp">PRICE :
                                        <strong>
                                            {{ $formattedValue == 0 ? ' ' : $formattedValue }} {{ ' ' }}
                                            {{ 'JPY' }}

                                        </strong>
                                        @if ($product->is_discount)
                                            <br />
                                            <p style="font-size: 13px;color:green; font-style:italic;">
                                                {{ $discounted_jp }}
                                                {{ 'JPY' }} (Discounted Price)</p>
                                        @endif
                                    </div>
                                    <div class="price price_usd_us">PRICE :
                                        <strong>
                                            {{ $formattedValue_usd == 0 ? ' ' : $formattedValue_usd }}
                                            {{ ' ' }}
                                            {{ 'USD' }} </strong>
                                            @if ($product->is_discount)
                                        <br />
                                        <span style="font-size: 13px;color:green;font-style:italic;">
                                            {{ $discounted_us }}
                                            {{ 'USD' }}(Discounted Price)</span>
                                            @endif
                                    </div>
                                    <h2>{{ $product->title }}</h2>
                                    <div class="arrow_box"></div>
                                    <ul>
                                        <li><span
                                                class="fa fa-fuel"></span>{{ $product->fuel_type ? $product->fuel_type->title : 'Not Assigned' }}
                                        </li>
                                        <li>
                                            @php
                                                $millage = $product->millage ?? 0;
                                                $formattedmillage = number_format($millage, 0);
                                            @endphp
                                            <span
                                                class="fa fa-mileage"></span>{{ $product->millage ? $formattedmillage . ' KM' : 'Not Assigned' }}

                                        </li>
                                        <li>
                                            @php
                                                $engine = $product->engine?->title ?? 0;
                                                $formattedengine = number_format($engine, 0);
                                            @endphp
                                            <span
                                                class="fa fa-engine"></span>{{ $product->engine?->title ? $formattedengine . ' CC' : 'Not Assigned' }}

                                        </li>


                                    </ul>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="clr"></div>
                <div class="text-center margin_bottom_50"><a href="{{ asset('/stock-list') }}" class="big_btn">View All
                        Latest
                        Arrival
                        Stock</a></div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    @include('frontend.pages.home.welcome')
    <div class="clr"></div>
    <script>
        $(".price_usd_us").hide()
        $('#currency_switch').change(function() {

            let valP = $(this).val();
            if (valP == 'usd') {
                $(".price_jpy_jp").hide()
                $(".price_usd_us").show()
            } else {
                $(".price_jpy_jp").show()
                $(".price_usd_us").hide()
            }
        })
    </script>
    <script language="javascript" src="js/jquery.bxslider.min.js"></script>
    @push('scripts')
        <script type="text/javascript">
            var slider = '';
            jQuery(document).ready(function($) {
                sliderMid = $('#bxslider').bxSlider({
                    mode: 'fade',
                    pagerCustom: '#bx-pager',
                    autoHover: true,
                    autoDelay: 10000,
                    speed: 2000,
                    responsive: true,
                });
                sliderMid.startAuto();
            });
        </script>
    @endpush
@endsection
