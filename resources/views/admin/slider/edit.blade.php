 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('public/admins/slider/edit/edit.css')}}">
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Slider','key'=>'Edit'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <label >Tên Slider</label>
                <input value="{{$slider->name}}" class="form-control @error('name') is-invalid @enderror" name="name"   placeholder="mời nhâp tên cho slider">
               
              </div>
               @error('name')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
              <div class="form-group">
                <label >Mô tả Slider </label>
               <textarea
                  class="form-control @error('description') is-invalid @enderror"
                  name="description" id="ckeditor" rows="4">{{$slider->description}}</textarea>
 
               
              </div>
               @error('description')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
                <div class="form-group">
                  <label >Hình ảnh</label>
                  <input  type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path"   >
                 
              </div>
              
              <div class="col-md-4">
                <div class="row">
                  <img class="slider_image" src="http://localhost/CtyCPseed/{{$slider->image_path}}" alt="">
                  
                </div>
                
              </div>
               @error('image_path')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
              <div class="form-group">
                <label >Chon danh muc</label>
                <select class="form-control select_init"  name="category_id"  >
                  
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