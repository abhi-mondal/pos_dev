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

    .generate {
        margin-top: -30px;
        margin-left: 378px;
        position: absolute;
        background-color: #18d26b;
        border-color: #18d26b;
        color: white;
        border-radius: 20px;
        font-weight: 500;
    }

    /*input[type="tel"]::placeholder {
        
      }*/
    /* #delivery_man_password{
         text-align: left;
      }*/
</style>
<div class="content-wrapper" style="margin-right: 0px !important">
    <div class="container">

        <!--Add kitchen section-->
      @if(empty($fetchData))
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Chef.....</h3>
                        </div>
                        <div class="box-body">
                            <div class="box">
                                <div class="box-body wizard-content">

                                    <form action="{{route('admin::save_chef')}}" class="tab-wizard vertical wizard-circle" name="myForm"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <section>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_name" class="form-label">Name :
                                                        </label>
                                                        <input type="text" class="form-control" name="chef_name"
                                                            id="chef_name" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_email" class="form-label">Email :
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="chef_email" id="chef_email" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_password" class="form-label">Password
                                                            :</label>
                                                        <input type="password" name="chef_password"
                                                            class="form-control" id="chef_password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_phone" class="form-label">Phone Number
                                                            :
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="chef_phone" id="chef_phone" >
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Mode :</label>
                                                        <input name="mode" type="radio" id="radio_5" value="Active">
                                                        <label for="radio_5" class="d-block">Active</label>
                                                        <input name="mode" type="radio" id="radio_6" value="Inactive"
                                                            checked="checked">
                                                        <label for="radio_6">InActive</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-top: 10px;margin-left: 11px;">
                                                        <input type="submit" id="button" name="submit"
                                                            style="color:white;" value="Save Chef Info +"
                                                            class="btn btn-success">
                                                    </div>
                                                </div>


                                            </div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- edit kitchen section -->
      @else
      <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Chef.....</h3>
                        </div>
                        <div class="box-body">
                            <div class="box">
                                <div class="box-body wizard-content">

                                    <form action="{{route('admin::update_chef',$fetchData->res_access_token)}}" class="tab-wizard vertical wizard-circle" name="myForm"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <section>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_name" class="form-label">Name :
                                                        </label>
                                                        <input type="text" class="form-control" name="chef_name"
                                                            id="chef_name" value="{{$fetchData->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_email" class="form-label">Email :
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="chef_email" id="chef_email" value="{{$fetchData->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_password" class="form-label">Password
                                                            :</label>
                                                        <input type="password" name="chef_password"
                                                            class="form-control" id="chef_password" value="{{$fetchData->name}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="chef_phone" class="form-label">Phone Number
                                                            :
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="chef_phone" id="chef_phone" value="{{$fetchData->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Mode :</label>
                                                        <input name="mode" type="radio" id="radio_5" value="Active" <?php if($fetchData->status=='Active'){echo "checked";} ?>>
                                                        <label for="radio_5" class="d-block">Active</label>
                                                        <input name="mode" type="radio" id="radio_6" value="Inactive" <?php if($fetchData->status=='Inactive'){echo "checked";} ?>>
                                                        <label for="radio_6">InActive</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-top: 10px;margin-left: 11px;">
                                                        <input type="submit" id="button" name="submit"
                                                            style="color:white;" value="Save Chef Info +"
                                                            class="btn btn-success">
                                                    </div>
                                                </div>


                                            </div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      @endif
    </div>
</div>


<!--script section start-->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>

    $(document).ready(function () {
        toastr.options.timeOut = 10000;
        @if (Session:: has('empty_msg'))
    		toastr.error('{{ Session::get('empty_msg') }}');
    	@elseif(Session:: has('email_msg'))
    		toastr.error('{{ Session::get('email_msg') }}');
        @elseif(Session:: has('phone_msg'))
        	toastr.error('{{ Session::get('phone_msg') }}');
        @elseif(Session:: has('chef_save'))
        	toastr.success('{{ Session::get('chef_save') }}');
        @endif
   });
</script>

@endpush
<!--script section end-->
@endsection