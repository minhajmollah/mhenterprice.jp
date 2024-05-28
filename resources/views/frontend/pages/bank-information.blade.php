@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || BANK INFORMATION PAGE')
@section('content')
    <div class="container">
        <h1 class="common_heading">BANK INFORMATION</h1>
        <div class="inner_nav ">
            <ul class="why_menu custom_tab">


                <li><a href="{{ asset('/bank-information') }}" class="active">Bank INFORMATION</a></li>
                <li><a href="{{ asset('/faq') }}">FAQ</a></li>
                <li class="hidden-md hidden-sm"><a href="{{ asset('/freight-table') }}">FREIGHT TABLE</a></li>
                <li><a href="{{ asset('/vehicle-inquiry') }}">VEHICLE INQUIRY</a></li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="detial-item mb-50">
            <div class="d-flex justify-content-between d-block mb-20">

                <h4 class="bank_details_heading align-self-end  text-sm-center">PAYMENT IN JPY BANK TRANSFER</h4>



                <img src="{{ asset('/') }}images/mut.png" alt="" class="img-fluid ">
            </div>

            <table class="table table-responsive table-bordered table-striped bank_details">
                <tbody>
                    <tr>
                        <th width="25%">Beneficiary Name</th>
                        <td width="75%">Hamza Hanif</td>
                    </tr>
                    <tr>
                        <th>Beneficiary Address</th>
                        <td>Chiba-Ken Ichikawa-shi Myoden 1-10 Postal code 272-0111</td>
                    </tr>
                    <tr>
                        <th>Bank Name</th>
                        <td>MUFG Bank
                        </td>
                    </tr>
                    <tr>
                        <th>Branch Name</th>
                        <td>Urayasu Branch</td>
                    </tr>
                    <tr>
                        <th>Branch Address</th>
                        <td>1-17-11, Kitazakae, Urayasu-shi, Chiba, Japan</td>
                    </tr>
                    <tr>
                        <th>Branch Code</th>
                        <td>285</td>
                    </tr>
                    <tr>
                        <th>SWIFT Cdoe</th>
                        <td>BOTKJPJT</td>
                    </tr>
                    <tr>
                        <th>Account Number</th>
                        <td>1079931</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="detial-item mb-50">
            <div class="d-flex justify-content-between mb-20">

                <h4 class="bank_details_heading align-self-end ">PAYMENT IN WISE (TRANSFERWISE)</h4>



                <img src="{{ asset('/') }}images/wise-logo.png" alt="" class="img-fluid ">
            </div>

            <table class="table table-responsive table-bordered table-striped bank_details">
                <tbody>
                    <tr>
                        <th width="25%">Organization Name</th>
                        <td width="75%">Hamza Hanif</td>
                    </tr>

                    <tr>
                        <th>Bank Name</th>
                        <td>MUFG Bank
                        </td>
                    </tr>
                    <tr>
                        <th>Bank Code</th>
                        <td>0005
                        </td>
                    </tr>
                    <tr>
                        <th>Branch Name</th>
                        <td>Urayasu Branch</td>
                    </tr>
                    <tr>
                        <th>Branch Address</th>
                        <td>1-17-11, Kitazakae, Urayasu-shi, Chiba, Japan</td>
                    </tr>

                    <tr>
                        <th>Account Type</th>
                        <td>Futsu</td>
                    </tr>
                    <tr>
                        <th>Account Number</th>
                        <td>1079931</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="detial-item mb-50">
            <div class="d-flex justify-content-between mb-20">

                <h4 class="bank_details_heading align-self-end ">PAYMENT IN PAYPAL</h4>



                <img src="{{ asset('/') }}images/Paypal-logo.png" alt="" class="img-fluid ">
            </div>

            <table class="table table-responsive table-bordered table-striped bank_details">
                <tbody>
                    <tr>
                        <th width="25%">Organization Name</th>
                        <td width="75%">Hamza Hanif</td>
                    </tr>

                    <tr>
                        <th>Additional Fee</th>
                        <td>Please add extra 4% for payment in JPY
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
