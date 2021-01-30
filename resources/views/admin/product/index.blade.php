 @extends('layouts.admin')
 @section('tittle')
   
  <title>List Product</title>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('admins/product/index/list.css')}}">
@endsection
@section('js')
   
  
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Product','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('product.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá </th>
                  <th scope="col">Hình ảnh </th>
                  <th scope="col">Danh mục </th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($productList as $pro)
                
                <tr>

                  <th scope="row">{{$pro->id}}</th>
                  <td>{{$pro->name}}</td>
                  <td>
                    {{number_format($pro->price)}}
                  </td>
                  <td>

                    <img class="product_image_150_100" src="http://localhost/CtyCPseed/{{$pro->feature_image_path}}" alt="">
                  </td>
                  <td>
                   {{optional($pro->category)->name}}
                  </td>
                  <td> <a class="btn btn-default" href="{{route('product.edit',['id'=>$pro->id])}}" >Edit</a>
                    <a class="btn btn-danger" href="{{route('product.delete',['id'=>$pro->id])}}">Delete</a></td>
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {{$productList->links()}}
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