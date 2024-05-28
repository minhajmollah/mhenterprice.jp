@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || FAQ PAGE')
@section('content')
<div class="container">
<h1 class="common_heading">FREQUENT ASK QUESTIONS</h1>
        <div class="inner_nav ">
            <ul class="why_menu custom_tab">
               
                <li><a href="{{asset('/how-to-buy')}}">How to Buy</a></li>
                <li><a href="{{asset('/faq')}}" class="active">FAQ</a></li>
                <li class="hidden-md hidden-sm"><a href="{{asset('/freight-table')}}">FREIGHT TABLE</a></li>
                <li><a href="{{asset('/vehicle-inquiry')}}">VEHICLE INQUIRY</a></li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class=" style=" margin: 0px 5%;">


            <div class="faq_ques ans1" title="Click To View Answer">
                <span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#196eee"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></span>
                <span>How can I buy cars with MH?</span>
            </div>
            <div class="clr margin_bottom_10"></div>
            <div id="ans1" class="faq_ans">

                <p> If you are the first time buyer, these are the steps:</p>
                <p>1. Send an inquiry to support@mhenterprise.jp</p>
                <p>2. Upon choosing the car that meets your criteria, MH will request the initial deposit. Once
                    confirmed, MH will coordinate the shipment of the vehicle.</p>

                <p>3. Upon the completion of all installment payments, MH will dispatch all essential documentation to
                    facilitate the release of the car at the destination port.</p>
            </div>

            <div class="faq_ques ans2" title="Click To View Answer">
                <span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#196eee"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></span>
                <span>Which forms of payment are accepted?</span>
            </div>
            <div class="clr margin_bottom_10"></div>
            <div id="ans2" class="faq_ans">

                At present, we receive payments through telegraphic transfers (T/T) to our designated bank account
                (details provided on all invoices and our "Bank Information" page) as well as via PayPal.
            </div>


            <div class="faq_ques ans3" title="Click To View Answer">
                <span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#196eee"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></span>
                <span> What is the estimated timeframe for the delivery of my car?</span>
            </div>
            <div class="clr margin_bottom_10"></div>
            <div id="ans3" class="faq_ans">

                <p> The delivery duration for any car is influenced by various factors. While we strive to expedite the
                    process, the timeframe depends on the country and shipping schedules, typically ranging from 4 to 8
                    weeks.
                </p>


            </div>
            <div class="faq_ques ans4" title="Click To View Answer">
                <span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path fill="#196eee"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg></span>
                <span> Are left-hand drive (LHD) cars available through MH??</span>
            </div>
            <div class="clr margin_bottom_10"></div>
            <div id="ans4" class="faq_ans">

                <p> While left-hand drive (LHD) cars are not prevalent in Japan, we will make every effort to assist you
                    in locating a car that meets your requirements.
                </p>


            </div>
			<div class="faq_ques ans5" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Is it possible to cancel my purchase?</span>
			</div>
			<div id="ans5" class="faq_ans">
		
				<p>Certainly, cancellations are allowed, but please note that there might be associated charges.</p>
			</div>
		
			<div class="faq_ques ans6" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Is there a pre-shipping inspection process for the cars?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans6" class="faq_ans">
			
				<p>Prior to shipping, we ensure that the car's specifications align with the technical sheet provided by the auction houses.</p>
			</div>
			<div class="faq_ques ans7" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>How does MH identify the most suitable car for my needs?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans7" class="faq_ans">
			
				<p>We maintain enduring partnerships with auction houses. Leveraging these trusted relationships allows us to offer our clients the most optimal options available.</p>
			</div>
			<div class="faq_ques ans8" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>To which countries do you provide car shipping services?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans8" class="faq_ans">
			
				<p>Due to our extensive and established collaboration with shipping companies, we can facilitate car shipments to any country worldwide that accepts used cars from Japan.</p>
			</div>
			<div class="faq_ques ans9" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Is it possible to include auto parts within the purchased car during shipment?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans9" class="faq_ans">
			
				<p>Regrettably, shipping companies do not permit any items to be transported inside the vehicles, unless they are shipped using a container.</p>
			</div>
			<div class="faq_ques ans10" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Is it possible to obtain an additional set of keys?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans10" class="faq_ans">
			
				<p>If the car being sold includes a spare key, we will ensure its delivery to you. In the absence of a spare key, it is the customer's responsibility to arrange for key duplication.</p>
			</div>
			<div class="faq_ques ans11" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Is it possible to request cars that are not listed on your website?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans11" class="faq_ans">
			
				<p>Feel free to reach out with any requests, and we will make every effort to locate precisely what you are looking for.</p>
			</div>
			<div class="faq_ques ans12" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>Who is responsible for covering the bank transfer fees?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans12" class="faq_ans">
			
				<p>The buyer is responsible for covering all bank fees. Kindly contact your bank to confirm the precise amount.</p>
			</div>
			
			<div class="faq_ques ans13" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>What is the expected duration for you to receive my money transfer?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans13" class="faq_ans">
			
				<p>Kindly allow a minimum of 3 business days for the transfers to be processed and reflected in our account.</p>
			</div>
			<div class="faq_ques ans14" title="Click To View Answer">
				<span class="plus"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
						<path fill="#196eee"
							d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
					</svg></span>
				<span>What types of vehicles does MH provide?</span>
			</div>
			<div class="clr margin_bottom_10"></div>
			<div id="ans14" class="faq_ans">
			
				<p>MH can offer an extensive range of vehicles, including cars, trucks, and motorcycles.</p>
			</div>
			
			<div class="clr margin_bottom_30"></div>
        </div>
        </div>
        @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $('.faq_ans').hide();
                $("#ans1").toggle("slow");
                $(".ans1").click(function () {
                    $("#ans1").toggle("slow");
                });

                $(".ans2").click(function () {
                    $("#ans2").toggle("slow");
                });

                $(".ans3").click(function () {
                    $("#ans3").toggle("slow");
                });

                $(".ans4").click(function () {
                    $("#ans4").toggle("slow");
                });

                $(".ans5").click(function () {
                    $("#ans5").toggle("slow");
                });

                $(".ans6").click(function () {
                    $("#ans6").toggle("slow");
                });

                $(".ans7").click(function () {
                    $("#ans7").toggle("slow");
                });

                $(".ans8").click(function () {
                    $("#ans8").toggle("slow");
                });

                $(".ans9").click(function () {
                    $("#ans9").toggle("slow");
                });

                $(".ans10").click(function () {
                    $("#ans10").toggle("slow");
                });

                $(".ans11").click(function () {
                    $("#ans11").toggle("slow");
                });

                $(".ans12").click(function () {
                    $("#ans12").toggle("slow");
                });

                $(".ans13").click(function () {
                    $("#ans13").toggle("slow");
                });

                $(".ans14").click(function () {
                    $("#ans14").toggle("slow");
                });

                $(".ans15").click(function () {
                    $("#ans15").toggle("slow");
                });
            });
        </script>
        @endpush
@endsection