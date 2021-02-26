<?php 
    $userImage  = $user->image ? "/storage/".$user->image.'?time='.time() : 'theme/dist/img/user2-160x160.jpg';
?>

@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    {{-- {{dd($errors)}} --}}
    @include('includes.breadcrumb',['data' => [
    'module_name' => 'Home',
    'title' => 'Profile',
    'url' => route('home'),
    'page' => 'User Profile'
    ]])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset( $userImage) }}"
                                        alt="User profile picture"
                                        id="profile-image-placeholder">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name ?? null }}</h3>


                                <div class="input-group mb-3">
                                    <input type="file" class="btn btn-primary btn-block" name="image"
                                        id="exampleInputFile" onchange="readImage(this,'profile-image-placeholder')">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                        

               
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#details"
                                            data-toggle="tab">Details</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">



                                        <div class="input-group mb-3">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                    
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                name="password" autocomplete="new-password" placeholder="Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                    
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                             autocomplete="new-password" placeholder="Confirm Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                    
                                            <!-- /.col -->
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                            <div class="col-2">
                                                <button type="reset" class="btn btn-info btn-block" onclick="$('#profile-image-placeholder')
                                                .attr('src', '{{$userImage}}')">Reset</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    




                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
<script src="{{ asset('js/handle-image-placeholders.js') }}"></script>
@endpush
