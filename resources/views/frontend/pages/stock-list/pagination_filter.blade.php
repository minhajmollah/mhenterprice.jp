<div id="total_records_row">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12 padding_top_5 margin_bottom_10 line_height_28 mobile-center">
            Total : <span class="totalRecords bold">{{ $products->total() }}</span> [<span id="NowStocks"
                class="bold">{{ $products->firstItem() }}</span><strong>
                out of</strong> <span class="totalRecords bold">{{ $products->lastItem() }}</span>]
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-8 margin_bottom_10">
            <select class="form-control" id="sorting_combo">
                <option value="*">-- Sort By --</option>
                <option value="price_low_to_high">Price - Low to High &darr; </option>
                <option value="price_high_to_low">Price - High to Low &uarr;</option>
                <option value="year_high_to_low"><span class="text-bold"><span class="text-bold">Year </span>
                    </span> -
                    New to Old &darr;
                </option>
                <option value="year_low_to_high"><span class="text-bold"><span class="text-bold">Year </span>
                    </span> -
                    Old to New &uarr;
                </option>
                <option value="millage_low_to_high">Mileage - Low to High &darr;</option>
                <option value="millage_high_to_low">Mileage - High to Low &uarr; </option>
                <option value="a_to_z_model">A-Z - Model &darr;</option>
                <option value="z_to_a_model">Z-A - Model &uarr;</option>
                <option value="new_arrival">New Arrival &darr;</option>
            </select>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-4 margin_bottom_10">

            <select name="currency" id="currency_switch" class="form-control currency_switch">
                <option value="jpy">JPY</option>
                <option value="usd">USD</option>

            </select>
        </div>
    </div>

    <div class="clr"></div>
</div>

<div class="row">
    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-12 margin_bottom_10 mt-1">
        <div>Total Records: <strong class="totalRecords"> {{ $products->total() }}</strong></div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12 margin_bottom_10 text-center mt-1">
        {{ $products->render('custom-pagination') }}

    </div>
    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-12 margin_bottom_10 text-right">
        <div>
            Per Page:
            <select id="scrollData" class="form-control" style="display:inline-block; width:60px;">
                <option value="20" @if ($products->perPage() == 20) selected @endif>20</option>
                <option value="50" @if ($products->perPage() == 50) selected @endif>50</option>
                <option value="100" @if ($products->perPage() == 100) selected @endif>100</option>
            </select>
        </div>
    </div>
</div>
