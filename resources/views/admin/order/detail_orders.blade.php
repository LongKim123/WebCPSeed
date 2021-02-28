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
                  <th scope="col">Tên Khách hàng</th>
                  <th scope="col">Địa chỉ </th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Email</th>
                  
                  
                  
                </tr>
                
              </thead>
              <tbody>
                <tr>

                  <td>{{optional($order_id->customer)->name}}</td>
                  <td> {{optional($order_id->customer)->address}}</td>
                  <td>
                   {{optional($order_id->customer)->phone_number}}
                  </td>
                  <td>
                    {{optional($order_id->customer)->email}}
                    
                  </td>
                  
                  
                        
                     
                  
                </tr>
              
              
              
              </tbody>
             
            </table>
           
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Đơn giá </th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Tổng tiền</th>
                  
                  
                  
                </tr>
              </thead>
              <tbody>
                @foreach($order_detail as $orderitem)
                
                <tr>

                  <td>{{$orderitem->product_name}}</td>
                  <td>  {{number_format($orderitem->product_price)}}</td>
                  <td>
                    {{$orderitem->product_quantity}}
                  </td>
                  <td>
                    {{number_format($orderitem->product_price*$orderitem->product_quantity)}}
                    
                  </td>
                  <td>
                  
                  </td>
                  
                        
                     
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           
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