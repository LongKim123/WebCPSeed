 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'CategoryHR','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('categories_hr.update',['id'=>$categories_hr->id])}}" method="post">
              @csrf
            <div class="form-group">
                <label >Tên Loại Nhân Sự</label>
                <input class="form-control" value="{{$categories_hr->name}}" name="name"   placeholder="mời nhâp tên loại nhân sự">
               
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                <textarea class="form-control" name="contents" id="ckeditor" row="3" >{{$categories_hr->description}}</textarea>
                
              </div>
               <div class="form-group">
                <label >Chon danh muc cha</label>
                <select class="form-control"  name="parent_id"  >
                  <option value="0">Chon danh muc cha</option>
                  {{!!$htmlOption!!}}
                  
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