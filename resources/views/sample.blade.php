@extends('layouts.app')

@section('title','Sample - page')

@section('content')

@include('includes.breadcrumb',['data' => [
    'module_name' => 'Home',
    'title' => 'Dashboard',
    'url' => route('home'),
    'page' => 'Main'
]])

<div class="card card-default color-palette-box">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-glass-cheers"></i>
        Theme Integrated
      </h3>
    </div>
    <div class="card-body">
      <div class="col-12">
        <p>I am very thankful to my trainer and my colleagues specially my friend that I am able to integrate this theme.</p>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
    