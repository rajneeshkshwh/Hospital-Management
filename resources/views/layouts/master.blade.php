<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Admin Panel</title>
  <!--favicon-->

  <!-- simplebar CSS-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
    <!--Bootstrap Datepicker-->
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
   <!--Data Tables -->
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <!--material datepicker css-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/material-datepicker/css/bootstrap-material-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Touchspin-->
  <link href="{{ asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('webassets/img/eoffice_logo.png') }}" rel="shortcut icon" type="image/png">
  
      <script type="text/javascript">
         function isNumberKey(evt) {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode != 46 && charCode > 31
                     && (charCode < 48 || charCode > 57))
                 return false;

             return true;
         }
      </script>

    <!-- notifications css -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}"/>    
</head>
<body>
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
     @include('layouts.sidebar')
   <!--End sidebar-wrapper-->

    <!--Start topbar header-->
       @include('layouts.header')
    <!--End topbar header-->

      <div class="clearfix"></div>
	
      <div class="content-wrapper">
        <div class="container-fluid">

          <!--Start Dashboard Content-->
    	  
                     @yield('content')

          <!--End Dashboard Content-->

        </div>
        <!-- End container-fluid-->
        
      </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	   @include('layouts.footer')
	<!--End footer-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
 
    <script src="{{ asset('assets/js/custom_validate.js') }}"></script>

  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
  <!-- simplebar js -->
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
  <!-- waves effect js -->
  <script src="{{ asset('assets/js/waves.js') }}"></script>
  <!-- sidebar-menu js -->
  <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/app-script.js') }}"></script>
  <!-- Chart js -->
  <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
  
  <!--Peity Chart -->
  <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
  <!-- Index js -->
  <script src="{{ asset('assets/js/index.js') }}"></script>
              <!--Bootstrap Datepicker Js-->
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
      $('#default-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
         format: 'yyyy-mm-dd'
      });
      $('#default-datepicker2').datepicker({
        autoclose: true,
        todayHighlight: true,
         format: 'yyyy-mm-dd'
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>
    <!--Data Tables js-->
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
 <script>
     $(document).ready(function() {
       var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
        });
      table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      });
    </script>

      <!--notification js -->
  <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>

</body>
</html>
