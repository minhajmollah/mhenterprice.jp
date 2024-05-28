 <footer>
     <div class="footer hidden-xs">
         <div class="container-fluid">
             <div class="footer-heading-after">
                 <div class="row">
                     <div class="col-lg-2 col-md-2 col-sm-2">
                         <div class="fot_address">
                             @php
                                 $settings = App\Models\Settings::first();
                             @endphp
                             <div><img src="{{ asset($settings->logo) }}" class="img-responsive"
                                     alt="ReSale Traders Co., Ltd." /></div>

                         </div>
                     </div>

                     <div class="col-lg-2 col-md-2 col-sm-4">
                         <div class="fot_address">

                             <h4 class="mt-0 footer-heading-after">
                                 SITEMAP
                             </h4>
                             <ul>
                                 <li>
                                     <a href="{{ asset('/') }}" class="text-footer">Home</a>
                                 </li>
                                 <li><a href="{{ asset('/about-mh') }}" class="text-footer">About Us</a></li>
                                 <li><a href="{{ asset('about-mh') }}" class="text-footer">Stock List</a></li>
                                 <li><a href="{{ asset('bank-information') }}" class="text-footer">Bank Details</a></li>
                                 <li><a href="{{ asset('vehicle-inquiry') }}" class="text-footer">Inquiry</a></li>
                                 <li><a href="{{ asset('contact-details') }}" class="text-footer">Contact</a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-2 col-sm-2">
                         <div class="fot_address">

                             <h4 class="mt-0 footer-heading-after">
                                 Contact Us
                             </h4>
                             <ul>
                                 <li class="text-footer">
                                     <a target="_blank"
                                         href="https://api.whatsapp.com/send?phone=817041381231&text=Hi,%20I%20want%20to%20buy%20cars%20">
                                         <label class="">
                                             <span class="fa fa-whatsapp"></span></label>+81-70-4138-1231
                                         <p>
                                             (WhatsApp/viber/Line)
                                         </p>
                                     </a>
                                 </li>
                                 <li class="text-footer">
                                     <label class="icon-circle"><svg xmlns="http://www.w3.org/2000/svg"
                                             style="height: 8px;"
                                             viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                             <path
                                                 d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                         </svg></label>+81-47-727-2794
                                 </li>
                                 <li class="text-footer"><label class="icon-circle"><svg
                                             xmlns="http://www.w3.org/2000/svg" style="height: 8px;"
                                             viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                             <path
                                                 d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                                         </svg></label>support@mahenterpise.jp</li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-5 col-md-5 col-sm-4">
                         <div class="fot_address">

                             <h4 class="mt-0 footer-heading-after">
                                 Explore
                             </h4>
                             <div class="row"
                                 style="background: transparent !important; box-shadow: none !important;">
                                 <div class="col-md-6">
                                     <h4 class="mt-0 text-uppercase">
                                         Search By Make
                                     </h4>
                                     <div class="d-flex">
                                         <div class="left">
                                             <ul class="brand">
                                                 @php
                                                     $categories = \App\Models\Category::where('is_parent', 1)
                                                         ->take(6)
                                                         ->get();
                                                 @endphp
                                                 @foreach ($categories as $category)
                                                     <li>
                                                         <a href="{{ asset('/car/categories/') . '/' . $category->id }}"
                                                             class="text-footer">
                                                             {{ $category->title }}
                                                         </a>
                                                     </li>
                                                 @endforeach

                                             </ul>
                                         </div>
                                         <div class="right ml-30">
                                             <ul class="brand">
                                                 @php
                                                     $categoriess = \App\Models\Category::where('is_parent', 1)
                                                         ->offset(6)
                                                         ->take(6)
                                                         ->get();
                                                 @endphp
                                                 @foreach ($categoriess as $category)
                                                     <li>
                                                         <a href="{{ asset('/car/categories/') . '/' . $category->id }}"
                                                             class="text-footer">
                                                             {{ $category->title }}
                                                         </a>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                         </div>

                                     </div>

                                 </div>
                                 <div class="col-md-6">
                                     <h4 class="mt-0 text-uppercase">
                                         Search By Body Type
                                     </h4>
                                     <div class="d-flex">
                                         <div class="left">
                                             <ul class="brand">
                                                 @php
                                                     $types = \App\Models\Type::take(6)->get();
                                                 @endphp
                                                 @foreach ($types as $type)
                                                     <li>
                                                         <a href="{{ asset('types/products/') . '/' . $type->id }}"
                                                             class="text-footer">
                                                             {{ $type->title }}
                                                         </a>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                         </div>
                                         <div class="right ml-30">
                                             <ul class="brand">
                                                 @php
                                                     $typess = \App\Models\Type::offset(7)
                                                         ->take(6)

                                                         ->get();
                                                 @endphp
                                                 @foreach ($typess as $type)
                                                     <li>
                                                         <a href="{{ asset('types/products/') . '/' . $type->id }}"
                                                             class="text-footer">
                                                             {{ $type->type }}
                                                         </a>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                         </div>

                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="national-flag" style="color:#D7D7D7 ;">

                 <div class="row">
                     <div class="col-md-1">
                         <div>
                             Asia
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-de"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-pk"></span>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-2">
                         <div>
                             Europe
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-gb"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-au"></span>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-3">
                         <div>
                             Africa
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-gh"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-zw"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-sz"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-ci"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-cd"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-bw"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-ke"></span>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-1">
                         <div>
                             Oceania
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-fj"></span>
                             </div>

                         </div>
                     </div>
                     <div class="col-md-3">
                         <div>
                             North America
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-do"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-sr"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-bs"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-us"></span>
                             </div>

                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-jm"></span>
                             </div>

                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-gt"></span>
                             </div>

                         </div>
                     </div>
                     <div class="col-md-2">
                         <div>
                             South America
                         </div>
                         <div class="d-flex">
                             <div class="image-item">
                                 <span class="flag-icon flag-icon-cl"></span>
                             </div>
                             <div class="image-item ml-10">
                                 <span class="flag-icon flag-icon-tt"></span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

     </div>
     </div>
     <div class="clr"></div>
     <div class="bot_strip">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mobile-center text-center">Copyright &#169;
                     2022-2023, M.H Enterprise All Rights reserved</div>

             </div>
         </div>
     </div>
 </footer>
 <div class="scrollup"><span class="fa fa-top-arrow"></span></div>


 <script src="{{ asset('js/ajax_main_tain.js') }}"></script>
 @stack('scripts')
 </body>

 </html>
