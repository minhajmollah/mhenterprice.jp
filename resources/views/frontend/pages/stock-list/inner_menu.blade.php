   <h1 class="common_heading" style="color:#1946ee;">SEARCH USED VEHICLES</h1>
   <div class="inner_nav ">
       <ul class="why_menu">
           <li>
               <a href="{{ url('/stock-list') }}"
                   class="{{ request()->path() === 'stock-list' && empty(request()->getQueryString()) ? 'active' : '' }}">Search
                   Stock</a>
           </li>

           <li>
               <a href="{{ url('/stock-list?new-addition') }}"
                   class="{{ request()->path() === 'stock-list' && request()->has('new-addition') ? 'active' : '' }}">NEW
                   ADDITION</a>
           </li>


           <li><a href="{{ asset('/how-to-buy') }}">HOW TO PURCHASE</a></li>
           <li><a href="{{ asset('/faq') }}">FAQ</a></li>
           <li class="hidden-md hidden-sm"><a href="{{ asset('/freight-table') }}">FREIGHT TABLE</a></li>
           <li><a href="{{ asset('/vehicle-inquiry') }}">VEHICLE INQUIRY</a></li>
       </ul>
       <div class="clr"></div>
   </div>
