 @extends('layouts.admin')
 @section('tittle')
   
  <title>List Product</title>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('admins/product/index/list.css')}}">
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
  
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'HR','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('hr.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Nhân Sự</th>
                  <th scope="col">Hình ảnh </th>
                  
                  <th scope="col">Phân loại nhân sự </th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($hr as $hrItem)
                
                <tr>

                  <th scope="row">{{$hrItem->id}}</th>
                  <td>{{$hrItem->name}}</td>
                  
                  <td>

                    <img class="product_image_150_100" src="http://localhost/CtyCPseed/{{$hrItem->image_hr}}" alt="">
                  </td>
                 
                  <td>
                   {{optional($hrItem->hr_category)->name}}
                  </td>
                  <td> <a class="btn btn-default" href="{{route('hr.edit',['id'=>$hrItem->id])}}" >Edit</a>
                    <a data-url="{{route('hr.delete',['id'=>$hrItem->id])}}" class="btn btn-danger action_delete" >Delete</a></td>
                 
                  
                </tr>
              
              
              @endforeach
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           
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