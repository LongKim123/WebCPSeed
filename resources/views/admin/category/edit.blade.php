 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Category','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('categories.update',['id'=>$category->id])}}" method="post">
              @csrf
              <div class="form-group">
                <label >Tên Danh Mục</label>
                <input class="form-control" name="name" value="{{$category->name}}"   placeholder="mời nhâp tên danh muc">
               
              </div>
              <div class="form-group">
                <label >Chon danh muc cha</label>
                <select class="form-control"  name="parent_id"  >
                  <option value="0">Chon danh muc cha</option>
                  {!!$htmlOption!!}
                  
                </select>
              </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập mô tả </label>
                <textarea class="form-control" name="contents" id="ckeditor" row="3" >{{$category->des}}</textarea>
                
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