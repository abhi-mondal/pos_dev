@extends('Admin.layout.adminlayout')
@section('title', 'Change Password')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin::dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Change Password</li>
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
                                <h3 class="card-title">Change Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('admin::change_pass') }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('old_pass') ? 'has-error' : '' }}">
                                        <label for="exampleInputEmail1">Current Password</label>
                                        <input id="old_pass" type="password" class="form-control" name="old_pass" >
                                        <span class="text-danger">{{ $errors->first('old_pass') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input id="new_pass" type="password" class="form-control" name="new_pass" >
                                        <span class="text-danger">{{ $errors->first('new_pass') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm New Password</label>
                                        <input id="confirm_pass" type="password" class="form-control" name="confirm_pass" >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
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
