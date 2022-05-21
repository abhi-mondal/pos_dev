@extends('super_admin.layouts.layouts')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Logo</a></li>
                        <li class="breadcrumb-item active">Add Logo</li>
                    </ol>
                </div>
                <h4 class="page-title">Logo </h4>
            </div>
        </div>
    </div>
    <!-- checking_section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title" style="font-size: 24px;">Add Logo</h4>
                    <p class="text-muted font-14"></p>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <form action="{{route('superadmin::save_information')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Upload Your Logo</label>
                                            <input type="file" id="example-fileinput" class="form-control" name="slug_image">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-success" style="box-shadow: 4px 0px 24px 0px;"><i class="uil uil-check"></i>&nbsp;Save</button>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-6 order-lg-1 order-xxl-2">
                                        <!-- video -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="header-title">Your Uploaded Logo</h4>
                                                    
                                                </div>
												
                                                <div class="mt-3">
                                                    <div class="ratio ratio-16x9">
                                                     
                                                        @foreach($fetchImage as $logo)
                                                        	<img src="{{$logo->pos_cms_value}}" />            		
                                                        @endforeach
                                                      	@if(empty($logo->pos_cms_value))
                                                      		<img src="<?php echo $no_image; ?>" /> 
                                                      	@endif
                                                    </div>
                                                </div>
                                              
                                            </div> <!-- end card-body -->
                                        </div>
                                        <!-- end video -->

                                        <!-- video -->
                                       
                                        <!-- end video -->
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- updated_section -->
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 3000;
        @if(Session::has('required_msg'))
        toastr.error('{{ Session::get('required_msg') }}');
        @elseif(Session::has('logo_added'))
        toastr.success('{{ Session::get('logo_added') }}');
        @elseif(Session::has('logo_updated'))
        toastr.success('{{ Session::get('logo_updated') }}');
        @endif
    });
</script>
@endpush
@endsection()