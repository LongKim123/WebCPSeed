 @extends('layouts.admin')
 @section('tittle')
   
  <title>List News</title>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('public/admins/product/index/list.css')}}">
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('public/admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
  
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'News','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('news_farmer.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Tiên Đề</th>
                  <th scope="col">Hình ảnh</th>
                  
                  <th scope="col">Loại tin tức</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($news as $newItem)
                
                <tr>

                  <th scope="row">{{$newItem->id}}</th>
                  <td>{{$newItem->tittle}}</td>
                  
                  <td>

                    <img class="product_image_150_100" src="http://localhost/CtyCPseed/{{$newItem->image}}" alt="">
                  </td>
                 
                  <td>
                   {{optional($newItem->hr_category)->name}}
                  </td>
                  <td> <a class="btn btn-default" href="{{route('news_farmer.edit',['id'=>$newItem->id])}}" >Edit</a>
                    <a data-url="{{route('news_farmer.delete',['id'=>$newItem->id])}}" class="btn btn-danger action_delete" >Delete</a></td>
                
                 
                  
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