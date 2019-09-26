@extends('admin.dashboard')

@section('title', 'All Package ')
@section('master', 'active pcoded-trigger')
@section('packages', 'active')


@section('styles')
 <!-- Data Table Css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">


    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/icofont/css/icofont.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/component.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">

    <style type="text/css">
      table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
          /*padding-right: 30px;
          padding-top: 10px;*/
          line-height: 2
      }
    </style>
    <style type="text/css">

  div.container { max-width: 1200px }

  table.dataTable thead > tr > th {
    padding-left: 8px;
    padding-right: 30px;
    padding-top: 5px;
    line-height: 1.5;

  }

  .pcoded .pcoded-navbar .pcoded-item > li {
            padding-top: 10px;
        }

  .footer {
      bottom : 0;
      height:60px;
      margin-top : 40px;
      font-family: 'Lato';
      background-color: #fff;
      color: #000;
      position: absolute;
      width: 100%;
      padding-right: 150px;
      text-align: center;

  }

</style>


@endsection

@section('styles')

@endsection
@section('page_header')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">All Packages</h5>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('main-content')

<div class="page-body">
    <!-- DOM/Jquery table start -->
    <div class="card">
        @if (session('success'))
          <div class="alert alert-success background-success">
                <strong>{{ session('success')}}</strong>
           </div>
        @endif
        @if (session('error'))
           <div class="alert alert-danger background-danger">
               {{ session('error')}}
           </div>
        @endif
        <div class="card-header">
            <h5>All Package list</h5>
            <span style="float: right;">

            	<a href="{{ route('modal.data') }}" pageName="Add New Package" data-remote="false" data-toggle="modal" data-target=".modal" class="btn btn-sm btn-primary waves-effect md-trigger"> Add New </a>

            	<button class="btn btn-sm btn-primary btn-danger" onclick="window.location.reload()" > Refresh </button>
            </span>
        </div>
        <div class="card-block">

        	<div class="">
                <table id="posts" class="display compact nowrap table-bordered" style="width:100%">
                    <thead>
                        <tr>
                           <th>Id</th>
                           <th>Name</th>
                           <th data-orderable="false">Description</th>
                           <th data-orderable="false">Created At</th>
                           <th width="100" data-orderable="false">Options</th>
                        </tr>
                    </thead>
			</table>

           
        </div>
    </div>

        
</div>

@endsection

@section('scripts')
<!-- data-table js -->
<script src="{{ asset('/files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/files/assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('/files/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('/files/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/files/assets/pages/data-table/js/data-table-custom.js') }}"></script>


"></script>
<!-- sweet alert js -->
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/modal.js') }}"></script>
<!-- sweet alert modal.js intialize js -->
<!-- modalEffects js nifty modal window effects -->
<script src="{{ asset('/files/assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('/files/assets/js/modalEffects.js') }}"></script>    



<script>
    $(document).ready(function () {
        $('#posts').DataTable({
            "processing": true,
            'responsive': true,
            "serverSide": true,
            "orderClasses": false,
            "ajax":{
                     "url": "{{ url('allposts') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "package_name" },
                { "data": "package_description" },
                { "data": "created_at" },
                { "data": "options" }
            ],
		

				"pageLength": 25,
					 dom: 'Bfrtip',
					buttons: [{
                  extend: "copy",
                  className: "btn-sm",
				  exportOptions: {
							
					   }
                },  {
                  extend: "print",
                  className: "btn-sm",
				  autoPrint: true,
					   customize: function ( win ) {
					 						
						},
						exportOptions: {
							columns:  ':not(:last-child)',
							columns: [ 0, 1, 2],
							
					   }
                },  {
                  extend: "excel",
                  className: "btn-sm",
				  autoPrint: true,
					   customize: function ( win ) {
					 						
						},
						exportOptions: {
							columns:  ':not(:last-child)',
							columns: [ 0, 1, 2],
							
					   }
                },  {
                  extend: "pdf",
                  className: "btn-sm",
				  autoPrint: true,
					   customize: function ( win ) {
					 						
						},
						exportOptions: {
							columns:  ':not(:last-child)',
							columns: [ 0, 1, 2],
							
					   }
                },  {
                  extend: "csv",
                  className: "btn-sm",
				  autoPrint: true,
					   customize: function ( win ) {
					 						
						},
						exportOptions: {
							columns:  ':not(:last-child)',
							columns: [ 0, 1, 2],
							
					   }
                }
				
				]
				
				

        });
    });
</script>

@endsection