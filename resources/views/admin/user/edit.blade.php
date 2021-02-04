 @extends('layouts.admin')
 @section('tittle')
   
  <title>User</title>
@endsection
@section('css')
   
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{asset('admins/user/add/add.css')}}">
 
  }
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'User','key'=>'Edit'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('users.update',['id'=>$users->id])}}" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <label >Nhập tên</label>
                <input type="text"  value="{{$users->name}}" class="form-control " name="name"   placeholder="mời nhâp tên">
               
              </div>
               <div class="form-group">
                <label >Nhập Email</label>
                <input type="text"  value="{{$users->email}}" class="form-control " name="email"   placeholder="mời nhâp email">
               
              </div>
               <div class="form-group">
                <label >Nhập Password</label>
                <input type="password" value="" class="form-control " name="password"   placeholder="mời nhâp password">
               
              </div>
            <div class="form-group">
                <label >Chon vai tro</label>

                <select class="form-control select2_init"  name="role_id[]" multiple  >
                  <option value=""></option>
                  @foreach($roles as $role)

                      <option 
                       {{$roleUser->contains('id',$role->id) ? 'selected' : ''}}
                        value="{{$role->id}}" >{{$role->name}}</option>
                  @endforeach

                  
                  
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

  @section('js')
   
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{asset('admins/user/add/add.js')}}">
   
   </script>

@endsection