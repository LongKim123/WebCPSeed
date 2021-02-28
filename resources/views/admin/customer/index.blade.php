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
                  <th scope="col">Mã khách hàng</th>
                  <th scope="col">Tên khách hàng </th>
                  <th scope="col">Email</th>
                  <th scope="col">Số Điên Thoại</th>
                  
                  <th scope="col">Địa chỉ</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $customerItem)
                
                <tr>

                  <td>{{$customerItem->id}}</td>
                  <td>{{$customerItem->name}} </td>
                  <td>
                    {{$customerItem->email}}
                  </td>
                  <td>

                    {{$customerItem->phone_number}}
                  </td>
                  <td>
                   {{$customerItem->address}}
                  </td>
                  
                        
                     
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {{$customers->links()}}
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