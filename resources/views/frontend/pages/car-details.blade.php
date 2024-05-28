@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || Car DEAILS PAGE')
@section('content')
    @if (session('message'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show SweetAlert2 alert with the message
                Swal.fire({
                    text: '{{ session('message') }}',
                    timer: 10000, // Display for 10 seconds
                    icon: 'success', // You can customize the icon
                    showConfirmButton: false, // Hide the "OK" button
                });
            });
        </script>
    @endif

    @php
        $photoString = $product->photo;
        $photosArray = explode(',', $photoString);
        $firstPhoto = trim($photosArray[0]);
    @endphp
    <div class="container" id="printableContent" style="display:none;">
        <div class="stock_detail_bg">
            <div class="row" style="display:flex">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin_bottom_10">
                    <h1 class="stkdetail_heading" style="font-weight: 900;">{{ $product->title }}
                        <span>{{ $product->reg_date_month }} / {{ $product->reg_date_year }}</span>
                    </h1>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 margin_bottom_10">

                    PRICE :
                    <p class="stkdetail_heading" style="font-weight: 900;">
                        <span id="price_local_detail" class="price_jpy_jp ">

                            @php
                                $rawValue = $product->price_jpy ?? 0;
                                $formattedValue = number_format($rawValue, 0);
                            @endphp

                            {{ $formattedValue }} {{ ' ' }} {{ 'JPY' }}
                        </span>
                    </p>
                    <p class="stkdetail_heading" style="font-weight: 900;">
                        <span id="price_local_detail" class="price_usd_us ">

                            @php
                                $rawValue_usd = $product->price_usd ?? 0;
                                $formattedValue_usd = number_format($rawValue_usd, 0);
                            @endphp

                            {{ $formattedValue_usd == 0 ? '' : $formattedValue_usd }} {{ ' ' }}
                            {{ 'USD' }}


                        </span>
                    </p>


                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 xs-margin-bottom-10">
                    <div>
                        <span>{{ $product->title }}</span>&nbsp;&nbsp;&nbsp;&nbsp; <strong><span style="color:#1946ee">Now
                                On
                                Sale</span></strong>&nbsp;&nbsp;
                    </div>
                </div>

            </div>
            <div class="clr"></div>
        </div>

        <div class="" style="margin-top:30px ">

            <img src="{{ asset($firstPhoto) }}" alt="Nissan NOTE" class="img-responsive ">


        </div>
        <ul class="other_images_ulli">
            @foreach ($photosArray as $image)
                <li style="width: 20%">
                    <img src="{{ $image }}" class="img-responsive" id="bitImage_1" />
                </li>
            @endforeach
        </ul>

        <div class="clr"></div>
        <h2 class="stk_heading">Specifications</h2>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-responsive stock-table">
                    <!-- First Table -->
                    <tr>
                        <td width="50%">Stock No.</td>
                        <th width="50%"> {{ $product->stock_code }} </th>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <th>{{ $product->cat_info?->title }}</th>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <th>{{ $product->sub_cat_info?->title }}</th>
                    </tr>

                    <tr>
                        <td>Mfg. <span class="text-bold">Year </span>/Month</td>
                        <th>{{ $product->mfg_date_year }}
                            @if ($product->mfg_date_year)
                                {{ '/' . $product->mfg_date_month }}
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>Reg. <span class="text-bold">Year </span>/Month</td>
                        <th>{{ $product->reg_date_year }}
                            @if ($product->reg_date_month)
                                {{ '/' . $product->reg_date_month }}
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <th>{{ $product->type?->title }}</th>
                    </tr>


                </table>
            </div>

            <div class="col-md-4">
                <table class="table table-responsive stock-table">
                    <tr>
                        <td style="width:50%;"><span class="text-bold"><span class="text-bold">Model Code</span></span></td>
                        <th style="width:50%;">{{ $product->model_code }}</th>
                    </tr>
                    <tr>
                        <td>Chassis No.</td>
                        <th>{{ $product->chassis_no }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Engine</td>
                        @php
                            $engine = $product->engine?->title ?? 0;
                            $formattedengine = number_format($engine, 0);
                        @endphp
                        <th width="50%">{{ $product->engine?->title ? $formattedengine . 'CC' : ' ' }} </th>
                    </tr>
                    <tr>
                        <td width="50%">Mileage</td>
                        @php
                            $millage = $product->millage ?? 0;
                            $formattedmillage = number_format($millage, 0);
                        @endphp
                        <th width="50%">{{ $formattedmillage . ' KM' }}</th>
                    </tr>
                    <tr>
                        <td>Point</td>
                        <th>{{ $product->point ? $product->point : 'N/A' }} </th>
                    </tr>
                    <tr>
                        <td>Grade</td>
                        <th>{{ $product->grade ? $product->grade : 'N/A' }} </th>
                    </tr>
                    <tr>
                        <td>Fuel</td>
                        <th>{{ $product->fuel_type?->title }}</th>
                    </tr>
                </table>
            </div>

            <div class="col-md-4">
                <table class="table table-responsive stock-table">
                    <!-- Third Table -->
                    <tr>
                        <td width="50%">Transmission</td>
                        <th width="50%">{{ $product->transmission?->title }}</th>
                    </tr>
                    <tr>
                        <td>Drive</td>
                        <th>{{ $product->stearing == 0 ? 'Right Hand ' : 'Left Hand' }}</th>
                    </tr>
                    <tr>
                        <td>Seats</td>
                        <th>{{ $product->seat }}</th>
                    </tr>
                    <tr>
                        <td>Doors</td>
                        <th>{{ $product->door }}</th>
                    </tr>

                    <tr>
                        <td>2WD/4WD</td>
                        <th style="text-transform: capitalize">{{ $product->dimension }}</th>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <th>{{ $product->color?->title }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Ext. Condition</td>
                        <th width="50%" style="text-transform: capitalize"><a href="javascript:void(0)"
                                class="red_color font_bold">{{ $product->exit_condition == 0 ? ' ' : $product->exit_condition }}
                            </a>
                        </th width="50%">
                    </tr>
                    <tr>
                        <td>Int. Condition</td>
                        <th style="text-transform: capitalize">{{ $product->init_condition }}</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="right_box">
            <h2>Accessories</h2>
            @if (count($product->accessories) > 0)
                <div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Comfort :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->comfort }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Other Features :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->other_feature }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4> Selling Points :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->selling_point }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="clr"> </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Safety :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->safety_measure }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Windows :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->window_type }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="clr"> </div>
                    </div>
                    <div class="clr"></div>


                    <div class="clr"></div>
                    <div class="right_box">
                        <h2>Other Options</h2>
                        @foreach ($product->accessories as $accessory)
                            <div>

                                {{ $accessory->other_information }}

                            </div>
                        @endforeach
                    </div>
                    <div class="clr"></div>
                </div>
            @endif
        </div>



    </div>






    <div class="container">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul>
                        <li class="hidden-xs"><a href="{{ asset('/') }}">Home</a></li>
                        <li><a href="{{ asset('stock-list') }}">Stock List</a></li>
                        <li><a
                                href="{{ asset('car/categories/' . $product->cat_info?->id) }}">{{ $product->cat_info?->title }}</a>
                        </li>
                        <li><a
                                href="{{ asset('car/categories/' . $product->sub_cat_info?->id) }}">{{ $product->sub_cat_info?->title }}</a>
                        </li>
                        <li>{{ $product->reg_date_year }}</li>
                    </ul>
                </div>
                <div class="col-lg-6
                                col-md-6 col-sm-6 col-xs-12 text-right mobile-center">
                    <ul>
                        <li><a href="{{ asset('/stock-list') }}">Search Result</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="stock_detail_bg">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin_bottom_10">
                    <h1 class="stkdetail_heading" style="font-weight: 900;">{{ $product->title }}
                        <span>{{ $product->reg_date_month }} / {{ $product->reg_date_year }}</span>
                    </h1>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 margin_bottom_10">
                    <div class="text-center">
                        <a class="darkgray_color" id="print_bt"> <span class="sp sp-print"></span>&nbsp;Print

                        </a>




                        &nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" class="darkgray_color"
                            id="btn-download"><span class="sp sp-pdf"></span>&nbsp;PDF</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 margin_bottom_10">

                    PRICE :

                    <span id="price_local_detail" class="font_24 font_bold green_color price_jpy_jp"><span
                            id="price_local_detail">
                            @php
                                $rawValue = $product->price_jpy ?? 0;
                                $formattedValue = number_format($rawValue, 0);
                            @endphp

                            {{ $formattedValue }} {{ ' ' }} {{ 'JPY' }}

                        </span></span>
                    <span id="price_local_detail" class="font_24 font_bold green_color price_usd_us"><span
                            id="price_local_detail">
                            @php
                                $rawValue_usd = $product->price_usd ?? 0;
                                $formattedValue_usd = number_format($rawValue_usd, 0);
                            @endphp

                            {{ $formattedValue_usd == 0 ? '' : $formattedValue_usd }} {{ ' ' }}
                            {{ 'USD' }}

                        </span></span>
                    <div class=""
                        style=" margin-top:0px !important;margin-left:auto;width:80px;display:inline-block !important;float:right; margin-right:20px;">

                        <select name="currency" id="currency_switch" class="form-control">
                            <option value="jpy">JPY</option>
                            <option value="usd">USD</option>

                        </select>
                    </div>

                </div>


                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 xs-margin-bottom-10">
                    <div>
                        <span>{{ $product->title }}</span>&nbsp;&nbsp;&nbsp;&nbsp; <strong>
                            @if ($product->sold_out)
                                <span style="color:#1946ee">Now
                                    Sold Out</span>
                        </strong>&nbsp;&nbsp;
                    @else
                        <span style="color:#1946ee">Now
                            On
                            Sale</span></strong>&nbsp;&nbsp;
                        @endif

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 xs-margin-bottom-10">
                    <div class="text-center">
                        <a href="javascript:void(0)" class="btn btn-default font_14"
                            onclick="downloadAllImages({{ $product->id }});">DOWNLOAD IMAGES IN
                            ZIP</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="text-left">
                        <a href="javascript:void(0);" class="btn getfrieght  btn-default font_14 hidden-md hidden-sm "
                            data-stock="{{ $product->stock_code }}" id="com_uni_10060s"
                            title="SEND INQUIRY this Vehicle"><span class="sp sp-SEND INQUIRY "></span><span
                                id="SEND INQUIRY_text_10060s">GET FREIGHT
                                INFORMATION</a></span>&nbsp;&nbsp;


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div>


    <div class="container">
        <div class="stock_first">
            <input value="yes" id="imageAction" type="hidden">
            <div class="main_image"><a href="{{ $firstPhoto }}" data-gallery><img src="{{ $firstPhoto }}"
                        alt="Nissan NOTE" id="large_img" name="main_pic" class="img-responsive center-block" />
                    <div class="img_left_arw"><span class="fa fa-left"></span></div>
                    <div class="img_right_arw"><span class="fa fa-right"></span></div>
                    <div class="img_zoom_arw"><span class="fa fa-dt-zoom"></span></div>
                </a></div>
            <ul class="other_images_ulli">
                @foreach ($photosArray as $index => $image)
                    <li>
                        <a href="{{ asset($image) }}" data-gallery>
                            <img src="{{ asset($image) }}" class="img-responsive" id="bitImage_{{ $index }}"
                                name="{{ $image }}"
                                onMouseOver="document.images.main_pic.src='{{ $image }}'"
                                alt="{{ $image }}">
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="clr"></div>
            <div id="blueimp-gallery" class="blueimp-gallery">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">&lsaquo;</a>
                <a class="next">&rsaquo;</a>
                <a class="close">&times;</a>
                <ol class="indicator">

                </ol>

            </div>



            <div class="clr"></div>
            <script src="/js/blueimp-helper.js"></script>
            <script src="/js/blueimp-gallery.js"></script>
            <script src="/js/blueimp-gallery-fullscreen.js"></script>
            <script src="/js/blueimp-gallery-indicator.js"></script>

            <script src="/js/jquery.blueimp-gallery.js"></script>

            <script>
                $(function() {
                    blueimp.Gallery();
                });
            </script>
            <div id="loading_gif"
                style="position:fixed;width:100%;height:100%; left:0%; top:0%; z-index:999; display:none;    background-color: rgba(55, 49, 49, 0.5); ">
                <img src="{{ asset('images/loading.gif') }}" alt="Loading.."
                    style="position: absolute;left:50%;top:50%; " />
            </div>
            <div id="DivEnqResult" class="stock_calcuate margin_bottom_20 position_relative">

                <div class="right_box">
                    <h2>Get Free Quote</h2>
                    <form action="{{ route('inquiry.send') }}" method="post" class="padding_5">
                        @csrf
                        <div class="red_color_color text-center"></div>
                        <div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><a name="enq_form"></a><input name="name"
                                            type="text" class="form-control" id="name" value maxlength="50"
                                            title="Name" placeholder="Enter Your Name" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10">
                                        <select name="country" id="country" class="form-control" required>
                                            <option value>Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Ascension Island">Ascension Island</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cap Verde">Cap Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (keeling) Islands">Cocos (keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo, Democratic Republic Of The">Congo, Democratic Republic
                                                Of The
                                            </option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia/hrvatska">Croatia/hrvatska</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (malvina)">Falkland Islands (malvina)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard And Mcdonald Islands">Heard And Mcdonald Islands
                                            </option>
                                            <option value="Holy See (city Vatican State)">Holy See (city Vatican State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran (islamic Republic Of)">Iran (islamic Republic Of)
                                            </option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle Of Man">Isle Of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Republic Of">Korea, Republic Of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia, Former Yugoslav Republic">Macedonia, Former
                                                Yugoslav Republic
                                            </option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federal State Of">Micronesia, Federal State Of
                                            </option>
                                            <option value="Moldova, Republic Of">Moldova, Republic Of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion Island">Reunion Island</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                                Grenadines
                                            </option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome And Principe">Sao Tome And Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovak Republic">Slovak Republic</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Pierre And Miquelon">St Pierre And Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen
                                                Islands
                                            </option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Us Minor Outlying Islands">Us Minor Outlying Islands</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (british)">Virgin Islands (british)</option>
                                            <option value="Virgin Islands (usa)">Virgin Islands (usa)</option>
                                            <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Western Samoa">Western Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <br />
                                            <b>Strict Standards</b> <b>31</b><br />
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><input name="email" id="email_1" type="email"
                                            class="form-control" value maxlength="50" title="Enter E-mail ID"
                                            placeholder="Enter E-mail ID" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><input name="telephone" id="telephone_1"
                                            type="text" class="form-control" value maxlength="23"
                                            title="Phone/Cell number" placeholder="Enter Phone/Cell number" required />
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="margin_bottom_10">
                                <div>(<span id="messageCount2" class="red_color font_bold">0</span> / 250)</div>
                                <textarea name="message" rows="3" id="message" class="form-control" onKeyup="checkCharacterCount(this)"
                                    title="Message" placeholder="Enter Your Message" required></textarea>
                                <input type="hidden" name="stock_number" value="{{ $product->stock_code }}">
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <p id="characterCount"> </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="g-recaptcha stock_capcha"
                                        data-sitekey="6LfETpMjAAAAAL4qiCmFEsOtYkxh05tKnIVW7KPH"></div>
                                </div>
                                <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
                                    <div class="mobile-center margin_top_10">
                                        <input type="hidden" name="email_type" value="get free qoute">
                                        <input type="submit" class="btn btn-default" name="Submit"
                                            title="Submit Inquiry" value="Submit Inquiry" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right_box">


                </div>
            </div>

        </div>
        <div class="stock_second">

            <div class="row margin_bottom_30">
                <h2 class="stk_heading">Specifications</h2>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-responsive stock-table">
                        <tr>
                            <td width="50%">Stock No.</td>
                            <th width="50%"> {{ $product->stock_code }} </th>
                        </tr>
                        <tr>
                            <td width="50%">Make</td>
                            <th>{{ $product->cat_info?->title }}</th>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <th>{{ $product->sub_cat_info?->title }}</th>
                        </tr>
                        <tr>
                            <td>Mfg. <span class="text-bold">Year </span>/Month</td>
                            <th>{{ $product->mfg_date_year }}
                                @if ($product->mfg_date_year)
                                    {{ '/' . $product->mfg_date_month }}
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td>Reg. <span class="text-bold">Year </span>/Month</td>
                            <th>{{ $product->reg_date_year }}
                                @if ($product->reg_date_month)
                                    {{ '/' . $product->reg_date_month }}
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <th>{{ $product->type?->title }}</th>
                        </tr>

                        <tr>
                            <td><span class="text-bold"><span class="text-bold">Model Code</span></span></td>
                            <th>{{ $product->model_code }}</th>
                        </tr>
                        <tr>
                            <td>Chassis No.</td>
                            <th>{{ $product->chassis_no }}</th>
                        </tr>
                        <tr>
                            <td width="50%">Engine</td>
                            @php
                                $engine = $product->engine?->title ?? 0;
                                $formattedengine = number_format($engine, 0);
                            @endphp
                            <th width="50%">{{ $product->engine?->title ? $formattedengine . 'CC' : ' ' }} </th>
                        </tr>
                        <tr>
                            <td width="50%">Mileage</td>
                            @php
                                $millage = $product->millage ?? 0;
                                $formattedmillage = number_format($millage, 0);
                            @endphp
                            <th width="50%">{{ $formattedmillage . ' KM' }}</th>
                        </tr>
                        <tr>
                            <td>Point</td>
                            <th>{{ $product->point ? $product->point : 'N/A' }} </th>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <th>{{ $product->grade ? $product->grade : 'N/A' }} </th>
                        </tr>
                        <tr>
                            <td>Fuel</td>
                            <th>{{ $product->fuel_type?->title }}</th>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-responsive stock-table">
                        <tr>
                            <td width="50%">Transmission</td>
                            <th width="50%">{{ $product->transmission?->title }}</th>
                        </tr>
                        <tr>
                            <td>Drive</td>
                            <th>{{ $product->stearing == 0 ? 'Right Hand ' : 'Left Hand' }}</th>
                        </tr>
                        <tr>
                            <td>Seats</td>
                            <th>{{ $product->seat }}</th>
                        </tr>
                        <tr>
                            <td>Doors</td>
                            <th>{{ $product->door }}</th>
                        </tr>

                        <tr>
                            <td>2WD/4WD</td>
                            <th style="text-transform: capitalize">{{ $product->dimension }}</th>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <th>{{ $product->color?->title }}</th>
                        </tr>
                        <tr>
                            <td width="50%">Ext. Condition</td>
                            <th width="50%" style="text-transform: capitalize"><a href="javascript:void(0)"
                                    class="red_color font_bold">{{ $product->exit_condition == 0 ? ' ' : $product->exit_condition }}
                                </a>
                            </th width="50%">
                        </tr>
                        <tr>
                            <td>Int. Condition</td>
                            <th style="text-transform: capitalize"><a href="javascript:void(0)"
                                    class="red_color font_bold">{{ $product->init_condition }}</a></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="right_box">
                    <h2>Accessories</h2>
                    @if (count($product->accessories) > 0)
                        <div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="stock_accories">
                                        <h4>Comfort :</h4>
                                        <ul>
                                            @foreach ($product->accessories as $accessory)
                                                <li>{{ $accessory->comfort }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="stock_accories">
                                        <h4>Other Features :</h4>
                                        <ul>
                                            @foreach ($product->accessories as $accessory)
                                                <li>{{ $accessory->other_feature }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="stock_accories">
                                        <h4> Selling Points :</h4>
                                        <ul>
                                            @foreach ($product->accessories as $accessory)
                                                <li>{{ $accessory->selling_point }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="clr"> </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="stock_accories">
                                        <h4>Safety :</h4>
                                        <ul>
                                            @foreach ($product->accessories as $accessory)
                                                <li>{{ $accessory->safety_measure }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="stock_accories">
                                        <h4>Windows :</h4>
                                        <ul>
                                            @foreach ($product->accessories as $accessory)
                                                <li>{{ $accessory->window_type }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <div class="clr"> </div>
                            </div>
                            <div class="clr"></div>


                            <div class="clr"></div>
                            <div class="right_box">
                                <h2>Other Options</h2>
                                @foreach ($product->accessories as $accessory)
                                    <div>

                                        {{ $accessory->other_information }}

                                    </div>
                                @endforeach
                            </div>
                            <div class="clr"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="clr">

    </div>
    <style>
        /* Bootstrap Modal Styles */

        /* Modal Background Overlay */
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
            opacity: 0.5;
        }

        /* Modal Container */
        .modal {
            display: none;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: fixed;
            width: auto;
            margin: 10px;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            outline: 0;
        }

        .show-modal {
            display: flex;
        }

        /* Modal Dialog */
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
            background-color: #fff;
            background-clip: padding-box;

            border-radius: 0.3rem;
            outline: 0;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;

        }

        /* Modal Header */
        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 5px;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
        }

        /* Modal Title */
        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* Close Button */
        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: 0.5;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            opacity: 0.75;
        }

        /* Modal Body */
        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 8px;
        }

        /* Modal Footer */
        .modal-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border-top: 1px solid #e9ecef;
            border-bottom-right-radius: 0.3rem;
            border-bottom-left-radius: 0.3rem;
        }

        /* Close Button in Footer */
        .modal-footer .btn {
            margin- left: 5px;
        }

        /* Close Button */
        .close {
            float: right;
            font-size: 1.5rem;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            line-height: 18px;
            background: transparent;
            text-shadow: 0 1px 0 #fff;
            opacity: 0.5;
            margin-left: auto;
            border: 0px;
            color: #fff;
            border-radius: 20px;
            background: #1946ee;
        }

        .btn-primary {
            color: #FFFFFF;
            background: #1946ee;
            border-radius: 4px;
            font-weight: bold;

        }

        .btn-primary:hover {
            color: #FFF !important;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            opacity: 0.75;
        }

        /* Responsive Styles for Small Screens */
        @media (max-width: 576px) {
            .modal-dialog {
                margin: 0;
                width: 100%;
            }
        }

        @media(max-width:768px) {
            .d-sm-block {
                display: block !important;
            }
        }
    </style>

    <div class="container" id="download_pdf" style="display:none;">
        <div class="stock_detail_bg">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_10">
                    <h1 class="stkdetail_heading" style="font-weight: 900;">{{ $product->title }}
                        <span>{{ $product->reg_date_month }} / {{ $product->reg_date_year }}</span>
                    </h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_10">
                    <span>{{ $product->title }}</span>&nbsp;&nbsp;&nbsp;&nbsp; <strong><span style="color:#1946ee">Now
                            On
                            Sale</span></strong>&nbsp;&nbsp;
                    <p>PRICE :

                        <span id="price_local_detail" class="font_24 font_bold green_color price_jpy_jp"><span
                                id="price_local_detail">
                                @php
                                    $rawValue = $product->price_jpy ?? 0;
                                    $formattedValue = number_format($rawValue, 0);
                                @endphp

                                {{ $formattedValue }} {{ ' ' }} {{ 'JPY' }}

                            </span></span>
                        <span id="price_local_detail" class="font_24 font_bold green_color price_usd_us">
                            <span id="price_local_detail">
                                @php
                                    $rawValue_usd = $product->price_usd ?? 0;
                                    $formattedValue_usd = number_format($rawValue_usd, 0);
                                @endphp

                                {{ $formattedValue_usd == 0 ? '' : $formattedValue_usd }} {{ ' ' }}
                                {{ 'USD' }}

                            </span></span>
                    </p>
                </div>

            </div>
        </div>

        <div class="" style="margin-top:30px ">

            <img src="{{ asset($firstPhoto) }}" alt="Nissan NOTE" class="img-responsive ">


        </div>
        <ul class="other_images_ulli">


            @foreach ($photosArray as $image)
                <li><a href=""><img src="{{ $image }}" class="img-responsive" id="bitImage_1"
                            name="" onMouseOver="document.images.main_pic.src='{{ $image }}'"
                            alt="Nissan NOTE" /></a>
                </li>
            @endforeach




        </ul>
        <div class="clr"></div>

        <div class="row" style="margin-top:30px ">
            <h2 class="stk_heading">Specifications</h2>
            <div class="col-md-12">
                <table class="table table-responsive stock-table">
                    <!-- First Table -->
                    <tr>
                        <td width="50%">Stock No.</td>
                        <th width="50%"> {{ $product->stock_code }} </th>
                    </tr>
                    <tr>
                        <td width="50%">Make</td>
                        <th width="50%">{{ $product->cat_info?->title }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Model</td>
                        <th width="50%">{{ $product->sub_cat_info?->title }}</th>
                    </tr>
                    <tr>
                        <td>Mfg. <span class="text-bold">Year </span>/Month</td>
                        <th>{{ $product->mfg_date_year }}
                            @if ($product->mfg_date_year)
                                {{ '/' . $product->mfg_date_month }}
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>Sold Out</td>
                        <th>{{ $product->sold_out ? 'Yes' : 'No' }}</th>
                    </tr>
                    <tr>
                        <td>Reg. <span class="text-bold">Year </span>/Month</td>
                        <th>{{ $product->reg_date_year }}
                            @if ($product->reg_date_month)
                                {{ '/' . $product->reg_date_month }}
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td width="50%">Type</td>
                        <th width="50%">{{ $product->type?->title }}</th>
                    </tr>


                </table>
            </div>

            <div class="col-md-12">
                <table class="table table-responsive stock-table">
                    <tr>
                        <td width="50%"><span class="text-bold"><span class="text-bold">Model Code</span></span></td>
                        <th width="50%">{{ $product->model_code }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Chassis No.</td>
                        <th width="50%">{{ $product->chassis_no }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Engine</td>
                        @php
                            $engine = $product->engine?->title ?? 0;
                            $formattedengine = number_format($engine, 0);
                        @endphp
                        <th width="50%">{{ $product->engine?->title ? $formattedengine . 'CC' : ' ' }} </th>
                    </tr>
                    <tr>
                        <td width="50%">Mileage</td>
                        @php
                            $millage = $product->millage ?? 0;
                            $formattedmillage = number_format($millage, 0);
                        @endphp
                        <th width="50%">{{ $formattedmillage . ' KM' }}</th>
                    </tr>
                    <tr>
                        <td>Point</td>
                        <th>{{ $product->point ? $product->point : 'N/A' }} </th>
                    </tr>
                    <tr>
                        <td>Grade</td>
                        <th>{{ $product->grade ? $product->grade : 'N/A' }} </th>
                    </tr>
                    <tr>
                        <td width="50%">Fuel</td>
                        <th width="50%">{{ $product->fuel_type?->title }}</th>
                    </tr>
                </table>
            </div>

            <div class="col-md-12">
                <table class="table table-responsive stock-table">
                    <!-- Third Table -->
                    <tr>
                        <td width="50%">Transmission</td>
                        <th width="50%">{{ $product->transmission?->title }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Drive</td>
                        <th width="50%">{{ $product->stearing == 0 ? 'Right Hand ' : 'Left Hand' }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Seats</td>
                        <th width="50%">{{ $product->seat }}</th>
                    </tr>
                    <tr>
                        <td>Doors</td>
                        <th>{{ $product->door }}</th>
                    </tr>
                    <tr>
                        <td width="50%">2WD/4WD</td>
                        <th width="50%" style="text-transform: capitalize">{{ $product->dimension }}</th>
                    </tr>
                    <tr>
                        <td width="50%">Color</td>
                        <th width="50%">{{ $product->color?->title }}</th>
                    </tr>
                    <tr>
                        <td width="50%" style="text-transform: capitalize">Ext. Condition</td>
                        <th width="50%" style="text-transform: capitalize"><a href="javascript:void(0)"
                                class="red_color font_bold">{{ $product->exit_condition == 0 ? ' ' : $product->exit_condition }}
                            </a>
                        </th width="50%">
                    </tr>
                    <tr>
                        <td>Int. Condition</td>
                        <th width="50%" style="text-transform: capitalize"><a href="javascript:void(0)"
                                class="red_color font_bold">{{ $product->init_condition }}</a>
                        </th width="50%">
                    </tr>
                </table>
            </div>
        </div>

        <div class="right_box">
            <h2>Accessories</h2>
            @if (count($product->accessories) > 0)
                <div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Comfort :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->comfort }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Other Features :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->other_feature }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4> Selling Points :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->selling_point }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="clr"> </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Safety :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->safety_measure }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <div class="stock_accories">
                                <h4>Windows :</h4>
                                <ul>
                                    @foreach ($product->accessories as $accessory)
                                        <li>{{ $accessory->window_type }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="clr"> </div>
                    </div>
                    <div class="clr"></div>


                    <div class="clr"></div>
                    <div class="right_box">
                        <h2>Other Options</h2>
                        @foreach ($product->accessories as $accessory)
                            <div>

                                {{ $accessory->other_information }}

                            </div>
                        @endforeach
                    </div>
                    <div class="clr"></div>
                </div>
            @endif
        </div>



    </div>
    <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="closes" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inquiry.send') }}" method="post" method="post" class="padding_5">
                        @csrf

                        <div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for="" style="font-size: 14px;line-height: 18px;width: 26%;">Stock
                                            Number <span style="color:#FF362F">*</span></label>
                                        <input name="stock_number" type="number" class="form-control" id="stock"
                                            value="" maxlength="50" title="stock" placeholder="" required="">
                                        @error('stock')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for="" style="font-size: 14px;line-height: 18px;width: 26%;">Name
                                            <span style="color:#FF362F">*</span></label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            value="" maxlength="50" title="Name" placeholder="" required="">
                                        <input type="hidden" name="email_type" value="Vehicle Inquiry">
                                        @error('name')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for=""
                                            style="font-size: 14px;line-height: 18px;width: 26%;">Contact
                                            Number
                                            <span style="color:#FF362F">*</span></label>
                                        <input name="telephone" type="number" class="form-control" id="telephone"
                                            value="" maxlength="50" title="telephone" placeholder=""
                                            required="">
                                        @error('telephone')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for="" style="font-size: 14px;line-height: 18px;width: 26%;">Email
                                            Address
                                            <span style="color:#FF362F">*</span></label>
                                        <input name="email" type="email" class="form-control" id="email"
                                            title="email" placeholder="" required="">
                                        @error('email')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 ">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for=""
                                            style="font-size: 14px;line-height: 18px;width: 26%;">Destination
                                            Country<span style="color:#FF362F">*</span></label>
                                        <select name="country" id="country" class="form-control" required="">
                                            <option value="">Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Ascension Island">Ascension Island</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cap Verde">Cap Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (keeling) Islands">Cocos (keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo, Democratic Republic Of The">Congo, Democratic Republic
                                                Of The
                                            </option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia/hrvatska">Croatia/hrvatska</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (malvina)">Falkland Islands (malvina)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard And Mcdonald Islands">Heard And Mcdonald Islands
                                            </option>
                                            <option value="Holy See (city Vatican State)">Holy See (city Vatican State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran (islamic Republic Of)">Iran (islamic Republic Of)
                                            </option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle Of Man">Isle Of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Republic Of">Korea, Republic Of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia, Former Yugoslav Republic">Macedonia, Former
                                                Yugoslav Republic
                                            </option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federal State Of">Micronesia, Federal State Of
                                            </option>
                                            <option value="Moldova, Republic Of">Moldova, Republic Of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion Island">Reunion Island</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                                Grenadines
                                            </option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome And Principe">Sao Tome And Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovak Republic">Slovak Republic</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Pierre And Miquelon">St Pierre And Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen
                                                Islands
                                            </option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Us Minor Outlying Islands">Us Minor Outlying Islands</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (british)">Virgin Islands (british)</option>
                                            <option value="Virgin Islands (usa)">Virgin Islands (usa)</option>
                                            <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Western Samoa">Western Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>

                                            Strict Standards 31
                                        </select>
                                        @error('country')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10 d-flex align-items-center d-sm-block">
                                        <label for="" style="font-size: 14px;line-height: 18px;width: 26%;">Port
                                            Name
                                            <span style="color:#FF362F">*</span></label>
                                        <input name="port" type="port" class="form-control" id="port"
                                            title="port" placeholder="" required="">
                                        @error('country')
                                            <span style="color:#FF362;margin-top:10px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="margin_bottom_10">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>

                </div>
                </form>
            </div>
        </div>

    </div>
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

    <script>
        $(".getfrieght").click(function() {
            let stock = $(this).attr("data-stock");
            $("#stock").val('')
            $("#stock").val(stock)
            $("#exampleModal").toggleClass('show-modal');
        })
        $("#closes").click(function() {
            $("#exampleModal").removeClass('show-modal');
        })
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

    <script>
        function checkCharacterCount(textarea) {
            var message = textarea.value;
            var maxLength = 250;

            var characterCountElement = document.getElementById('characterCount');
            characterCountElement.textContent = 'Characters: ' + message.length + '/' + maxLength;

            if (message.length > maxLength) {
                // You can handle exceeding character limit here
                characterCountElement.style.color = 'red';
            } else {
                characterCountElement.style.color = 'black';
            }
        }
    </script>

    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>


    <script>
        document.getElementById('print_bt').addEventListener('click', function() {
            // Set the display property to block before printing
            document.getElementById('printableContent').style.display = 'block';

            // Trigger the printing process
            printJS({
                printable: 'printableContent',
                type: 'html',

                css: [
                    '/css/external.css',
                    'https://fonts.googleapis.com/css?family=Open+Sans:400,700',

                ],
                scanStyles: true
            });

            // Set the display property back to none after printing (optional)
            document.getElementById('printableContent').style.display = 'none';
        });
    </script>



    <!-- Include html2pdf library -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <!-- Include jszip-utils library for fetching images -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2pdf.js@0.10.0/dist/html2pdf.bundle.js"></script>


    <script>
        const options = {
            margin: 0.2,
            filename: 'car-details',
            image: {
                type: 'png',
                quality: 1
            },

            html2canvas: {
                scale: 2
            },

            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            },
            // pagebreak: {
            //     mode: 'avoid-all'
            // }
        }

        $('#btn-download').click(function(e) {
            e.preventDefault();

            const element = document.getElementById('download_pdf');
            element.style.display = 'block';
            html2pdf().from(element).set(options).save();
            $("#loading_gif").show()
            setTimeout(() => {
                $("#loading_gif").hide()
            }, 2000);
            // element.style.display = 'none';
        });
    </script>



@endsection
