 @extends('layouts.admin')
 @section('tittle')
   
  <title>Sửa Thương Hiệu</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('admins/product/add/add.css')}}">
@endsection

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Brands','key'=>'Edit'])
<!--    <div class=col-md-12>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
   </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('brands.update',['id'=>$brands->id])}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label >Tên Thương Hiệu</label>
                <input value="{{$brands->name}}" type="text" class="form-control" name="name"   placeholder="mời nhâp tên thương hiệu">
               
              
               
              </div>
               <div class="form-group">
                <label >Địa chỉ</label>
                <input value="{{$brands->address}}" type="text" class="form-control" name="address"   placeholder="mời nhâp tên thương hiệu">
               
              
               
              </div>
              
              <div class="form-group">
                <label >Ảnh Thương Hiệu</label>
                <input type="file" class="form-control-file" id="image" name="image"   >
               
              </div>
              <div class="col-md-4 feature_image_container">
                <div class="row">
                  <img class="feature_image" src="http://localhost/CtyCPseed/{{$brands->image}}" alt="">
                  
                </div>
                
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập mô tả chi tiết</label>
                <textarea class="form-control" name="contents" id="ckeditor" row="3" >{{$brands->description}}</textarea>
                
              </div>

              
               
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
            
          </div>
         
           
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

  @section('js')
   
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{asset('admins/product/add/add.js')}}">
   </script>


@endsection