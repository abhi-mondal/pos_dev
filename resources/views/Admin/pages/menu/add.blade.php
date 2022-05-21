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
    /*background: #1283da;*/
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

  .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
    width: 100% !important;
  }
</style>
<div class="content-wrapper" style="margin-right: 0px !important">
  <div class="container">
    <!-- Content Header (Page header) -->


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
                <div class="box-body wizard-content">
                  @if(empty($data))
                  <form action="{{ route('admin::save_menu') }}" class="tab-wizard vertical wizard-circle" method="POST" enctype="multipart/form-data">
                    <!-- Step 1 -->
                    @csrf
                    <section>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstName1" class="form-label">Menu Name
                              :</label>
                            <input type="text" class="form-control" name="menu_name" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastName2" class="form-label">Price :</label>
                            <input type="number" onkeyup="make_calculation1();" name="price" required class="form-control" id="price">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="emailAddress2" class="form-label">Choose
                              Category :</label>
                            <select class="form-select" onchange="make_calculation2();" id="location2" name="category">
                              @if (!@empty($category))
                              @foreach ($category as $categorys)
                              <option value="{{ $categorys->category_activity_key }}">
                                {{ $categorys->category_name }}
                              </option>
                              @endforeach
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phoneNumber2" class="form-label">Discount
                              :</label>
                            <input type="tel" name="discount" onkeyup="make_calculation2();" class="form-control" id="discount">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="location2" class="form-label">Discount Type
                              :</label>
                            <select class="form-select" name="discount_type" onchange="make_calculation3();" id="discount_type">

                              <option value="flat">Flat</option>
                              <option value="percent">' % '</option>

                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Mode :</label>
                            <input name="mode" type="radio" id="radio_5" value="1" checked>
                            <label for="radio_5" class="d-block">Active</label>
                            <input name="mode" type="radio" id="radio_6" value="0">
                            <label for="radio_6">InActive</label>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Step 2 -->

                    <section>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jobTitle6" class="form-label">Final Price
                              :</label>
                            <input type="text" name="final_amount" class="form-control" id="final_amount" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="videoUrl2" class="form-label">Menu Image
                              :</label>
                            <input type="file" name="image" class="form-control" id="videoUrl2">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="shortDescription2" class="form-label">Menu
                              Description :</label>
                            <textarea name="description" id="shortDescription2" rows="6" class="form-control" required></textarea>
                          </div>


                        </div>
                        <div class="col-md-8">
                          <div class="form-group" style="width: 100%; !important">
                            <label for="videoUrl2" class="form-label">Choose Attribute
                              :</label>
                            <select class="select" name="attr_id[]" id="sel" multiple="multiple" data-mdb-clear-button="true" style="width: 100%; !important">
                              @if(!empty($attribute))
                              @foreach($attribute as $attr_list)
                              <option value="{{$attr_list->id}}">
                                {{$attr_list->attribute_name}}
                              </option>
                              @endforeach
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="submit" id="button" name="submit" value="Add Menu +" class="btn btn-success" style="margin-top: 28px;float: right;">
                          </div>
                        </div>
                      </div>
                    </section>

                  </form>
                  @else
                  <form action="{{ route('admin::save_menu') }}" class="tab-wizard vertical wizard-circle" method="POST" enctype="multipart/form-data">
                    <!-- Step 1 -->
                    @csrf
                    <section>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstName1" class="form-label">Menu Name
                              :</label>
                            <input type="text" value="{{ $data->menu_name }}" class="form-control" name="menu_name" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastName2" class="form-label">Price :</label>
                            <input type="number" onkeyup="make_calculation1();" value="{{ $data->menu_price }}" name="price" required class="form-control" id="price">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="emailAddress2" class="form-label">Choose
                              Category :</label>
                            <select class="form-select" onchange="make_calculation2();" id="location2" name="category">
                              @if (!@empty($category))
                              @foreach ($category as $categorys)
                              <option value="{{ $categorys->category_activity_key }}" <?php if ($categorys->category_activity_key == $data->category_id) {
                                                                                        echo 'selected';
                                                                                      } ?>>
                                {{ $categorys->category_name }}
                              </option>
                              @endforeach
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phoneNumber2" class="form-label">Discount
                              :</label>
                            <input type="number" name="discount" value="{{ $data->discount }}" onkeyup="make_calculation2();" class="form-control" id="discount">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="location2" class="form-label">Discount Type
                              :</label>
                            <select class="form-select" name="discount_type" onchange="make_calculation3();" id="discount_type">

                              <option value="flat" <?php if ($data->discount_type == 'flat') {
                                                      echo 'selected';
                                                    } ?>>Flat</option>
                              <option value="percent" <?php if ($data->discount_type == 'percent') {
                                                        echo 'selected';
                                                      } ?>>' % '</option>

                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Mode :</label>
                            <input name="mode" type="radio" id="radio_5" value="1" <?php if ($data->status == 1) {
                                                                                      echo 'checked';
                                                                                    } ?>>
                            <label for="radio_5" class="d-block">Active</label>
                            <input name="mode" type="radio" id="radio_6" value="0" <?php if ($data->status == 0) {
                                                                                      echo 'checked';
                                                                                    } ?>>
                            <label for="radio_6">InActive</label>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Step 2 -->

                    <section>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jobTitle6" class="form-label">Final Price
                              :</label>
                            <input type="text" name="final_amount" value="{{ $data->final_price }}" class="form-control" id="final_amount" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="videoUrl2" class="form-label">Menu Image
                              :</label>
                            <input type="file" name="image" class="form-control" id="videoUrl2">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="shortDescription2" class="form-label">Menu
                              Description :</label>
                            <textarea name="description" id="shortDescription2" rows="6" class="form-control">{{ $data->description }}</textarea>
                            <input type="hidden" name="id" value="{{$data->menu_activity_key}}">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group" style="width: 100%; !important">
                            <label for="videoUrl2" class="form-label">Choose Attribute
                              :</label>
                            <select class="select" name="attr_id[]" id="sel" multiple="multiple" data-mdb-clear-button="true" style="width: 100%; !important">
                              @if(!empty($attribute))
                              @foreach($attribute as $attr_list)
                            	
                              <option value="{{$attr_list->id}}"                                      
                                      <?php 
                                      $fetchValue = explode(",",$data->menu_attributes); 
                                      if (in_array($attr_list->id,$fetchValue)) {
                                        echo 'selected';
                                      } ?>>
                                	
                                {{$attr_list->attribute_name}}
                              </option>
                              
                              @endforeach
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="submit" id="button" name="submit" value="Add Menu +" class="btn btn-success" style="margin-top: 28px;float: right;">
                          </div>
                        </div>
                      </div>
                    </section>

                  </form>
                  @endif
                </div>
                <!-- /.box-body -->
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

@push('scripts')
<script>
  function make_calculation1() {
    var price = $("#price").val();
    var discount_type = $('#discount_type').val();
    var discount = $("#discount").val();
    var final_amount = $("final_amount").val();

    if (discount_type == 'flat') {
      var final_amount = price - discount;
      document.getElementById("final_amount").value = final_amount;
      $("#button").css("display", "block");

    }
    if (discount_type == 'percent') {
      var final_amount = price - ((price * discount) / 100);
      document.getElementById("final_amount").value = final_amount;
      $("#button").css("display", "block");

    }
    if (final_amount < 0) {
      alert('invalid Discount Or Amount!!!')
      $("#button").css("display", "none");
    }


  }

  function make_calculation2() {
    var price = $("#price").val();
    var discount_type = $('#discount_type').val();
    var discount = $("#discount").val();

    if (discount_type == 'flat') {
      var final_amount = price - discount;
      document.getElementById("final_amount").value = final_amount;
      $("#button").css("display", "block");

    }
    if (discount_type == 'percent') {
      var final_amount = price - ((price * discount) / 100);
      document.getElementById("final_amount").value = final_amount;


    }
    if (price == '') {
      alert('please enter price!!!')
      $("#button").css("display", "block");
    }

    if (final_amount < 0) {
      alert('invalid Discount Or Amount!!!')
      $("#button").css("display", "none");
    }


  }

  function make_calculation3() {
    var price = $("#price").val();
    var discount_type = $('#discount_type').val();
    var discount = $("#discount").val();

    if (discount_type == 'flat') {
      var final_amount = price - discount;
      document.getElementById("final_amount").value = final_amount;
      $("#button").css("display", "block");

    }
    if (discount_type == 'percent') {
      var final_amount = price - ((price * discount) / 100);
      document.getElementById("final_amount").value = final_amount;


    }
    if (price == '') {
      alert('please enter price!!!')
      $("#button").css("display", "block");
    }
    if (final_amount < 0) {
      alert('invalid Discount Or Amount!!!')
      $("#button").css("display", "none");
    }

  }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
  $('#sel').selectpicker();
</script>
@endpush
@endsection