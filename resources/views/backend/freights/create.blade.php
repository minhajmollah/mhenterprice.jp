@extends('backend.layouts.master')
@section('title', 'E-SHOP || Freight Create')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Add Freight</h5>
        <div class="card-body">
            <form method="post" action="{{ route('freights.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputCountry" class="col-form-label ">Country <span class="text-danger">*</span></label>
                    <!-- Assuming you have a relationship with the Country model -->
                    <select id="inputCountry" name="country_id" class="form-control autocomplete selectpicker"
                        data-live-search="true">

                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">
                        Port <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="port" placeholder="Enter title"
                        value="{{ old('port') }}" class="form-control">
                    @error('port')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">
                        Continent <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="continent" placeholder="Enter title"
                        value="{{ old('port') }}" class="form-control">
                    @error('port')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="inputShipTime" class="col-form-label">Shipment Time <span
                                class="text-danger">*</span></label>

                        <select name="ship_time[]" class="form-control autocomplete selectpicker" data-live-search="true"
                            multiple>
                            <option value="default">--Select Shipment Time --</option>

                        </select>
                        <!-- You can add more ship time fields if needed -->
                        @error('ship_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputFrequency" class="col-form-label">Frequency <span
                                class="text-danger">*</span></label>

                        <select name="frequency[]" class="form-control autocomplete selectpicker" data-live-search="true"
                            multiple>
                            <option value="default">--Select Frequency --</option>

                        </select>
                        <!-- You can add more frequency fields if needed -->
                        @error('frequency')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    </select>
                    <div class="form-group">
                        <label for="inputVolumeRange" class="col-form-label">Volume Range('0-14 m3 -0-14 m3') <span
                                class="text-danger">*</span></label>

                        <select name="volume_range[]" class="form-control autocomplete selectpicker" data-live-search="true"
                            multiple>
                            <option value="default">--Select Volume Range --</option>

                        </select>
                        <!-- You can add more volume range fields if needed -->
                        @error('volume_range')
                            <span class="text-danger">{{ $message[0] }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="container_rate" class="col-form-label">Container Rate <span
                                class="text-danger">*</span></label>

                        <select name="container_rate[]" class="form-control autocomplete selectpicker"
                            data-live-search="true" multiple>
                            <option value="default">--Select Container Rate--</option>

                        </select>
                        <!-- You can add more volume range fields if needed -->
                        @error('container_rate')
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('.autocomplete').select2({
                tags: true,
                maximumSelectionLength: 2,
                tokenSeparators: [',',
                ' '], // Allows users to add multiple tags by separating them with commas or spaces
            });


        });
    </script>
@endpush
