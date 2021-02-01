 @extends('layouts.admin')
 @section('tittle')
   
  <title>Settings</title>
@endsection
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partial.content_header',['name'=>'Settings','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class=col-md-12>
            <form action="{{route('settings.update',['id'=>$setting->id])}}" method="post">
              @csrf
              <div class="form-group">
                <label >Config key</label>
                <input class="form-control @error('config_key') is->invalid  @enderror"  name="config_key" value="{{$setting->config_key}}"   placeholder="mời nhâp config key">
                 @error('config_key')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
               
              </div>
              @if(request()->type ==='Text')
                 <div class="form-group">
                    <label >Config value</label>
                    <input class="form-control @error('config_name') is->invalid  @enderror" name="config_name" value="{{$setting->config_value}}"  placeholder="mời nhâp config value">
                     @error('config_name')
                   <div class=" alert alert-danger">
                     {{$message}}
                  </div>
                 @enderror
               
                </div>


                @elseif(request()->type ==='Textarea')
                  <div class="form-group">
                    <label >Config value</label>
                    
                    <textarea row="5" class="form-control @error('config_name') is->invalid  @enderror" placeholder="mời nhâp config value area"  type ="text" name="config_name">{{$setting->config_value}}</textarea>
                    @error('config_name')
                       <div class=" alert alert-danger">
                         {{$message}}
                      </div>
                 @enderror
               
                </div>

              @endif
              
           
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