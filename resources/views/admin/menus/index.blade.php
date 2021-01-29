 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Menu','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <a href="{{route('menus.create')}}" class="btn btn-success float-right-m-2">ADD</a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Menu</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($menus as $menu)
                <tr>

                  <th scope="row">{{$menu->id}}</th>
                  <td>{{$menu->name}}</td>
                  <td>
                     <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-default">Edit</a>
                     <a href="{{route('menus.delete',['id'=>$menu->id])}}" class="btn btn-danger">Delete</a>
                    
                  </td>
                  
                </tr>
                @endforeach
              
              
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {{$menus->links()}}
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