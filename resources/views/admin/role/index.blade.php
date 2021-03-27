 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('public/admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('css')
   
  <link rel="stylesheet" type="text/css" href="{{asset('admins/slider/index/index.css')}}">
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Role','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên vai trò</th>
                  <th scope="col">Mô tả vai trò</th>
                  
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                 @foreach($role as $roleItem)
                 <tr>

                  <th scope="row">{{$roleItem->id}}</th>
                  <td>{{$roleItem->name}}</td>
                  <td>{{$roleItem->display_name}}</td>
                  
                  <td>
                    <a class="btn btn-default" href="{{route('roles.edit',['id'=>$roleItem->id])}}" >Edit</a>
                     <a data-url="{{route('roles.delete',['id'=>$roleItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                  </td>
                  
                </tr>
                @endforeach
                
              
              
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$role->links()}}
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