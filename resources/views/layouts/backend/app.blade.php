<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') - {{ config('app.name', 'POS') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- jQuery -->
  <script src="{{asset('public/assets/backend/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Notify -->
  <style type="text/css">
    .notifyjs-corner{
      z-index: 10000 !important;
    }
  </style> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Sweetalert -->
  <script src="{{asset('public/assets/backend/sweetalert/sweetalert.js')}}"></script>
  <link href="{{asset('public/assets/backend/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/datepicker')}}/daterangepicker.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts.backend.includes.header') 
   
    @include('layouts.backend.includes.sidebar') 

    @yield('content')

    @if(session()->has('success'))
      <script type="text/javascript">
        $(function(){
          $.notify("{{session()->get('success')}}",{globalPosition:'top right', className:'success'});
        });
      </script>
    @endif
    @if(session()->has('error'))
      <script type="text/javascript">
        $(function(){
          $.notify("{{session()->get('error')}}",{globalPosition:'top right', className:'error'});
        });
      </script>
    @endif

  @include('layouts.backend.includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/assets/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/assets/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/assets/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/assets/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/assets/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/assets/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/assets/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/assets/backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/assets/backend/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('public/backend/validation/validate.min.js')}}"></script>
<!-- <script src="{{asset('public/assets/backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script> -->
<script src="{{asset('public/assets/backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('public/assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('public/assets/backend/plugins/handlebar/handlebars-v4.0.12.js') }}"></script>
<script type="text/javascript" src="{{asset('public/backend/datepicker')}}/daterangepicker.js"></script>
<script type="text/javascript" src="{{asset('public/backend/datepicker')}}/locales.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Delete -->
<script>
  $(document).ready(function(){
    $(document).on('click', '#delete', function(){
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            type: "success",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    url:actionTo,
                    type: 'post',
                    data: {id:id, _token:token},
                    success: function(data){
                        swal({
                            title: "Deleted!",
                            type: "success"
                        },
                        function(isConfirm){
                            if(isConfirm){
                                $('.' + id).fadeOut();
                            }
                        });
                    }
                });
            }else{
                swal("Cancelled", "", "error");
            }
        });
        return false;
    });
  });      
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

<!-- search combo box -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()  

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    }) 
      
  })
</script>

<script type="text/javascript">
  $(function() {
    $('.singledatepicker').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoUpdateInput: false,
        // drops: "up",
        autoApply:true,
        locale: {
          format: 'DD-MM-YYYY',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
          firstDay: 0
        },
        minDate: '01/01/1930',
      },
      function(start) {
        this.element.val(start.format('DD-MM-YYYY'));
        this.element.parent().parent().removeClass('has-error');
      },
      function(chosen_date) {
        this.element.val(chosen_date.format('DD-MM-YYYY'));
      });
    
    $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
      $(this).trigger('change');
    });
  });
</script>

</body>
</html>
