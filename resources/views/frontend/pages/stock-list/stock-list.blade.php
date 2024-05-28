@extends('frontend.layouts.master')

@section('content')
    <div class="clr"></div>
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


    <!-- Modal -->

    <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="" style="font-size: 14px;line-height: 18px;width: 26%;">Contact
                                            Number
                                            <span style="color:#FF362F">*</span></label>
                                        <input name="telephone" type="number" class="form-control" id="telephone"
                                            value="" maxlength="50" title="telephone" placeholder="" required="">
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

    </div>
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
                @php
                    function getFirstTwoWordsLetters($str)
                    {
                        $words = explode(' ', $str);
                        $initials = array_map(function ($word) {
                            return strtoupper($word[0]);
                        }, array_slice($words, 0, 2));
                        return implode('', $initials);
                    }
                @endphp


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

                        @if ($product->is_discount)
                            @php
                                $discounted_jp = $product->price_jpy - $product->price_jpy * ($product->discount / 100);
                                $discounted_jp = number_format($discounted_jp, 0);
                                $discounted_us = $product->price_usd - $product->price_usd * ($product->discount / 100);
                                $discounted_us = number_format($discounted_us, 0);

                            @endphp
                        @endif
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
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 price_jpy_jp">
                                            <div class="text-right">PRICE :
                                                <span class="price">


                                                    <strong id="fobPrice0" class="font_20 green_color"> @php
                                                        $rawValue = $product->price_jpy ?? 0;
                                                        $formattedValue = number_format($rawValue, 0);
                                                    @endphp

                                                        {{ $formattedValue }} {{ ' ' }} {{ 'JPY' }}

                                                    </strong>
                                                    @if ($product->is_discount)
                                                        <br />
                                                        <span style="font-size: 13px;color:green; font-style:italic;">
                                                            {{ $discounted_jp }}
                                                            {{ 'JPY' }} (Discounted Price)</span>
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 price_usd_us">
                                            <div class="text-right">PRICE :
                                                <span class="price">


                                                    <strong id="fobPrice0" class="font_20 green_color"> @php
                                                        $rawValue_usd = $product->price_usd ?? 0;
                                                        $formattedValue_usd = number_format($rawValue_usd, 0);
                                                    @endphp

                                                        {{ $formattedValue_usd == 0 ? '' : $formattedValue_usd }}
                                                        {{ ' ' }} {{ 'USD' }}

                                                    </strong>
                                                    @if ($product->is_discount)
                                                        <br />
                                                        <span style="font-size: 13px;color:green;font-style:italic;">
                                                            {{ $discounted_us }}
                                                            {{ 'USD' }}(Discounted Price)</span>
                                                    @endif

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
                                                    <div><span class="text-bold"><span class="text-bold">Grade
                                                            </span></span> :
                                                        {{ $product->grade ?: 'N/A' }}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin_bottom_10"
                                                    style="padding:0px;">
                                                    <div><span class="text-bold"><span class="text-bold">Point </span>
                                                        </span> : <span>
                                                            {{ $product->point ?: 'N/A' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list_option">
                                                @php
                                                    $millage = $product->millage ?? 0;
                                                    $formattedmillage = number_format($millage, 0);
                                                @endphp
                                                <span class="sp sp-mileage tooltip"
                                                    aria-label="Mileage"></span>{{ $product ? $formattedmillage . ' KM' : 'Not Assigned' }}

                                                <strong>|</strong>
                                                @php
                                                    $engine = $product->engine?->title ?? 0;
                                                    $formattedengine = number_format($engine, 0);
                                                @endphp
                                                <span class="sp sp-engine tooltip" aria-label="Engine CC"></span>ty
                                                {{ $product->engine?->title ? $formattedengine . ' CC' : 'Not Assigned' }}
                                                <strong>|</strong>
                                                <span class="sp sp-fuel tooltip"
                                                    aria-label="Fuel"></span>{{ $product->fuel_type ? $product->fuel_type->title : 'Not Assigned' }}<strong>|</strong><span
                                                    class="sp sp-transmission tooltip" aria-label="Tranmission"></span>
                                                {{ $product->transmission ? '(' . getFirstTwoWordsLetters($product->transmission->title) . ')' : '' }}

                                                @if ($product->sold_out)
                                                    <span>
                                                        <svg style="padding-top: 4px;" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 14 14" width="14" height="14"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <rect x="1" y="1" width="12" height="12"
                                                                rx="2" ry="2"></rect>
                                                            <line x1="3" y1="3" x2="11"
                                                                y2="11">
                                                            </line>
                                                            <line x1="3" y1="11" x2="11"
                                                                y2="3">
                                                            </line>
                                                        </svg>

                                                        {{ 'Sold Out' }}
                                                @endif


                                            </div>
                                            <div class="text-left">
                                                <a href="javascript:void(0);"
                                                    class="btn getfrieght  btn-default font_14 hidden-md hidden-sm "
                                                    data-stock="{{ $product->stock_code }}" id="com_uni_10060s"
                                                    title="SEND INQUIRY this Vehicle"><span
                                                        class="sp sp-SEND INQUIRY "></span><span
                                                        id="SEND INQUIRY_text_10060s">GET FREIGHT
                                                        INFORMATION</a></span>&nbsp;&nbsp;
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
    <!-- Button trigger modal -->

    <!-- Include JSZip library -->
    <!-- Include JSZip library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.0/jszip.min.js"></script>
    <!-- Include jszip-utils library for fetching images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.0.2/jszip-utils.min.js"></script>

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
@endsection
