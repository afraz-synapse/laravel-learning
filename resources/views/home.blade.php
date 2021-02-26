
@extends('layouts.app')

@section('title','Home - Page')

@section('content')

@include('includes.breadcrumb',['data' => [
    'module_name' => 'Home',
    'title' => 'Dashboard',
    'url' => route('home'),
    'page' => 'Main'
]])

<div class="card card-default color-palette-box">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-glass-cheers"></i>
        Welcome <strong>{{ucfirst(Auth::user()->name)}}</strong> !
      </h3>
    </div>
    <div class="card-body">
      <div class="col-12">
        <p>You are logged in!</p>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
    
