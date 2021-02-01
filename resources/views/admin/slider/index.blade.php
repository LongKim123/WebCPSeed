 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('admins/slider/index/index.css')}}">
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Slider','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('slider.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Slider</th>
                  <th scope="col">Description</th>
                  <th scope="col">Hinh Anh</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                 @foreach($slider as $sliderItem)
                 <tr>

                  <th scope="row">{{$sliderItem->id}}</th>
                  <td>{{$sliderItem->name}}</td>
                  <td>{{$sliderItem->description}}</td>
                  <td>
                    <img class="slider_image_150_100" src="http://localhost/CtyCPseed/{{$sliderItem->image_path}}" alt="">
                  </td>
                  <td>
                     <a href="{{route('slider.edit',['id'=>$sliderItem->id])}}" class="btn btn-default">Edit</a>
                     <a data-url="{{route('slider.delete',['id'=>$sliderItem->id])}}"  class="btn btn-danger action_delete">Delete</a>
                  </td>
                  
                </tr>
                @endforeach
                
              
              
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$slider->links()}}
          </ul>
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