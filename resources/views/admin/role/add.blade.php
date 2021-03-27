 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

 
  <link rel="stylesheet" type="text/css" href="{{asset('public/admins/role/add/add.css')}}">

@endsection
@section('js')

 <script src="{{asset('public/admins/role/add/add.js')}}" type="text/javascript" charset="utf-8" async defer></script>
 </script>  

  

@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Roles','key'=>'Add'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" >
              
          <div class=col-md-12>
            @csrf
           
              <div class="form-group">
                <label >Tên vai trò </label>
                <input value="" class="form-control" name="name"   placeholder="mời nhâp tên cho slider">
               
              </div>
           
              <div class="form-group">
                <label >Mô tả vai trò </label>
               <textarea
                  class="form-control "
                  name="display_name" rows="4">{{ old('description') }}</textarea>
 
               
              </div>
            </div>
              
             
               
              
           
              <div   class=col-md-12 >
                <div class="row" >
                  @foreach($permissions as $permissionItem)
                   <div class="card border-primary mb-3 col-md-12  ">
                      <div class="card-header">
                        <label><input class="checkbox_wrapper" type="checkbox" name="" value=""></label>
                        Module {{$permissionItem->name}}
                      </div>
                      <div class="row">
                         @foreach($permissionItem->permissionsChildrent as $permissionsChildrentItem)
                        <div class="card-body text-primary">
                          <h5 class="card-title">
                            <label>
                            <input value="{{$permissionsChildrentItem->id}}" type="checkbox" class="checkbox_childrent" name="permission_id[]" ></label>
                            {{$permissionsChildrentItem->name}}
                          </h5>
                         
                        </div>
                        @endforeach
                     
                      </div>
                     
                    </div>
                    @endforeach
                  
                </div>
               
                
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            
          </form>
          </div>
         
           
          </div>
          <!-- /.col-md-6 -->
       
          <!-- /.col-md-6 -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
    <!-- /.content -->
  </div>
  @endsection