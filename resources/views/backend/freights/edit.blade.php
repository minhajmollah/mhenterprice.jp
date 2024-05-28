@extends('backend.layouts.master')
@section('title', 'E-SHOP || Freight Edit')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Freight</h5>
        <div class="card-body">
            <form method="post" action="{{ route('freights.update', $freight->id) }}">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="form-group">
                    <label for="inputCountry" class="col-form-label">Country <span class="text-danger">*</span></label>
                    <!-- Assuming you have a relationship with the Country model -->
                    <select id="inputCountry" name="country_id" class="form-control">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $freight->id == $country->id ? 'selected' : ' ' }}>
                                {{ $country->name }}</option>
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
                        value="{{ $freight->port }}" class="form-control">
                    @error('port')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">
                        Continent <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="continent" placeholder="Enter title"
                        value="{{ $freight->continent }}" class="form-control">
                    @error('port')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputShipTime" class="col-form-label">Ship Time <span class="text-danger">*</span></label>
                    <select name="ship_time[]" class="form-control autocomplete selectpicker" data-live-search="true"
                        multiple data-max-options="2">
                        @foreach ($freight->ship_time as $time)
                            <option value="{{ $time }}" selected>{{ $time }}</option>
                        @endforeach
                    </select>
                    <!-- You can add more ship time fields if needed -->
                    @error('ship_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputShipTime" class="col-form-label">Frequency <span class="text-danger">*</span></label>
                    <select name="frequency[]" class="form-control autocomplete selectpicker" data-live-search="true"
                        multiple>
                        @foreach ($freight->frequency as $frequency)
                            <option value="{{ $frequency }}" selected>{{ $frequency }}</option>
                        @endforeach
                    </select>
                    <!-- You can add more ship time fields if needed -->
                    @error('frequency')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="inputShipTime" class="col-form-label">Volume Range <span
                            class="text-danger">*</span></label>
                    <select name="volume_range[]" class="form-control autocomplete selectpicker" data-live-search="true"
                        multiple>
                        @foreach ($freight->volume_range as $volume_range)
                            <option value="{{ $volume_range }}" selected>{{ $volume_range }}</option>
                        @endforeach
                    </select>
                    <!-- You can add more ship time fields if needed -->
                    @error('volume_range')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputShipTime" class="col-form-label"> Container Rate <span
                            class="text-danger">*</span></label>
                    <select name="container_rate[]" class="form-control autocomplete selectpicker" data-live-search="true"
                        multiple>
                        @foreach ($freight->container_rate as $container_rate)
                            <option value="{{ $container_rate }}" selected>{{ $container_rate }}</option>
                        @endforeach
                    </select>
                    <!-- You can add more ship time fields if needed -->
                    @error('container_rate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">

                    <button class="btn btn-success" type="submit">Update</button>
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
