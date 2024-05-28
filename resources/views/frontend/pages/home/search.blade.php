  <ul class="mid_search_op">
      <li><a href="{{ asset('stock-list') }}" class="active">Stock</a></li>
  </ul>
  <div class="hp_search">
      <form action="{{ route('search') }}" method="post" name="searchfrom" class="webform-client-form">
          @csrf
          <div class="row">
              <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 margin_bottom_10">
                  <select name="make" id="make_id" class="hp-control">
                      <option value>Select Make</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                      @endforeach

                  </select>
                  <div id="loader1" style="visibility:hidden; display:none;"><img src="images/ajax-loader.gif"
                          alt="Loading.." /></div>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 margin_bottom_10">
                  <select name="model" id="maker_id_breif" class="hp-control">
                      <option value>Select Model</option>
                  </select>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 margin_bottom_10">
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_right_5">
                          <select name="year_from" class="hp-control"><span class="text-bold">Year </span>
                              <option value><span class="text-bold">Year </span> From</option>
                              @php
                                  $currentYear = date('Y');
                                  $startYear = 1985;
                              @endphp

                              @for ($year = $currentYear; $year >= $startYear; $year--)
                                  <option value="{{ $year }}">{{ $year }}</option>
                              @endfor
                          </select>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_left_5">
                          <select name="year_to" class="hp-control">
                              <option value><span class="text-bold">Year </span> To</option>

                              @php
                                  $currentYear = date('Y');
                                  $startYear = 1985;
                              @endphp

                              @for ($year = $currentYear; $year >= $startYear; $year--)
                                  <option value="{{ $year }}">{{ $year }}</option>
                              @endfor
                          </select>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-9 col-sm-8 col-xs-12 margin_bottom_10">
                  <input type="text" name="keyword" value class="hp-control" placeholder="Stock ID or Keywords" />
              </div>
              <div class="col-lg-2 col-md-3 col-sm-offset-0 col-sm-4 col-xs-offset-3 col-xs-6">
                  <button type="submit" class="hp_search_btn slow"><span class="fa fa-search"></span>
                      Search</button>
              </div>
          </div>
      </form>
  </div>
  <div class="clr"></div>
