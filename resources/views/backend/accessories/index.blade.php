@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Accessories Lists</h6>
      <a href="{{route('accessories.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add accessories</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($accessories)>0)
        <table class="table table-bordered" id="accessory-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Accessory product Name</th>
              <th>Accessory product Photo</th>
              <th>Accessory product stock</th>
              <th>Comfort</th>
              <th>Other Feature</th>
              <th>Is Featured</th>
              <th>Selling Point</th>
              <th>window Type</th>
              <th>Other information</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>S.N.</th>
               <th>Accessory product Name</th>
              <th>Accessory product Photo</th>
              <th>Accessory product stock</th>
                <th>Comfort</th>
                <th>Other Feature</th>
                <th>Is Featured</th>
                <th>Selling Point</th>
                <th>window Type</th>
                <th>Other information</th>
                <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($accessories as $accessory)

                <tr>
                    <td>{{$accessory->id}}</td>
                    <td>{{$accessory->product?->title}}</td>

                    <td>

                        @if($accessory->product->photo)
                            @php
                              $photo=explode(',',$accessory->product?->photo);
                            //    dd($photo);
                            @endphp
                            <img src="{{$photo[0]}}" class="img-fluid zoom" style="max-width:80px" alt="{{$accessory->product->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>{{$accessory->product?->stock}}</td>
                    <td>{{$accessory->comfort}}</td>
                    <td>{{$accessory->other_feature}}

                    </td>
                    <td>{{$accessory->selling_point}}</td>

                    <td>{{$accessory->safety_measure}}</td>
                    <td>{{$accessory->window_type}}</td>
                    <td>{{$accessory->other_information}}</td>


                    <td>
                        <a href="{{route('accessories.edit',$accessory->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{route('accessories.destroy',[$accessory->id])}}">
                      @csrf
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$accessory->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$accessories->links()}}</span>
        @else
          <h6 class="text-center">No Accessories found!!! Please create Accessories</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>

      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#accessory-dataTable').DataTable( {

            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,10]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
