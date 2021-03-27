 @extends('layouts.admin')
 

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Order','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Mã đơn hàng</th>
                  <th scope="col">Tên khách hàng </th>
                  <th scope="col">Tổng tiền</th>
                  <th scope="col">Ghi chú</th>
                  <th scope="col">Hình thức thanh toán </th>
                  <th scope="col">Ngày đăt hàng </th>

                  
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($orders1 as $orderitem)
                
                <tr>

                  <td>{{$orderitem->id}}</td>
                  <td> {{optional($orderitem->customer)->name}}</td>
                  <td>
                    {{number_format($orderitem->order_total)}}
                  </td>
                   <td>{{$orderitem->node_order}}</td>
                  @if(optional($orderitem->payment)->method==1)
                  <td>OTD</td>
                  @else
                  <td>paypal</td>
                  
                  @endif
                  <td>
                    {{$orderitem->created_at}}
                  </td>
                  <td>
                   <a class="btn btn-default" href="{{route('order.details',['id'=>$orderitem->id])}}" >Xem chi tiết</a>
                  </td>
                  
                        
                     
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {{$orders1->links()}}
          </ul>
        </div>
          
          <!-- /.col-md-6 -->
       
          <!-- /.col-md-6 -->
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection