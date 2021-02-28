 @extends('layouts.admin')
 @section('tittle')
   
  <title>Add Product</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('admins/product/add/add.css')}}">
@endsection

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Product','key'=>'Add'])
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
            <form action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label >Tên Sản Phẩm</label>
                <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   placeholder="mời nhâp tên sản phẩm">
                @error('name')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
                
              
               
              </div>
              <div class="form-group">
                <label >Giá Sản Phẩm</label>
                <input value="{{old('price')}}" type="text" class="form-control @error('price') is-invalid @enderror" name="price"   placeholder="mời nhâp giá sản phẩm">
                 @error('price')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
               
              </div>
              <div class="form-group">
                <label >Ảnh đại diện</label>
                <input type="file" class="form-control-file" id="feature_image_path" name="feature_image_path"   >
               
              </div>
              <div class="form-group">
                <label >Ảnh chi tiết</label>
                <input name="image_path[]" multiple="" type="file" class="form-control-file"  >
               
              </div>
              <div class="form-group">
                <label >Chon Loại sản phẩm</label>
                <select class="form-control select_init @error('category_id') is-invalid @enderror"  name="category_id"  >
                  <option value="">Chon danh muc</option>
                  {!!$htmlOption!!}
                  
                </select>
                  @error('category_id')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror

              </div>
              <div class="form-group">
                <label >Chon thương hiệu sản phẩm</label>
                <select class="form-control select_init @error('category_id') is-invalid @enderror"  name="brand_id"  >
                  <option value="">Chon thương hiệu</option>
                  @foreach($brands as $brandItem)
                     <option value="{{$brandItem->id}}">{{$brandItem->name}}</option>
                  @endforeach
                  
                </select>
                  @error('category_id')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror

              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập nội dung sản phẩm</label>
                <textarea class="form-control @error('contents') is-invalid @enderror" name="contents" id="ckeditor" row="3" >{{old('contents')}}</textarea>
                 @error('contents')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
              </div>

              
               <div class="form-group">
                <label >Nhập tags</label>
                <select name="tags[]" class="form-control tags_select_choose @error('tags[]') is-invalid @enderror" multiple="multiple">
                 
                </select>
                @error('tags[]')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
                
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