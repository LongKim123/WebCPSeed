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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="" method="post" enctype="mutipath/form-data">
              @csrf
              <div class="form-group">
                <label >Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name"   placeholder="mời nhâp tên sản phẩm">
               
              </div>
              <div class="form-group">
                <label >Giá Sản Phẩm</label>
                <input type="text" class="form-control" name="price"   placeholder="mời nhâp giá sản phẩm">
               
              </div>
              <div class="form-group">
                <label >Ảnh đại diện</label>
                <input type="file" class="form-control" name="feature_image_path"   >
               
              </div>
              <div class="form-group">
                <label >Ảnh chi tiết</label>
                <input name="image_path" multiple="" type="file" class="form-control" name="feature_image_path"   >
               
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập nội dung sản phẩm</label>
                <textarea class="form-control" name="content" row="3" ></textarea>
              </div>
              <div class="form-group">
                <label >Chon danh muc</label>
                <select class="form-control select_init"  name="parent_id"  >
                  <option value="0">Chon danh muc cha</option>
                  {!!$htmlOption!!}
                  
                </select>
              </div>
               <div class="form-group">
                <label >Nhập tags</label>
                <select class="form-control tags_select_choose" multiple="multiple">
                 
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