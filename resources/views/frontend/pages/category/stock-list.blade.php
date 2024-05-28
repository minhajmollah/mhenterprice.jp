@extends('frontend.layouts.master')

@section('content')
    <div class="clr"></div>

    <div class="container">
        <div class="breadcrumbs visible-xs">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Stock List</li>
            </ul>
        </div>
        @include('frontend.pages.stock-list.inner_menu')
        @include('frontend.pages.stock-list.from')

        <div id="loadingDiv"
            style="display:none; position:fixed; padding:10px 0px; width:100%; z-index:1000; bottom:0; background:rgba(0, 0, 0, 0.7) none repeat scroll 0 0; color:#FFF; font-weight:normal; font-size:30px; text-align:center; left:0;">
            <img src="{{ asset('images/loading.gif') }}" alt="Loading....">
        </div>
        <div class="row listing">
            @include('frontend.pages.stock-list.sidebar')
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                @include('frontend.pages.stock-list.pagination_filter')
                <div class="roofData" id="sort_product">

                    @foreach ($products as $product)
                        @php
                            $photoString = $product->photo;
                            $photosArray = array_filter(array_map('trim', explode(',', $photoString)));

                            // Check if there is at least one photo in the array
                            if (!empty($photosArray)) {
                                // Use $photosArray[0] as needed
                                $firstPhoto = $photosArray[0];
                            }
                        @endphp


                        <div class="stock_list_box" id="VEHID10060">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="list_image">
                                        <div><a href="{{ asset('/car-details') . '/' . $product->id }}"><img
                                                    src="{{ asset($firstPhoto) }}" alt="{{ $product->title }}"
                                                    class="img-responsive center-block border"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                            <h2><a href="{{ asset('/car-details') . '/' . $product->id }}">{{ $product->title }}
                                                    <span>{{ $product->reg_date_year }}</span><span>/{{ $product->reg_date_month }}</span></a>
                                            </h2>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            <div class="text-right">PRICE :
                                                <span class="price">


                                                    <strong id="fobPrice0" class="font_20 green_color"> @php
                                                        $rawValue = $product->price_jpy ?? 0;
                                                        $formattedValue = number_format($rawValue, 0);
                                                    @endphp

                                                        {{ $formattedValue }} {{ ' ' }} {{ 'JPY' }}
                                                    </strong>


                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="margin_bottom_10"><span style="color:#1946ee">
                                                    {{ $product->status == 'active' ? 'Now On Sale ' : ' ' }} </span>
                                                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span
                                                    class="sp sp-viewed margin_right_5 tooltip"
                                                    aria-label="Total Views {{ $product->views }}"></span>{{ $product->views }}
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin_bottom_10">
                                                    <div><span class="text-bold"><span class="text-bold"><span
                                                                    class="text-bold"><span class="text-bold">Ref#
                                                                    </span></span> </span></span>
                                                        {{ $product->stock_code }}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 margin_bottom_10">
                                                    <div><span class="text-bold"><span class="text-bold">Model
                                                                Code</span></span> :
                                                        @if ($product->sub_cat_info)
                                                            @if ($product->sub_cat_info->model_code)
                                                                {{ $product->sub_cat_info->model_code }}
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin_bottom_10"
                                                    style="padding:0px;">
                                                    <div><span class="text-bold"><span class="text-bold">Year </span>
                                                        </span> : <span>
                                                            @if ($product->sub_cat_info)
                                                                @if ($product->sub_cat_info->mfg_date_year)
                                                                    {{ $product->sub_cat_info->mfg_date_year }}
                                                                @endif
                                                            @endif
                                                            / @if ($product->sub_cat_info)
                                                                @if ($product->sub_cat_info->mfg_date_month)
                                                                    {{ $product->sub_cat_info->mfg_date_month }}
                                                                @endif
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list_option">
                                                <span class="sp sp-mileage tooltip"
                                                    aria-label="Mileage"></span>{{ $product->millage ? $product->millage : 'Not Assigned' }}
                                                KM
                                                <strong>|</strong><span class="sp sp-engine tooltip"
                                                    aria-label="Engine CC"></span>ty
                                                {{ $product->engine ? $product->engine->title : 'Not Assigned' }}
                                                CC<strong>|</strong><span class="sp sp-fuel tooltip"
                                                    aria-label="Fuel"></span>{{ $product->fuel_type ? $product->fuel_type->title : 'Not Assigned' }}<strong>|</strong><span
                                                    class="sp sp-transmission tooltip" aria-label="Tranmission"></span>AT
                                                {{ $product->transmission ? $product->transmission->title : 'Not Assigned' }}
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ asset('/vehicle-inquiry') }}"
                                                    class="btn btn-default font_14 hidden-md hidden-sm " id="com_uni_10060s"
                                                    title="SEND INQUIRY this Vehicle"><span
                                                        class="sp sp-SEND INQUIRY"></span><span
                                                        id="SEND INQUIRY_text_10060s">SEND
                                                        INQUIRY</a></span>&nbsp;&nbsp;
                                                <a href="javascript:void(0)" class="btn btn-default font_14"
                                                    onclick="downloadAllImages({{ $product->id }});">DOWNLOAD IMAGES IN
                                                    ZIP</a>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="margin_top_5 margin_bottom_10 text-right" style="display:none">
                                                Total
                                                <span class="price_title terms_title"></span><span> Price: </span><strong
                                                    class="TotalAmt_10060 reset_amount">Ask</strong><br />
                                                <p class="msg_my pointer font_12">Select Country & Port</p>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-lg-offset-3 col-lg-9 col-md-offset-0 col-md-12 col-sm-offset-0 col-sm-12 col-xs-offset-3 col-xs-6">
                                                    <a href="{{ asset('/car-details') . '/' . $product->id }}"
                                                        class="list_btn slow" style="color:#1946ee">More Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>
                    @endforeach


                </div>


            </div>
            </form>
        </div>
    </div>

    <!-- Include JSZip library -->
    <!-- Include JSZip library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.0/jszip.min.js"></script>
    <!-- Include jszip-utils library for fetching images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.0.2/jszip-utils.min.js"></script>

    <script>
        function downloadAllImages(id) {
            console.log(id);

            // Make an AJAX request to fetch the photos for the specific product
            fetch('/product/' + id)
                .then(response => response.json())
                .then(data => {
                    // Handle the retrieved photosArray
                    console.log('Fetched photos for product', data);

                    // Continue with the existing code to create a ZIP file
                    var zip = new JSZip();
                    var promises = [];

                    data.photo.forEach(function(photoUrl, index) {
                        var promise = new Promise(function(resolve, reject) {
                            JSZipUtils.getBinaryContent(photoUrl, function(err, data) {
                                if (err) {
                                    reject(err);
                                } else {
                                    zip.file('image' + index + '.jpg', data, {
                                        binary: true
                                    });
                                    resolve();
                                }
                            });
                        });

                        promises.push(promise);
                    });

                    Promise.all(promises).then(function() {
                        zip.generateAsync({
                                type: 'blob'
                            })
                            .then(function(blob) {
                                var link = document.createElement('a');
                                link.href = URL.createObjectURL(blob);
                                link.download = 'images.zip';

                                document.body.appendChild(link);
                                link.click();

                                document.body.removeChild(link);
                            });
                    });
                })
                .catch(error => {
                    console.error('Error fetching photos for product ' + id, error);
                });
        }
    </script>
@endsection
