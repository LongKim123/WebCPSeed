 @extends('layouts.admin')
 @section('tittle')
   
  <title>List Product</title>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('public/admins/product/index/list.css')}}">
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('public/admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
  
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
          <!--  -->
          <div class="col-md-12">
            <table class="table" id="myTable1" >
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá </th>
                  <th scope="col">Hình ảnh </th>
                  <th scope="col">Danh mục </th>
                  <th scope="col">Thương Hiệu </th>
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
                  <td>
                   {{optional($pro->brand)->name}}
                  </td>
                  <td> <a class="btn btn-default" href="{{route('product.edit',['id'=>$pro->id])}}" >Edit</a>
                    <a data-url="{{route('product.delete',['id'=>$pro->id])}}" class="btn btn-danger action_delete" >Delete</a></td>
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
          <!--  -->
          
          <!-- /.col-md-6 -->
       
          <!-- /.col-md-6 -->
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection
  @section('js')
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
  @endsection