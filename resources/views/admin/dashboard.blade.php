
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')  MIYN-DASHBOARD</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('/files/assets/logo/miynlogo.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('/files/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('/files/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">


    
     <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css') }}">
     <style type="text/css">
         #noty-holder{    
             width: 100%;    
             top: 0;
             font-weight: bold;    
             z-index: 1031; /* Max Z-Index in Fixed Nav Menu is 1030*/
             text-align: center;
             position: absolute;
         }

         .alert{
             margin-bottom: 2px;
             border-radius: 0px;
         }

         #main{
             min-height:900px;
         }

         .starter-template {
           padding: 40px 15px;
           text-align: center;
         }
     </style>
    
    @yield('styles')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
	
    <!-- modal start -->

    <div class="modal fade modal-flex" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal titles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body text-center">
               
                <p class="m-t-10"></p>
            </div>
           
        </div>
    </div>
    </div>

    <!-- modal end -->
	
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                @include('admin.partials.nav')
            </nav>
            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                      <i class="fa fa-chevron-left"></i>
                    </a>
                                <div class="right-icon-control">
                                    <form class="form-material">
                                        <div class="form-group form-primary">
                                            <input type="text" name="footer-email" class="form-control" id="search-friends" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        @include('admin.partials.leftsidebar')
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        @yield('page-header')
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    @yield('main-content')
                                </div>
								
								<div style="display:block; text-align:center;">
									Copyright © <?php echo date('Y') ?> MIYN. All Rights Reserved.
								</div>
								
                                <!-- <div id="styleSelector"> </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('/files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/files/assets/pages/widget/excanvas.js')}}"></script>
    <!-- waves js -->
    <script src="{{ asset('/files/assets/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('/files/bower_components/modernizr/js/modernizr.js')}}"></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="{{ asset('/files/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{ asset('/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    
	
    <!-- Google map js -->
    <!--    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true')}}"></script>
    <script type="text/javascript" src="{{ asset('/files/assets/pages/google-maps/gmaps.js')}}"></script>-->

    <!-- menu js -->
    <script src="{{ asset('/files/assets/js/pcoded.min.js')}}"></script>
    <script src="{{ asset('/files/assets/js/vertical/vertical-layout.min.js')}}"></script>
    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('/files/assets/js/script.js')}}"></script>

    <script type="text/javascript">
        
        // Fill modal with content from link href
$(".modal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
        //alert(link.attr("href"));
     //$(".modal-body").load(link.attr("href"));
     $(".modal-title").html(link.attr("pageName"));
      var variable = link.attr("href");
     // alert(variable+'Myname');
      if( typeof variable === 'undefined' || variable === null ){
    // Do stuff
        // alert('called');
      } else {
         $('.modal-body').html('<div style="display:block; text-align:center">loading...</div>');
           $(".theme-loader").fadeIn("slow");
           //alert(variable);
           $.ajax({
                type: 'get',
                url: link.attr("href"),
                //data:{id: id},
                success: function(data) {
                    $(".theme-loader").fadeOut("slow");
                    $('.modal-body').html(data);
                },
                error:function(err){
                  alert("error"+JSON.stringify(err));
                }
            });
      } 
});


    </script>

    @yield('scripts')
</body>

</html>
