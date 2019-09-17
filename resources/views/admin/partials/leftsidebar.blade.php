<div class="sidebar_toggle">
    <a href="#"><i class="icon-close icons"></i></a>
</div>
<div class="pcoded-inner-navbar main-menu">
    <div class="">
        <div class="main-menu-header">
            <img class="img-80 img-radius" src="{{ asset('/files/assets/logo/miynlogo.png')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">{{ucfirst(Auth::user()->name)}}</span>
            </div>
        </div>

        
    </div>

    <ul class="pcoded-item pcoded-left-item">
       <li class="@yield('dashboard')">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>N</b></span>
                <span class="pcoded-mtext">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>        
    </ul>

    <ul class="pcoded-item pcoded-left-item">
        
        <li class="pcoded-hasmenu ">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>MS</b></span>
                <span class="pcoded-mtext">MASTER</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class="@yield('all_users')">
            <a href="{{ route('all-packages') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Packages</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Timezone</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Country</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Currencies</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Industry</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Business Category</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Features</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li> 
        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                <span class="pcoded-mtext">List of  Language</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>  
                
            </ul>
        </li>
        
    </ul>
    
    
    <ul class="pcoded-item pcoded-left-item">
        <li class="@yield('getting_started_onboard')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-check-box"></i><b>N</b></span>
                <span class="pcoded-mtext">Getting Started Onboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>
</div>