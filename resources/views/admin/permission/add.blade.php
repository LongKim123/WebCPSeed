 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Permission','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('permissions.store')}}" method="post">
              @csrf
              
              <div class="form-group">
                <label >Chon Phan Quyen Cha</label>
                <select class="form-control"  name="module_parent"  >
                  <option value="">Chon ten module</option>}
                  option
                  @foreach(config('permissions.table_module') as $moduleItem)
                  <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                  
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <div class="row">
                  @foreach(config('permissions.module_childrent') as $moduleItemChildrent)
                  <div class="col-md-3">
                    <label for=""><input type="checkbox" name="module_childrent[]" value="{{$moduleItemChildrent}}">{{$moduleItemChildrent}}</label>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection