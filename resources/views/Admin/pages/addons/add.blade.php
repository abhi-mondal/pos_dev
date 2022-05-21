@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')
@section('content')

    <style>
        @media (min-width: 1200px) {
            .d-xl-inline-block {
                /* float: revert; */
                margin-left: 59px !important;
                display: flex;
                display: none !important;
            }

            .main-header {
                margin-right: 0px !important;
            }


        }

    </style>
    <style>
        body {
            margin: 0px;
            height: 100vh;
            //background: #1283da;
        }

        .center {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .form-input {
            width: 350px;
            padding: 20px;
            background: #fff;
            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                3px 3px 7px rgba(94, 104, 121, 0.377);
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .form-input input {
            display: none;

        }

        .form-input label {
            display: block;
            width: 45%;
            height: 45px;
            margin-left: 25%;
            line-height: 50px;
            text-align: center;
            background: #1172c2;

            color: #fff;
            font-size: 15px;
            font-family: "Open Sans", sans-serif;
            text-transform: Uppercase;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-input img {
            width: 100%;
            display: none;

            margin-bottom: 30px;
        }

    </style>
    <div class="content-wrapper" style="margin-right: 0px !important">
        <div class="container">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center ">
                    @if (Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block" style="background-color: crimson;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                    @endif
                    @if (Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="box">

                                    <!-- /.box-header -->
                                    @if (empty($data))
                                        <div class="box-body">
                                            <form role="form" method="POST" action="{{ route('admin::save_addon') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!-- text input -->
                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                        <label class="form-label" for="inputSuccess">Enter Addons
                                                            Name:</label>
                                                        <input type="text" class="form-control" required name="name"
                                                            id="inputSuccess" placeholder="Enter ...">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                        <label class="form-label" for="inputSuccess">Enter Price
                                                            Price:</label>
                                                        <input type="number" class="form-control" name="price"
                                                            autocomplete="off" id="inputSuccess" placeholder="Enter ..."
                                                            required>

                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label class="form-label" for="inputSuccess"> Upload Addons
                                                        Image</label>
                                                    <div class="form-input">
                                                        <div class="preview">
                                                            <img id="file-ip-1-preview">
                                                        </div>
                                                        <label for="file-ip-1">Upload Image</label>
                                                        <input type="file" id="file-ip-1" name="image" accept="image/*"
                                                            onchange="showPreview(event);">

                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    function showPreview(event) {
                                                        if (event.target.files.length > 0) {
                                                            var src = URL.createObjectURL(event.target.files[0]);
                                                            var preview = document.getElementById("file-ip-1-preview");
                                                            preview.src = src;
                                                            preview.style.display = "block";
                                                        }
                                                    }
                                                </script>

                                        </div>
                                        <div class="form-group"
                                            style="position: absolute;margin-left: 600px;margin-top: 46px;">
                                            <div class="radio">
                                                <input name="status" type="radio" id="Option_1" value='1' checked>
                                                <label for="Option_1">Active Now</label>
                                            </div>
                                            <div class="radio">
                                                <input name="status" type="radio" id="Option_2" value='0'>
                                                <label for="Option_2">Active Later</label>
                                                <BR>
                                                <BR>

                                                <input type="submit" name="submit" value="Save changes"
                                                    class="btn btn-success" style="margin-bottom: 20px;">

                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                    @if (!empty($data))
                                        <div class="box-body">
                                            <form role="form" method="POST" action="{{ route('admin::save_addon') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!-- text input -->


                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                        <label class="form-label" for="inputSuccess">Enter Addons
                                                            Name:</label>
                                                        <input type="text" value="{{ $data->name }}" class="
                                                            form-control" required name="name" id="inputSuccess"
                                                            placeholder="Enter ...">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                        <label class="form-label" for="inputSuccess">Enter Price
                                                            Price:</label>
                                                        <input type="number" value="{{ $data->price }}" class="
                                                            form-control" name="price" autocomplete="off"
                                                            id="inputSuccess" placeholder="Enter ..." required>
                                                        <input type="hidden" name="id" value="{{ $data->activity_key }}">

                                                    </div>
                                                </div>





                                                <div class="form-group has-success">
                                                    <label class="form-label" for="inputSuccess"> Upload Category
                                                        Image</label>
                                                    <div class="form-input">
                                                        <div class="preview">
                                                            <img id="file-ip-1-preview">
                                                        </div>
                                                        <label for="file-ip-1">Upload Image</label>
                                                        <input type="file" id="file-ip-1" name="image" accept="image/*"
                                                            onchange="showPreview(event);">

                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    function showPreview(event) {
                                                        if (event.target.files.length > 0) {
                                                            var src = URL.createObjectURL(event.target.files[0]);
                                                            var preview = document.getElementById("file-ip-1-preview");
                                                            preview.src = src;
                                                            preview.style.display = "block";
                                                        }
                                                    }
                                                </script>
                                        </div>




                                        <!-- radio -->
                                        <div class="form-group"
                                            style="position: absolute;margin-left: 600px;margin-top: 100px;">
                                            <div class="radio">
                                                <input name="status" type="radio" id="Option_1" <?php if ($data->status == 1) {
    echo 'checked';
} ?>
                                                    value='1'>
                                                <label for="Option_1">Active Now</label>
                                            </div>
                                            <div class="radio">
                                                <input name="status" type="radio" id="Option_2" value='0'
                                                    <?php if ($data->status == 0) {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="Option_2">Active Later</label>
                                                <BR>
                                                <BR>

                                                <input type="submit" name="submit" value="Save changes"
                                                    class="btn btn-success" style="margin-bottom: 20px;">

                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                    <!-- select -->

                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




                <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
    </div>
    <!-- Content Wrapper. Contains page content -->

@endsection
