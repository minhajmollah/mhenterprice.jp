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
      <h6 class="m-0 font-weight-bold text-primary float-left">Backup lists</h6>
   
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="accessory-dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Backup File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Backup File Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($backupFiles as $index => $file)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ basename($file) }}</td>
                    <td>
                        <a href="{{ route('backups.download', ['file' => basename($file)]) }}" class="btn btn-primary btn-sm" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Download" data-placement="bottom"><i class="fas fa-download"></i></a>
                        <form method="POST" action="{{ route('backups.delete', ['file' => basename($file)]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm dltBtn" data-id={{ basename($file) }} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      </div>
    </div>
</div>
@endsection


