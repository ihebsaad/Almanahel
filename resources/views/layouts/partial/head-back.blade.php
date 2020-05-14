 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="eSolutions">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{  URL::asset('public/site/img/favicon.png') }}">
    <meta charset="UTF-8">
    <title>
        @section('title')
            | Al Manahel
        @show
    </title>
 <style>
     #swal2-content{font-size:15px;}
	 .editor{width:800px;}
	 #mytable_filter{position:fixed!important;right:5px!important;}
     </style>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <!-- CSRF Token -->
 {{ csrf_field() }}
 
 <!-- <script  src="{{ asset('public/js/jquery-3.5.1.js') }}"  type="text/javascript"></script> -->
<!-- --------->

<?php if  ($view_name != 'messagechat-messagerie')   { ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php }?>
       <!-- CSS DAtatable  

<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/buttons.bootstrap.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/datatables/css/scroller.bootstrap.css') }}" />
 -->
  <link  href="{{ asset('public/sbadmin/datatables/dataTables.bootstrap4.css') }}"  rel="stylesheet">

 
   <link rel="stylesheet" href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}">
 
   
 <link href="{{ URL::asset('public/css/datepicker.css') }}" rel="stylesheet">
 
  
    <!-- include alertify css -->

<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/alertify.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/alertify-bootstrap.css') }}">

<!-- include alertify script -->
<script src="{{ URL::asset('resources/assets/js/alertify.js') }}"></script>

  
 <link href="{{ asset('public/js/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
 <link href="{{ asset('public/js/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>

 
<script>

  /*  $(document).ready(function(){

	});*/
</script>
 
  <!-- Custom fonts for this template-->
  <link href="{{ asset('public/sbadmin/fontawesome-free/css/all.min.css') }}"    rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link  href="{{ asset('public/sbadmin/css/sb-admin-2.min.css') }}"    rel="stylesheet">

</head>