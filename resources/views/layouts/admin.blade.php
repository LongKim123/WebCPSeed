	<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @yield('tittle')

  <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('public/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  


  
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">


  <!-- Navbar -->
 @include('partial.header')
  <!-- /.navbar -->
 @include('partial.siderbar')
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('public/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="{{asset('public/ckeditor/ckfinder/ckfinder.js')}}"></script>

   <script>
    CKFinder.setupCKEditor();
CKEDITOR.replace( 'ckeditor' );  
var editor = CKEDITOR.replace( 'ckeditor' );
CKFinder.setupCKEditor( editor, {
    skin: 'jquery-mobile',
    swatch: 'b',
    onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
            var file = evt.data.files.first();
            console.log( 'Selected: ' + file.get( 'name' ) );
        } );
    }
} );
   </script>
   <script type="text/javascript"  src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
   <script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
     $(document).ready( function () {
    $('#myTable1').DataTable();
} );
   </script>
  @yield('js')
</body>
</html>
