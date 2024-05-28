@extends('backend.layouts.master')
@section('title', 'E-SHOP || grade Type Page')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">grade Type List</h6>
            <a href="{{ route('grade.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Fuel Type</a>
        </div>
        <div class="table-responsive">
            @if (count($inquires) > 0)
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name Prefix</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Drive Type</th>
                            <th>Mfg From Year</th>
                            <th>Mfg From To</th>
                            <th>Price From </th>
                            <th>Price To </th>
                            <th>Currency </th>
                            <th>Email Type </th>
                            <th>Created At </th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.N.</th>
                            <th>Name Prefix</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Drive Type</th>
                            <th>Mfg From Year</th>
                            <th>Mfg From To</th>
                            <th>Price From </th>
                            <th>Price To </th>
                            <th>Currency </th>
                            <th>Email Type </th>
                            <th>Created At </th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($inquires as $inquiry)
                            <tr>
                                <td>{{ $inquiry->id }}</td>
                                <td>{{ $inquiry->name_prefix }}</td>
                                <td>{{ $inquiry->name }}</td>
                                <td>{{ $inquiry->email }}</td>
                                <td>{{ $inquiry->country }}</td>
                                <td>{!! $inquiry->message !!}</td>
                                <td>{{ $inquiry->mfg_year_from }}</td>
                                <td>{{ $inquiry->mfg_year_to }}</td>
                                <td>{{ $inquiry->price_from }}</td>
                                <td>{{ $inquiry->price_to }}</td>
                                <td>{{ $inquiry->currency }}</td>
                                <td>{{ $inquiry->email_type }}</td>
                                <td>{{ $inquiry->created_at->format('Y-m-d H:i:s') }}</td>



                                {{-- Delete Modal --}}
                                {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                              <button engine="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                                @csrf
                                @method('delete')
                                <button engine="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center">No inquires found!!! Please create engine</h6>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        .zoom {
            transition: transform .2s;
            /* Animation */
        }

        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#banner-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4]
            }]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
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
