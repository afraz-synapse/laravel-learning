@extends('layouts.app')
@push('styles')
<style>
    #users-table_wrapper{
        margin-top:32px;
    }
</style>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush
@section('title', 'User - Index')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">User's Records</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table class="table table-bordered" id="users-table" >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
        </table>

    </div>
</div>
    
@endsection

@push('scripts')

     <!-- DataTables -->
     <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>

        <script>
            $(function() {
                
            let oTable =  $('#users-table').DataTable({
                "serverSide": true,
                ajax: {
                    url: '{!! route('user.datatable') !!}',
                    type: 'GET'
                }
            });


            $('#user-filter-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });

        });

        </script>

@endpush
