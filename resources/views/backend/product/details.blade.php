@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header">

            <h1>Product Details- {{ $product->title }}</h1>
        </div>
        <div class="card-body">



            <div class="row">

                <div class="col-md-6">
                    <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
                        @php
                            $data = [
                                'ID' => $product?->id,
                                'Title' => $product?->title,
                                'Category' => $product?->cat_info?->title,
                                'Sub Category' => $product?->sub_cat_info?->title ?? '',
                                'Price JPY' => $product?->price_jpy,
                                'Price USD' => $product?->price_usd,
                                'Stock' => $product?->stock > 0 ? '<span class="badge badge-primary">' . $product?->stock . '</span>' : '<span class="badge badge-danger">' . $product?->stock . '</span>',
                                'Photo' => $product?->photo ? '<img src="' . explode(',', $product?->photo)[0] . '" class="img-fluid zoom" style="max-width:80px" alt="' . $product?->photo . '">' : '<img src="' . asset('backend/img/thumbnail-default.jpg') . '" class="img-fluid" style="max-width:80px" alt="avatar.png">',
                                'Stock Code' => $product?->stock_code,
                                'Discount Available' => $product?->is_discount == 1 ? 'Yes' : 'No',
                                'Discount Percentage' => $product?->discount . '% OFF',
                                'Exit Condition' => $product?->exit_condition,
                                'Initial Condition' => $product?->init_condition,
                                'Chassis No' => $product?->chassis_no,
                                'Dimension' => $product?->dimension,
                                'Steering' => $product?->steering == 1 ? 'Left Hand' : 'Right Hand',
                                'Registration Date' => $product?->reg_date_month . ' / ' . $product?->reg_date_year,
                                'Clearance Available' => $product?->is_clearance == 1 ? 'Yes' : 'No',
                                'Best Offer Available' => $product?->is_best_offer == 1 ? 'Yes' : 'No',
                                'Sold Out ' => $product?->sold_out == 1 ? 'Yes' : 'No',
                                'Status' => $product?->status == 'active' ? '<span class="badge badge-success">' . $product?->status . '</span>' : '<span class="badge badge-warning">' . $product?->status . '</span>',
                            ];
                        @endphp

                        @foreach ($data as $label => $value)
                            <tr>
                                <th>{{ $label }}</th>
                                <td>{!! $value !!}</td>
                            </tr>
                        @endforeach


                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">

                        @php
                            $data = [
                                'Millage' => $product?->millage,
                                'Engine' => $product?->engine?->title,
                                'Type' => $product?->type?->title,
                                'Point' => $product?->point,
                                'Grade' => $product?->garde,
                                'Fuel Type' => $product?->fuel_type?->title,
                                'Colour' => $product?->color?->title,
                                'TransMission' => $product?->transmission?->title,
                            ];
                        @endphp

                        @foreach ($data as $label => $value)
                            <tr>
                                <th>{{ $label }}</th>
                                <td>{!! $value !!}</td>
                            </tr>
                        @endforeach


                    </table>
                    <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">




                        <tr>
                            <th>Product all Image</th>

                        </tr>
                        <tr>
                            @php
                                $pic = explode(',', $product->photo);
                            @endphp

                            @foreach ($pic as $photo)
                                <td>
                                    <img src="{{ asset($photo) }}" alt="" height="150px" width="100px">

                                </td>
                            @endforeach
                        </tr>



                    </table>
                </div>
                <div class="col-md-12">
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
                        <h2>Other Options :</h2>
                        @foreach ($product->accessories as $accessory)
                            <li>

                                {{ $accessory->other_information }}

                            </li>
                        @endforeach
                    </div>
                    <div class="clr"></div>
                </div>
            @endif
        </div>
                </div>
            </div>


        </div>
    </div>
@endsection
