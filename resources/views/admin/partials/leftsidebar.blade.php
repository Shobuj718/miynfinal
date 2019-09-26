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
            <a href="{{ url('/dashboard') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>N</b></span>
                <span class="pcoded-mtext">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>        
    </ul>

    <ul class="pcoded-item pcoded-left-item">
        
        <li class="pcoded-hasmenu @yield('master')">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-gift"></i><b>MS</b></span>
                <span class="pcoded-mtext">MASTER</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class="@yield('packages')">
                    <a href="{{ route('all-packages') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Packages</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('timezone')">
                    <a href="{{ route('all.timezone') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Timezone</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('country')">
                    <a href="{{ route('all.country') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Country</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('currency')">
                    <a href="{{ route('all.currency') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Currencies</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('industry')">
                    <a href="{{ route('all.industry') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Industry</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('business-category')">
                    <a href="{{ route('all.business.category') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Business Category</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('feature')">
                    <a href="{{ route('all.feature') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Features</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> 
                <li class="@yield('language')">
                    <a href="{{ route('all.language') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Language</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="@yield('business-wise-profession')">
                    <a href="{{ route('all.business.wise.profession') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-gift"></i><b>PA</b></span>
                        <span class="pcoded-mtext">List of  Business Wise Profession</span>
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