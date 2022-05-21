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
        }
.sidebar-menu{
  height: 515px;
      }
    </style>
    <div class="content-wrapper" style="margin-right: 0px !important">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            

            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box" style="width:96%;">
                            <div class="box-header with-border">
                                <h3 class="box-title">Menu List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive" style="height: 426px;">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Name</th>
                                                <th>Old Price</th>
                                                <th>New Price</th>
                                                <th>Category</th>

                                                <th>Discount</th>
                                                <th>Discount type</th>
                                                <th>status</th>
                                                <th>Image</th>
                                               

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if (!empty($data_set))



                                                @foreach ($data_set as $data_sets)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $data_sets->menu_name }}</td>
                                                        <td>{{ $data_sets->menu_price }}</td>
                                                        <td>{{ $data_sets->final_price }}</td>
                                                        <td>
                                                            <?php $category=App\Model\CategoryModel::where('category_activity_key',$data_sets->category_id)->first();?>
                                                           {{ $category->category_name }}

                                                        </td>
                                                        <td>{{ $data_sets->discount }}</td>
                                                        <td>{{ $data_sets->discount_type }}</td>
                                                        <td><button onclick="active_deactive({{ $data_sets->id }})"
                                                                type="button"
                                                                class="btn  btn-toggle btn-success
                                                                          <?php 
                                                                          if ($data_sets->status == 1) {
                                                                            echo ' active';
                                                                          } ?>
                                                                       "
                                                                data-bs-toggle="button" aria-pressed="false"
                                                                autocomplete="on">
                                                                <div class="handle"></div>
                                                            </button></td>
                                                        <td> <a href="{{ $data_sets->menu_image }}"><img
                                                                     style="border-radius: 50%;height: 80px;width: 160px;"
                                                                    src="{{ $data_sets->menu_image }}"
                                                                    class="category_image"></a> </td>
                                                        
                                                        <td><a href="{{ route('admin::edit_menu', $data_sets->menu_activity_key) }}"
                                                               ><img src="{{url('/')}}/Admintheme/assets/images/edit.png"></a>  
                                                               <img src="{{url('/')}}/Admintheme/assets/images/dele.png" data-bs-toggle="modal"
                                                                data-bs-target="#myModal{{ $data_sets->id }}">
                                                        </td>


                                                    </tr>
                                                    <div class="modal" id="myModal{{ $data_sets->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" style="margin-top: 50%;">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Data</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body text-center">
                                                                    <p> Are You Sure to Delete?</p>
                                                                    <a href="{{ route('admin::del_menu', $data_sets->menu_activity_key) }}"
                                                                        class="btn btn-primary">Yes</a>&nbsp;
                                                                    <a href="" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">No</a>
                                                                </div>

                                                                <!-- Modal footer -->


                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                            @endif;

                                            </tfoot>
                                            {{ $data_set->links() }}
                                    </table>
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
            function active_deactive(id) {
                $.ajax({
                    url: "{{ route('admin::menu_status') }}",
                    type: "get",
                    data: {
                        'id': id
                    },
                    success: function(data) {
							toastr.success('Status Updated');
                            window.location.href = "{{ route('admin::view_menu') }}";

                    }
                });
            }
        </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>

$(document).ready(function() {
    toastr.options.timeOut = 10000;
     @if (Session::has('flash_message_save'))
     toastr.success('{{ Session::get('flash_message_save') }}');     
     @elseif (Session::has('flash_message_notsave'))
     toastr.error('{{ Session::get('flash_message_notsave') }}'); 
     @elseif (Session::has('flash_message_update'))
     toastr.success('{{ Session::get('flash_message_update') }}');  
     @elseif (Session::has('flash_message_notupdate'))
     toastr.error('{{ Session::get('flash_message_notupdate') }}'); 
     @elseif (Session::has('flash_message_delete'))
     toastr.success('{{ Session::get('flash_message_delete') }}'); 
     @elseif (Session::has('flash_message_notdelete'))
     toastr.error('{{ Session::get('flash_message_notdelete') }}');
     @endif
});
</script>
    @endpush

@endsection
