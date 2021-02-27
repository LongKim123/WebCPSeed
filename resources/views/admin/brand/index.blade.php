 @extends('layouts.admin')
 @section('tittle')
   
  <title>List Brands</title>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('admins/product/index/list.css')}}">
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
  
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Brand','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('brands.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Thương Hiệu</th>
                  <th scope="col">Hình ảnh </th>
                  
                  <th scope="col">Địa chỉ </th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $brandsItem)
                
                <tr>

                  <th scope="row">{{$brandsItem->id}}</th>
                  <td>{{$brandsItem->name}}</td>
                  
                  <td>

                    <img class="product_image_150_100" src="http://localhost/CtyCPseed/{{$brandsItem->image}}" alt="">
                  </td>
                 
                 
                  <td> <a class="btn btn-default" href="{{route('brands.edit',['id'=>$brandsItem->id])}}" >Edit</a>
                    <a data-url="{{route('brands.delete',['id'=>$brandsItem->id])}}" class="btn btn-danger action_delete" >Delete</a></td>
                 
                  
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