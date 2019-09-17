  
  <div id="noty-holder"></div><!-- HERE IS WHERE THE NOTY WILL APPEAR-->

<div class="navbar-wrapper">
    <div class="navbar-logo">
        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="javascript:void(0)">
            <i class="ti-menu"></i>
        </a>
        <div class="mobile-search waves-effect waves-light">
            <div class="header-search">
                <div class="main-search morphsearch-search">
                    <div class="input-group">
                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Keyword">
                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" style="display: inline-block;float: none; width: 157px;height: 58px;">
            <img class="" src="{{ asset('/files/assets/logo/miynlogo.png') }}" style="display: inline-block;float: none; width: 75px;height: 58px;" alt="miyn-Logo" />
            <!-- <img class="img-fluid" src="{{ asset('/files/assets/images/logo.png') }}" alt="Theme-Logo" /> -->
        </a>
        <a class="mobile-options waves-effect waves-light">
            <i class="ti-more"></i>
        </a>
    </div>

    <div class="navbar-container container-fluid">
        <ul class="nav-left">
            <li>
                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
            </li>
            <li class="header-search">
                <div class="main-search morphsearch-search">
                    <div class="input-group">
                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Keyword">
                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                    </div>
                </div>
            </li>
            <li>
                <a href="javascript:void(0)" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                    <i class="ti-fullscreen"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            
           
            <li class="user-profile header-notification">
                <a href="javascript:void(0)" class="waves-effect waves-light">
                    <img src="{{asset('/files/assets/images/avatar-blank.jpg')}}" class="img-radius" alt="User-Profile-Image">
                    <span>{{ucfirst(Auth::user()->name)}}</span>
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="show-notification profile-notification">
                    
                    <li class="waves-effect waves-light">
                        <a href="javascript:void(0)">
                            <i class="ti-user"></i> Profile
                        </a>
                    </li>

                    <li class="waves-effect waves-light">
                        <a href="#">
                            <i class="ti-settings"></i> Edit Password
                        </a>
                    </li>

                    <li class="waves-effect waves-light">
                        <a href="javascript:void(0)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>