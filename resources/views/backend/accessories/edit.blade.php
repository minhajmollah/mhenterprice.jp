@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Accessory</h5>
    <div class="card-body">
      <form method="post" action="{{route('accessories.update',$accessory->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Comfort <span class="text-danger">*</span></label>
          <input id="comfort" type="text" name="comfort" placeholder="Enter title"  value="{{$accessory->comfort}}" class="form-control">
          @error('comfort')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Other feature <span class="text-danger">*</span></label>
          <input type="text" value="{{$accessory->other_feature}}" class="form-control" id="other_feature" name="other_feature">
          @error('other_feature')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="size">Product</label>
            <select name="product_id" class="form-control selectpicker"   data-live-search="true">
                <option value="">--Select Product </option>
                @foreach ( $products as $key=> $product )
                <option value="{{ $product->id }}" {{ $accessory->product->id==$product->id ? 'selected' :'' }}> {{ $product->title }}</option>
                @endforeach
            </select>
            </div>

        <div class="form-group">
            <label for="selling_point" class="col-form-label">Selling Point <span class="text-danger">*</span></label>
            <input type="text" value="{{$accessory->selling_point}}" class="form-control" id="selling_point" name="selling_point">
            @error('selling_point')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="safety_measure" class="col-form-label">Safety Measure  <span class="text-danger">*</span></label>
            <input type="text" value="{{$accessory->safety_measure}}" class="form-control" id="safety_measure" name="safety_measure">
            @error('selling_point')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="window_type" class="col-form-label">Window Type <span class="text-danger">*</span></label>
            <input type="text" value="{{$accessory->window_type}}" class="form-control" id="window_type" name="window_type">
            @error('window_type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="other_information" class="col-form-label">Other Information <span class="text-danger">*</span></label>
            <input type="text" value="{{$accessory->other_information}}" class="form-control" id="other_information" name="other_information">
            @error('other_information')
            <span class="text-danger">{{$message}}</span>
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
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');


    // $('select').selectpicker();

</script>

@endpush
