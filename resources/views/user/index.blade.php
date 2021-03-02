@extends('layouts.app')
@push('styles')
<style>
    #users-table_wrapper{
        margin-top:32px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
@endpush
@section('title', 'User - Index')

@section('content')

@include('includes.breadcrumb',['data' => [
    'module_name' => 'User',
    'title' => 'User Listing',
    'url' => route('user.index'),
    'page' => 'User Listing'
    ]])

<section class="content">
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">User's Records</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table class="table table-bordered" id="users-table" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>status</th>
                    <th>role</th>
                    <th>actions</th>
                </tr>
            </thead>
        </table>

    </div>
</div>
</div>
</section>
    
@endsection

@push('scripts')

     <!-- DataTables -->
     
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>

        <script>
            $(function() {
                
            let oTable =  $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('user.datatable') !!}',
                    type: 'GET'
                },
                columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'status' },
                { data: 'role' },
                {data: "id" , render : function ( data, type, row, meta ) {
                return '<a href="user/'+data+'/edit"><i class="fas fa-edit"></i></a>';
            }},
         ]
            });


        });

        </script>

@endpush
