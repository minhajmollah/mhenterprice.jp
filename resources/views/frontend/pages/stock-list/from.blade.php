<form action="{{ route('search') }}" method="post" name="formUsual" id="formUsual"
    class="webform-client-form margin_bottom_20">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select name="make" id="make_id" class="form-control">
                <option value>Select Make</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select name="model" id="maker_id_breif" class="form-control">
                <option value>All Model</option>
            </select>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <select name="model_code" id="model_code" class="form-control">
                <option value>All
                    <span class="text-bold">
                        <span class="text-bold"><span class="text-bold">
                                <span class="text-bold">ModelCode</span>
                            </span>
                        </span>
                    </span>
                </option>
            </select>
            <span id="loader2" style="visibility:hidden"></span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_right_5">
                    <select name="price_from" id="price_from" class="form-control">
                        <option value>Price From</option>
                        <option value="500">500 USD</option>
                        <option value="1000">1,000 USD</option>
                        <option value="2000">2,000 USD</option>
                        <option value="3000">3,000 USD</option>
                        <option value="5000">5,000 USD</option>
                        <option value="10000">10,000 USD</option>
                        <option value="20000">Above 20,000 USD</option>

                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_left_5">
                    <select name="price_to" id="price_to" class="form-control">
                        <option value>Price To</option>
                        <option value="500">Under 500 USD</option>
                        <option value="1000">1,000 USD</option>
                        <option value="2000">2,000 USD</option>
                        <option value="3000">3,000 USD</option>
                        <option value="5000">5,000 USD</option>
                        <option value="10000">10,000 USD</option>
                        <option value="20000">20,000 USD</option>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_right_5">
                    <select name="reg_form_year" class="form-control">
                        <span class="text-bold">Year </span>
                        </span>
                        <option value>Reg.

                            <span class="text-bold"><span class="text-bold">Year </span>
                            </span>
                            From
                        </option>
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
                    <select name="reg_to_year" id="reg_month_from_search" class="form-control">
                        <option value>Reg.

                            <span class="text-bold"><span class="text-bold">Year </span>
                            </span>
                            To
                        </option>
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
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_right_5">
                    <select name="reg_form_month" class="form-control">
                        <span class="text-bold">Month </span>
                        </span>
                        <option value>Reg.

                            <span class="text-bold"><span class="text-bold">Month </span>
                            </span>
                            From
                        </option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_left_5">
                    <select name="reg_to_month" id="reg_month_from_search" class="form-control">
                        <option value>Reg.

                            <span class="text-bold"><span class="text-bold">Month </span>
                            </span>
                            To
                        </option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor

                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_right_5">
                    <select name="millage_from" id="mileage_from" class="form-control">
                        <option value>Millage From</option>
                        <option value="20001">20001</option>
                        <option value="40001">40001</option>
                        <option value="60001">60001</option>
                        <option value="80001">80001</option>
                        <option value="100001">100001</option>
                        <option value="120001">120001</option>
                        <option value="140001">140001</option>
                        <option value="160001">160001</option>
                        <option value="180001">180001</option>
                        <option value="200001">200001</option>
                        <option value="220001">220001</option>
                        <option value="240001">240001</option>
                        <option value="260001">260001</option>
                        <option value="280001">280001</option>
                        <option value="300001">300001</option>

                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_left_5">
                    <select name="millage" id="mileage_to" class="form-control">
                        <option value>Mileage To</option>
                        <option value="20000">20000</option>
                        <option value="40000">40000</option>
                        <option value="60000">60000</option>
                        <option value="80000">80000</option>
                        <option value="100000">100000</option>
                        <option value="120000">120000</option>
                        <option value="140000">140000</option>
                        <option value="160000">160000</option>
                        <option value="180000">180000</option>
                        <option value="200000">200000</option>
                        <option value="220000">220000</option>
                        <option value="240000">240000</option>
                        <option value="260000">260000</option>
                        <option value="280000">280000</option>
                        <option value="300000">300000</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select name="engine" id="engine_cc" class="form-control">
                <option value>Select Engine CC</option>
                <option value="0^1000">0cc ~ 1000cc</option>
                <option value="0^2000">0cc ~ 2000cc</option>
                <option value="0^2600">0cc ~ 2600cc</option>
                <option value="1001^1500">1001cc ~ 1500cc</option>
                <option value="1501^2000">1501cc ~ 2000cc</option>
                <option value="2000">Above 2000CC</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select name="fuel_type" id="fuel" class="form-control">
                <option value>Select Fuel Type</option>
                @foreach ($fuel_types as $fuel_type)
                    <option value="{{ $fuel_type->id }}">{{ $fuel_type->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select name="transmission" id="transmission" class="form-control">
                <option value>Select Transmission</option>
                @foreach ($trans_missions as $trans_mission)
                    <option value="{{ $trans_mission->id }}">{{ $trans_mission->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4  margin_bottom_10">
            <select name="stearing" id="drive" class="form-control">
                <option value>Select Steering</option>
                <option value="0">Left Hand</option>
                <option value="1">Right Hand</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 margin_bottom_10">
            <select id="color" name="ext_color" class="form-control">
                <option value>Select Color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                @endforeach


            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <input type="checkbox" name="clearance" id="clearance" value="1" />&nbsp;<label for="clearance"
                class="pointer">Clearance</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="discount_stock" id="discount_stock" value="1" />&nbsp;<label
                for="discount_stock" class="pointer">Best Offers</label>
            <input type="checkbox" name="sold_out" id="sold_out" value="1" checked />&nbsp;<label
                for="discount_stock" class="pointer">Sold Out</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 margin_bottom_10">
            <input type="text" id="keyword" name="keyword" value class="form-control"
                placeholder="Search by Keywords" />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 margin_bottom_10">
            <input type="submit" name="Search" value="Search" class="btn btn-default">&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Reset" class="btn btn-default">
        </div>
    </div>
</form>
