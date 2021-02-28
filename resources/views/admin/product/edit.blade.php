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
  @include('partial.content_header',['name'=>'Product','key'=>'Edit'])
 
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('product.update',['id'=>$product->id])}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label >Tên Sản Phẩm</label>
                <input value="{{$product->name}}" type="text" class="form-control" name="name"   placeholder="mời nhâp tên sản phẩm">
               
              </div>
              <div class="form-group">
                <label >Giá Sản Phẩm</label>
                <input value="{{$product->price}}" type="text" class="form-control" name="price"   placeholder="mời nhâp giá sản phẩm">
               
              </div>
              <div class="form-group">
                <label >Ảnh đại diện</label>
                <input type="file" class="form-control-file" name="feature_image_path"   >
               
              </div>
              <div class="col-md-4 feature_image_container">
                <div class="row">
                  <img class="feature_image" src="http://localhost/CtyCPseed/{{$product->feature_image_path}}" alt="">
                  
                </div>
                
              </div>
              <div class="form-group">
                <label >Ảnh chi tiết</label>
                <input name="image_path[]" multiple="" type="file" class="form-control-file"  >
                <div class="col-md-12" >
                <div class="row">
                  @foreach($product->productImages as $productImageItem)
                  <div class="col-md-3">
                     <img class="image_detail_product" src="http://localhost/CtyCPseed/{{$productImageItem->image_path}}" alt="">
                  </div>
                  @endforeach
                 
                  
                </div>
                
              </div>
               
              </div>
              <div class="form-group">
                <label >Chon danh muc</label>
                <select class="form-control select_init"  name="category_id"  >
                  <option value="0">Chon loại sản phẩm</option>
                  {!!$htmlOption!!}
                  
                </select>
              </div>
              <div class="form-group">
                <label >Chon thương hiệu</label>
                <select class="form-control select_init"  name="brand_id"  >
                  <option selected value="{{$brand1->id}}">{{$brand1->name}}</option>
                   @foreach($brands as $brandItem)
                     <option value="{{$brandItem->id}}">{{$brandItem->name}}</option>
                  @endforeach
                  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập nội dung sản phẩm</label>
                <textarea  class="form-control" name="contents" row="3" id="ckeditor" >{{$product->content}}</textarea>
              </div>
              
               <div class="form-group">
                <label >Tags</label>
                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                  @foreach($product->tags as $tagItem)
                      <option value="{{$tagItem->name}}" selected >{{$tagItem->name}}</option>
                    @endforeach
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