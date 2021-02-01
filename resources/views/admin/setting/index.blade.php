 @extends('layouts.admin')
 @section('tittle')
   
  <title>Trang chủ</title>
@endsection
@section('js')
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/main.js')}}" type="text/javascript" charset="utf-8" async defer></script>
  
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.content_header',['name'=>'Setting','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class ="col-md-12">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu">
               <li > <a class="dropdown-item" href="{{route('settings.create').'?type=Text'}}" >text</a></li>
               <li > <a class="dropdown-item" href="{{route('settings.create').'?type=Textarea'}}" >textArea</a></li>
              </div>
            </div>
          
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Config key</th>
                  <th scope="col">Config value</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
               @foreach($setting as $settingItem)
                <tr>

                  <th scope="row">{{$settingItem->id}}</th>
                  <td>{{$settingItem->config_key}}</td>
                  <td>{{$settingItem->config_value}}</td>
                  <td>{{$settingItem->type}}</td>
                  <td>  
                     <a href="{{route('settings.edit',['id'=>$settingItem->id]). '?type='. $settingItem->type}}" class="btn btn-default">Edit</a>
                     <a data-url="{{route('settings.delete',['id'=>$settingItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                    
                  </td>
                  
                </tr>
                @endforeach
                
              
              
              </tbody>
            </table>
           
          </div>
           <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {{$setting->links()}}
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