@extends('Admin.layout.adminlayout')
@section('title', 'Update Profile')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin::dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Update Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            @if(Session::has('flash_message_error'))
                                <div class="alert alert-error alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{!! session('flash_message_error') !!}</strong>
                                </div>
                            @endif
                            @if(Session::has('flash_message_success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{!! session('flash_message_success') !!}</strong>
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Update Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin::updatetProfile',['id' => $profile->id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                                            <label>Enter Your Full Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                                            <label>Enter Your Email ID</label>
                                            <input type="text" name="email" class="form-control" value="{{ $profile->email }}">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->has('phone')? 'has-error':'' }}">
                                            <label>Enter Your Phone Number</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}">
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Npw</button>
                                    <a href="{{ route('admin::dashboard') }}"><button type="button" class="btn btn-success">Back</button></a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection()
