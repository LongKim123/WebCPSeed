 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('admins/slider/add/add.css')}}">
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Slider','key'=>'Add'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <label >Tên Slider</label>
                <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name"   placeholder="mời nhâp tên cho slider">
               
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
                  name="description" id="ckeditor" rows="4">{{ old('description') }}</textarea>
 
               
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
               @error('image_path')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
               
              
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