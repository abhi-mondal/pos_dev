@extends('super_admin.layouts.layouts')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>-->
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cupon</a></li>
                        <li class="breadcrumb-item active">Add Cupon</li>
                    </ol>
                </div>
                <h4 class="page-title">Cupon </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if(empty($fetch_cupon->cupon_activity_key))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add New Cupon</h4>
                    <p class="text-muted font-14"></p>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <form action="{{route('superadmin::save_cupon')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="cupon-name" class="form-label">Cupon Name &nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <input type="text" id="cupon-name" name="cupon_name" class="form-control" value="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cupon-code" class="form-label">Cupon Code&nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <input type="text" id="cupon-code" name="cupon_code" class="form-control" placeholder="Cupon Code" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cupon-amount" class="form-label">Cupon Amount &nbsp;<span style="color: red;margin-left: -4px;" require>*</span></label>
                                            <input type="text" id="cupon-amount" name="cupon_amount" class="form-control" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Minimum Purchase Amount</label>
                                            <input data-toggle="touchspin" type="number" data-bts-max="1000" name="cupon_min_purchase_amount" value="">
                                        </div>

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Discount Type &nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <select class="form-select" id="example-select" name="cupon_discount_type">
                                               <option selected="true" disabled="disabled">Select Discount type</option>
                                                <option value="flat">Flat</option>
                                                <option value="percent">Percent</option>

                                            </select>
                                        </div>
                                        <!--<div class="mb-3">
                                        <label class="form-label">Start Date to End Date</label>
                                        <input type="text" class="form-control date" id="daterangetime" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">
                                      </div>-->
                                        <div class="mb-3">
                                            <div class="row g-2">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Start Date</label>
                                                    <input type="date" class="form-control date"  name="cupon_start_time">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">End Date</label>
                                                    <input type="date" class="form-control date"  name="cupon_end_time"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Choose Cupon Image</label>
                                            <input type="file" id="example-fileinput" class="form-control" name="cupon_image">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">User Limit</label>
                                            <input data-toggle="touchspin" data-bts-max="1000" type="number" value="" name="cupon_max_user">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label"> Terms & Conditions</label>
                                            <textarea class="ckeditor form-control" name="cupon_terms_conditions"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <h6 class="font-15 mt-3">Set Cupon Status</h6>

                                        <div class="mt-3">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="cupon_status" class="form-check-input" value="1">
                                                <label class="form-check-label" for="customRadio3">Active </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="cupon_status" class="form-check-input" value="0" checked>
                                                <label class="form-check-label" for="customRadio4">Inactive</label>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-success rounded-pill" style="margin-top: 46px;margin-left: 380px;">Save</button>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </form>
                            <!-- end row-->
                        </div>
                        <!-- end preview-->

                        <!-- end preview code-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
    @else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">update Cupon <span></span> </h4>
                    <p class="text-muted font-14"></p>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <form action="{{route('superadmin::edit_cupon',$fetch_cupon->cupon_activity_key)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="cupon-name" class="form-label">Cupon Name &nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <input type="text" id="cupon-name" name="cupon_name" class="form-control" value="{{$fetch_cupon->cupon_name}}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cupon-code" class="form-label">Cupon Code&nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <input type="text" id="cupon-code" name="cupon_code" class="form-control" placeholder="Cupon Code" value="{{$fetch_cupon->cupon_code}}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cupon-amount" class="form-label">Cupon Amount &nbsp;<span style="color: red;margin-left: -4px;" require>*</span></label>
                                            <input type="text" id="cupon-amount" name="cupon_amount" class="form-control" value="{{$fetch_cupon->cupon_amount}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Minimum Purchase Amount</label>
                                            <input data-toggle="touchspin" data-bts-max="1000" type="number" name="cupon_min_purchase_amount" value="{{$fetch_cupon->cupon_min_purchase_amount}}">
                                        </div>

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Discount Type &nbsp;<span style="color: red;margin-left: -4px;">*</span></label>
                                            <select class="form-select" id="example-select" name="cupon_discount_type">
                                               <option selected="true" disabled="disabled">Select Discount type</option>
                                                <option <?php 
                                                        	if($fetch_cupon->cupon_discount_type=='flat'){
                                                              echo 'selected';
                                                            } 
                                                        ?>
                                                        value="flat">Flat
                                              	</option> 
                                                <option <?php 
                                                        	if($fetch_cupon->cupon_discount_type=='percent'){
                                                              echo 'selected';
                                                            } 
                                                        ?>
                                                        value="percent">Percent
                                              </option>

                                            </select>
                                        </div>
                                        <!--<div class="mb-3">
                                        <label class="form-label">Start Date to End Date</label>
                                        <input type="text" class="form-control date" id="daterangetime" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">
                                      </div>-->
                                        <div class="mb-3">
                                            <div class="row g-2">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Start Date</label>
                                                  	<span>mm/dd/yy</span>
                                                    <input type="date" class="form-control "  name="cupon_start_time" value="{{$fetch_cupon->cupon_start_time}}" >
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">End Date</label>
                                                  	<span>mm/dd/yy</span>
                                                    <input type="date" class="form-control "  name="cupon_end_time" value="{{$fetch_cupon->cupon_end_time}}"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Choose Cupon Image</label>
                                            <input type="file" id="example-fileinput" class="form-control" name="cupon_image" >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">User Limit</label>
                                            <input data-toggle="touchspin" data-bts-max="1000" type="number"  name="cupon_max_user" value="{{$fetch_cupon->cupon_max_user}}">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label"> Terms & Conditions</label>
                                            <textarea class="ckeditor form-control" name="cupon_terms_conditions">
                                              {{$fetch_cupon->cupon_terms_conditions}}
                                          </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <h6 class="font-15 mt-3">Set Cupon Status</h6>

                                        <div class="mt-3">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="cupon_status" class="form-check-input" value="1" <?php if($fetch_cupon->cupon_status==1){echo "checked";} ?>>
                                                <label class="form-check-label" for="customRadio3">Active </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="cupon_status" class="form-check-input" value="0" <?php if($fetch_cupon->cupon_status==0){echo "checked";} ?>>
                                                <label class="form-check-label" for="customRadio4" >Inactive</label>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-success rounded-pill" style="margin-top: 46px;margin-left: 380px;">Update</button>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </form>
                            <!-- end row-->
                        </div>
                        <!-- end preview-->

                        <!-- end preview code-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    @endif
</div>
@push('scripts')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

<script>
  $(document).ready(function() {
    toastr.options.timeOut = 3000;
    @if (Session::has('required_field'))
    toastr.error('{{ Session::get('required_field') }}');
    @endif
  });
</script>
@endpush
@endsection()