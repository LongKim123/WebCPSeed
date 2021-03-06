 @extends('layouts.admin')
 @section('tittle')
   
  <title>Thêm Tin Tức</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('admins/product/add/add.css')}}">
@endsection

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'News','key'=>'Add'])
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
            <form action="{{route('news_farmer.store')}}" method="post"  enctype="multipart/form-data">
              @csrf
            
               <div class="form-group">
                <label >Tiêu Đề</label>
                <input value="{{old('name')}}" type="text" class="form-control" name="tittle"   placeholder="mời nhập tiêu đề tin tức">
               
              
               
              </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập mô tả ngắn</label>
              <textarea class="form-control"  name="description" row="3" >{{old('contents')}}</textarea>
               
              
               
              </div>
              
              <div class="form-group">
                <label >Ảnh đại diện</label>
                <input type="file" class="form-control-file" id="image" name="image"   >
               
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="ckeditor" row="3" >{{old('contents')}}</textarea>
                
              </div>

              <div class="form-group">
                <label >Chon loại tin tức</label>
                <select class="form-control select_init"  name="category_id"  >
                  <option value="">Chon danh muc</option>
                  {!!$htmlOption!!}
                  
                </select>
                 

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