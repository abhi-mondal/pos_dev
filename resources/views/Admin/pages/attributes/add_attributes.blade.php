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
        <div class="alert alert-error alert-block">
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
    @if(empty($get_id))
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Add Attributes</h3>
              </div>
              <div class="box-body">
                <div class="box">
                  <div class="box-body wizard-content">

                    <form action="{{route('admin::save_attributes')}}" class="tab-wizard vertical wizard-circle" name="myForm" method="POST" enctype="multipart/form-data">
                      @csrf
                      <section>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="delivery_man_name" class="form-label"> Attributes Name :
                              </label>
                              <input type="text" class="form-control" name="attribute_name" id="attribute_name">
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Mode :</label>
                              <input name="mode" type="radio" id="radio_5" value="1">
                              <label for="radio_5" class="d-block">Active</label>
                              <input name="mode" type="radio" id="radio_6" value="0" checked="checked">
                              <label for="radio_6">InActive</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group has-success">
                              <label class="form-label" for="inputSuccess"> Upload Attributes
                                Image</label>
                              <div class="form-input">
                                <div class="preview">
                                  <img id="file-ip-1-preview">
                                </div>
                                <label for="file-ip-1">Upload Image</label>
                                <input type="file" id="file-ip-1" name="image" accept="image/*" onchange="showPreview(event);">

                              </div>
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
                          <div class="col-md-6">

                            <div class="form-group" style="margin-top: 72px;margin-left: 11px;">
                              <input type="submit" id="button" name="submit" style="color:white;" value="+ Save Attribute" class="btn btn-success">
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
    @else
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Attributes</h3>
              </div>
              <div class="box-body">
                <div class="box">
                  <div class="box-body wizard-content">

                    <form action="{{route('admin::attr_update_value',$get_id->activity_key)}}" class="tab-wizard vertical wizard-circle" name="myForm" method="POST" enctype="multipart/form-data">
                      @csrf
                      <section>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="delivery_man_name" class="form-label"> Attributes Name :
                              </label>
                              <input type="text" class="form-control" name="attribute_name" id="attribute_name" value="{{$get_id->attribute_name}}">
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Mode :</label>
                              <input name="mode" type="radio" id="radio_5" value="1" <?php if($get_id->status==1){echo "checked";} ?>>
                              <label for="radio_5" class="d-block">Active</label>
                              <input name="mode" type="radio" id="radio_6" value="0" <?php if($get_id->status==0){echo "checked";} ?>>
                              <label for="radio_6">InActive</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group has-success">
                              <label class="form-label" for="inputSuccess"> Upload Attributes
                                Image</label>
                              <div class="form-input">
                                <div class="preview">
                                  <img id="file-ip-1-preview">
                                </div>
                                <label for="file-ip-1">Upload Image</label>
                                <input type="file" id="file-ip-1" name="image" accept="image/*" onchange="showPreview(event);">

                              </div>
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
                          <div class="col-md-6">

                            <div class="form-group" style="margin-top: 72px;margin-left: 11px;">
                              <input type="submit" id="button" name="submit" style="color:white;" value="+ Save Attribute" class="btn btn-success">
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

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
  $(document).ready(function() {
     toastr.options.timeOut = 10000;
     @if (Session::has('empty_field'))
     toastr.error('{{ Session::get('empty_field') }}');
     @elseif(Session::has('exist_attr'))
     toastr.error('{{ Session::get('exist_attr') }}');
     @elseif(Session::has('attr_add'))
     toastr.success('{{ Session::get('attr_add') }}');
     @endif
   });
</script>
@endpush
@endsection

 