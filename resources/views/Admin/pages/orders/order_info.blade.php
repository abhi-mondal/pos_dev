@extends('Admin.layout.adminlayout')
@section('title', 'Pending-Orders')
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
      
      
      
      .page-item.active .page-link {
    z-index: 9;
    color: #fff;
    background-color: #0080ff;
    border-color: #0080ff;
    height: 50px;
    width: 42px;
        padding: 14px;
}



    </style>
<div class="content-wrapper" style="margin-right: 0px !important">
   <div class="container-full">
      <!-- Content Header (Page header) -->
     <!-- <div class="content-header">
         <div class="d-flex align-items-center ">
            <div class="alert alert-error alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong></strong>
            </div>
            <div class="alert alert-success alert-block" style="background-color: darkcyan;">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong></strong>
            </div>
         </div>-->
      </div>
      <!-- Main content -->
      <section class="content">
         <div class="row">
            <div class="col-12">
               <div class="box" style="width:96%;">
                  <div class="box-header with-border">
                    @if(!empty($data))
                     <h3 class="box-title">{{$data}} Orders</h3>
                    @endif
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Sl No</th>
                                 <th>Order Id</th>
                                 
                                 
                                 <th>Total Amount</th>
                                 <th>Payment Status</th>
                                 <th>Payment Method</th>
                                 <th>Order Details</th>
                              </tr>
                           </thead>
                           <tbody>
                             @if(!empty($fetchOrder))
                             @php $i=1; @endphp
                             @foreach($fetchOrder as $orderlist)
                              <tr>
                                 <td>{{$i}}</td>
                                 
                                 <td>{{$orderlist->pos_order_id}}</td>
                                 <td>${{$orderlist->pos_order_total_amount}}</td>
                                 <td>
                                   @if($orderlist->pos_order_is_paid==0)
                                   <span class="badge bg-danger">unpaid</span>
                                   @else
                                   <span class="badge bg-success">paid</span>
                                   @endif
                                </td>
                                 <td><span class="badge bg-primary">Cash on Delivery</span></td>
                                <td><a href="{{route('admin::order_invoice')}}" target="_blank"><span class="badge bg-warning"><i class="fa fa-eye"></i>&nbsp;View</span></a></td>
                              </tr>
                             @php $i++ @endphp
                             @endforeach
                             @endif
                              <div class="modal" id="">
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
                                          <a href=""
                                             class="btn btn-primary">Yes</a>&nbsp;
                                          <a href="" class="btn btn-danger"
                                             data-bs-dismiss="modal">No</a>
                                       </div>
                                       <!-- Modal footer -->
                                    </div>
                                 </div>
                              </div>
                             
                        </table>
                     </div>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
           
          {{ $fetchOrder->links() }}
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </section>
      <!-- /.content -->
   </div>

<!-- Content Wrapper. Contains page content -->
  
@endsection