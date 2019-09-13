<div class="sidebar_toggle">
    <a href="#"><i class="icon-close icons"></i></a>
</div>
<div class="pcoded-inner-navbar main-menu">
    <div class="">
        <div class="main-menu-header">
            <img class="img-80 img-radius" src="{{ asset('/files/assets/logo/miynlogo.png')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">user name</span>
            </div>
        </div>

        
    </div>
    <div class="p-15 p-b-0">

    </div>

    <ul class="pcoded-item pcoded-left-item">
       <li class="@yield('dashboard')">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>N</b></span>
                <span class="pcoded-mtext">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>  

        <li class="@yield('all_users')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
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

    <ul class="pcoded-item pcoded-left-item">
        
        <li class="pcoded-hasmenu ">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>OP</b></span>
                <span class="pcoded-mtext">Industry</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class="@yield('industry_add')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">Add Industry</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('industry_all')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext">All Industry</span>
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