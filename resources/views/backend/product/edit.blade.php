@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('product.update', $product?->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ $product?->title }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" id="model_code_div">
                    <label for="inputTitle" class="col-form-label">Model Code <span class="text-danger">*</span></label>
                    <input id="model_code" type="text" name="model_code" placeholder="Enter Model Code"
                        value="{{ $product?->model_code }}" class="form-control">
                    @error('model_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                {{-- {{$categories}} --}}

                <div class="form-group">
                    <label for="cat_id">Category <span class="text-danger">*</span></label>
                    <select name="cat_id" id="cat_id" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select any category--</option>
                        @foreach ($categories as $key => $cat_data)
                            <option value='{{ $cat_data?->id }}'
                                {{ $product?->cat_id == $cat_data?->id ? 'selected' : '' }}>
                                {{ $cat_data?->title }}</option>
                        @endforeach
                    </select>
                    @error('cat_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group d-none" id="child_cat_div">
                    <label for="child_cat_id">Sub Category</label>
                    <select name="child_cat_id" id="child_cat_id" class="form-control ">
                        <option value="">--Select any category--</option>
                        {{-- @foreach ($parent_cats as $key => $parent_cat)
                    <option value='{{$parent_cat?->id}}'>{{$parent_cat?->title}}</option>
                @endforeach --}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Price JPY <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price_jpy" placeholder="Enter price"
                        value="{{ $product->price_jpy }}" class="form-control">
                    @error('price_jpy')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Price USD <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price_usd" placeholder="Enter price Usd"
                        value="{{ $product->price_usd }}" class="form-control">
                    @error('price_usd')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="condition">Stearing <span class="text-danger">*</span></label>
                    <select name="steering" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select Steering--</option>
                        <option value="0" {{ $product?->steering == 0 ? 'selected' : '' }}>Right Hand</option>
                        <option value="1" {{ $product?->steering == 1 ? 'selected' : '' }}>Left Hand</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Chassis No <span class="text-danger">*</span></label>
                    <input id="chassis_no" type="text" name="chassis_no" placeholder="Enter Chassis Code"
                        value="{{ $product?->chassis_no }}" class="form-control">
                    @error('chassis_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discount" class="col-form-label">Seat <span class="text-danger">*</span></label>
                    <input id="seat" type="number" name="seat" placeholder="Enter Seat"
                        value="{{ $product?->seat }}" class="form-control">
                    @error('seat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discount" class="col-form-label">Door <span class="text-danger">*</span></label>
                    <input id="door" type="number" name="door" placeholder="Enter Door"
                        value="{{ $product?->door }}" class="form-control">
                    @error('door')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                class="btn btn-primary text-white">
                                <i class="fas fa-image"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo"
                            value="{{ $product->photo }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="cat_id">Types </label>
                    <select name="type_id" id="type_id" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select any Type--</option>
                        @foreach ($types as $key => $type_data)
                            <option value='{{ $type_data?->id }}'
                                {{ $product?->type?->id == $type_data?->id ? 'selected' : '' }}>{{ $type_data?->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Is Discount</label><br>
                    <input type="checkbox" id='is_discount' value="1"
                        {{ $product->is_discount == 1 ? 'checked' : '' }}> Yes
                    <input type="hidden" name="is_discount" value="{{ $product->is_discount }}" id="is_discounts">

                </div>

                @error('discount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group" id="discount_div">
                    <label for="discount" class="col-form-label">Discount(%) <span class="text-danger">*</span></label>
                    <input id="discount" type="number" name="discount" min="0" max="100"
                        placeholder="Enter discount" value="{{ $product->discount }}" class="form-control">

                </div>
                <div class="form-group">
                    <label for="reg_date_mounth" class="col-form-label">Registration Date </label>
                    <div class="row">

                        <div class="col-md-6">

                            <select name="reg_date_month" id="reg_date_month" class="form-control selectpicker"
                                data-live-search="true">
                                <option value=""> Select Month</option>
                                @for ($month = 1; $month <= 12; $month++)
                                    <option value="{{ $month }}"
                                        {{ $product?->reg_date_month == $month ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                                @endfor
                            </select>
                            @error('reg_date_month')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <select name="reg_date_year" id="expiration_year" class="form-control selectpicker"
                                data-live-search="true">
                                <option value=""> Select Year</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 1985;
                                @endphp

                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}"
                                        {{ $product?->reg_date_year == $year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                            @error('reg_date_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>




                </div>
                <div class="form-group">
                    <label for="reg_date_mounth" class="col-form-label">Menufecture Date </label>
                    <div class="row">

                        <div class="col-md-6">

                            <select name="mfg_date_month" id="mfg_date_month" class="form-control">
                                <option value="">Select month</option>
                                @for ($month = 1; $month <= 12; $month++)
                                    <option value="{{ $month }} "
                                        {{ $product?->mfg_date_month == $month ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                                @endfor
                            </select>
                            @error('mfg_date_month')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <select name="mfg_date_year" id="mfg_date_year" class="form-control">
                                <option value="">Select year</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 1985;
                                @endphp

                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}"
                                        {{ $product?->mfg_date_year == $year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                            @error('mfg_date_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>




                </div>
                <div class="form-group">
                    <label for="cat_id">Millage (KM) </label>
                    <input type="number" name="millage" id="millage_id" class="form-control "
                        value="{{ $product->millage }}">

                    @error('millage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Engine Type </label>
                    <select name="engine_id" id="engine_id" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select any Engine--</option>
                        @foreach ($engines as $key => $engine)
                            <option value='{{ $engine?->id }}'
                                {{ $product?->engine?->id == $engine?->id ? 'selected' : '' }}>{{ $engine?->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('engine_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Fuel Type </label>
                    <select name="fuel_id" id="fuel_id" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select any Fuel Type--</option>
                        @foreach ($fuel_types as $key => $fuel_type)
                            <option value='{{ $fuel_type?->id }}'
                                {{ $product?->fuel_type?->id == $fuel_type?->id ? 'selected' : '' }}>
                                {{ $fuel_type?->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('fuel_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Expired Date </label>
                    <input id="point" type="date" name="expired_date" placeholder="Enter Point"
                        value="{{ $product->expired_date }}" class="form-control">
                    @error('expired_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Point </label>
                    <input id="point" type="text" name="point" placeholder="Enter Point"
                        value="{{ $product->point }}" class="form-control">
                    @error('point')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Grade </label>
                    <input id="point" type="text" name="grade" placeholder="Enter Grade"
                        value="{{ old('grade') }}" class="form-control">
                    @error('grade')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Color </label>
                    <select name="color_id" id="color_id" class="form-control selectpicker" data-live-search="true">
                        <option value="">--Select any Color--</option>
                        @foreach ($colors as $key => $color)
                            <option value='{{ $color?->id }}'
                                {{ $product?->color?->id == $color?->id ? 'selected' : '' }}>{{ $color?->title }}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cat_id">Trans Mission </label>
                    <select name="transmission_id" id="transmission_id" class="form-control selectpicker"
                        data-live-search="true">
                        <option value="">--Select any TransMission--</option>
                        @foreach ($trans_missions as $key => $trans_mission)
                            <option value='{{ $trans_mission?->id }}'
                                {{ $product?->trans_mission?->id == $trans_mission?->id ? 'selected' : '' }}>
                                {{ $trans_mission?->title }}</option>
                        @endforeach
                    </select>
                    @error('transmission_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="init_condition">Internal Condition</label>
                    <input id="init_condition" type="text" name="init_condition"
                        placeholder="Enter Internal Condition" value="{{ $product->init_condition }}"
                        class="form-control">
                    @error('init_condition')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exit_condition">External Condition</label>
                    <input id="exit_condition" type="text" name="exit_condition"
                        placeholder="Enter External Condition" value="{{ $product->exit_condition }}"
                        class="form-control">
                    @error('exit_condition')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="dimension">2WD/4WD</label>
                    <select name="dimension" class="form-control">
                        <option value="default">--Select 2WD/4WD--</option>
                        <option value="2wd" {{ $product?->exit_condition == '2wd' ? 'selected' : '' }}>2WD </option>
                        <option value="4wd" {{ $product?->exit_condition == '4wd' ? 'selected' : '' }}>4WD</option>

                    </select>
                </div>



                <div class="form-group">
                    <label for="is_best_offer">Is Best Offer</label><br>
                    <input type="checkbox" id='is_best_offer' value='{{ $product->is_clearance }}'
                        {{ $product->is_best_offer == 1 ? 'checked' : '' }}> Yes
                    <input type="hidden" name="is_best_offer" id="is_best_offers"
                        value="{{ $product->is_best_offer }}">
                </div>
                <div class="form-group">
                    <label for="is_clearance">Is clearance</label><br>
                    <input type="checkbox" id='is_clearance' value='{{ $product->is_clearance }}'
                        {{ $product->is_clearance == 1 ? 'checked' : '' }}> Yes
                    <input type="hidden" name="is_clearance" id="is_clearances" value="{{ $product->is_clearance }}">
                </div>
                <div class="form-group">
                    <label for="sold out"> Sold Out</label><br>
                    <input type="checkbox" id='sold_outs' value='{{ $product->sold_out }}'
                        {{ $product->sold_out == 1 ? 'checked' : '' }}> Yes
                    <input type="hidden" name="sold_out" id="sold_out" value="{{ $product->sold_out }}">

                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Accessory</h2>
                    </div>

                    <div class="card-body">
                        <!-- Accessory info -->
                        <div id="accessory_fields">
                            @foreach ($product->accessories as $accessory)
                                <div class="accessory_field">
                                    @foreach (['other_feature', 'comfort', 'selling_point', 'safety_measure', 'window_type', 'sound_system', 'other_information'] as $field)
                                        <div class="form-group">
                                            <label for="{{ $field }}"
                                                class="col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                            <input type="text" value="{{ $accessory->$field }}" class="form-control"
                                                name="{{ $field }}[]">
                                        </div>
                                    @endforeach
                                    <button type="button"
                                        class="btn btn-sm btn-danger remove_accessory mt-3">Remove</button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-sm btn-success mt-3" id="add_accessory">Add More
                            Accessory</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
        $(document).ready(function() {

            $("#is_clearance").click(function() {
                if ($(this).is(':checked')) {
                    $("#is_clearances").val(1)
                } else {
                    $("#is_clearances").val(0)
                }
            })
            $("#sold_outs").click(function() {
                if ($(this).is(':checked')) {
                    $("#sold_out").val(1)
                } else {
                    $("#sold_out").val(0)
                }
            })
            $("#is_best_offer").click(function() {
                if ($(this).is(':checked')) {
                    $('#is_best_offers').val(1)
                } else {
                    $('#is_best_offers').val(0)
                }
            })
            $("#is_discount").click(function() {
                if ($(this).is(':checked')) {
                    $('#is_discounts').val(1)
                } else {
                    $('#is_discounts').val(0)
                }
            })




            if ($('#is_discount').is(':checked')) {
                $('#discount_div').show();
            } else {
                $("#discount").val('');
                $('#discount_div').hide();
            }
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
        // $('select').selectpicker();


        $('#discount_div').hide()
        $('#is_discount').change(function() {
            var is_checked = $('#is_discount').prop('checked');
            // alert(is_checked);
            if (is_checked) {
                $('#discount_div').show();


            } else {
                $("#discount").val('');
                $('#discount_div').hide()


            }
        })
    </script>

    <script>
        var child_cat_id = '{{ $product->child_cat_id }}';


        $('#cat_id').change(function() {

            var cat_id = $(this).val();

            // alert(cat_id);
            if (cat_id != null) {
                // Ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function(response) {

                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        // console.log(response);
                        var html_option = "<option value=''>----Select sub category----</option>"
                        if (response.status) {
                            var data = response.data;
                            // alert(data);
                            if (response.data) {

                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function(id, title, model_code) {

                                    html_option += "<option value='" + id + "' data-id='" +
                                        title.model_code + "' selected>" + title.title +
                                        "</option>"
                                });
                            } else {}
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {}
        })
        if (child_cat_id != null) {
            $('#cat_id').change();

        }

        $("#child_cat_id").change(function() {
            let selectedOption = $(this).find('option:selected');

            // Get the value of the data-id attribute
            let model_code = selectedOption.data('id');


            $("#chassis_no").attr('placeholder', 'Please Write your Complete Chassis no: ' + model_code + '- ')
        })
    </script>
    <script>
        $(document).ready(function() {
            // Add more accessory fields
            $("#add_accessory").click(function() {
                var accessory_field = '<div class="accessory_field">' +
                    '<div class="form-group">' +
                    '<label for="summary" class="col-form-label">Other feature </label>' +
                    '<input type="text" class="form-control" name="other_feature[]">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="selling_point" class="col-form-label">Selling Point </label>' +
                    '<input type="text" class="form-control" name="selling_point[]">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="safety_measure" class="col-form-label">Safety Measure </label>' +
                    '<input type="text" class="form-control" name="safety_measure[]">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="window_type" class="col-form-label">Window Type</label>' +
                    '<input type="text" class="form-control" name="window_type[]">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="sound_system" class="col-form-label">Sound System</label>' +
                    '<input type="text" class="form-control" name="sound_system[]">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="other_information" class="col-form-label">Other Information </label>' +
                    '<input type="text" class="form-control" name="other_information[]">' +
                    '</div>' +
                    '<button type="button" class="btn btn-sm btn-danger remove_accessory mt-3">Remove</button>' +
                    '</div>';

                $("#accessory_fields").append(accessory_field);
            });

            // Remove accessory field
            $("#accessory_fields").on('click', '.remove_accessory', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endpush
