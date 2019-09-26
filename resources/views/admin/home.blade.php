
@extends('admin.dashboard')
@section('title', 'NEW')
@section('dashboard', 'active selected')
@section('main-content')

@if(session('success') || session('error'))
<div class="page-body">
<!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
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
        </div>
    </div>
</div>
@endif

<div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-purple">50</h4>
                                    <h6 class="text-muted m-b-0">All Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">10% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">100</h4>
                                    <h6 class="text-muted m-b-0">Booking</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-file-text-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">20% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">145</h4>
                                    <h6 class="text-muted m-b-0">Task Completed</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-calendar-check-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">20</h4>
                                    <h6 class="text-muted m-b-0">Expired Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-hand-o-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">25% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-purple">50</h4>
                                    <h6 class="text-muted m-b-0">All Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">10% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">100</h4>
                                    <h6 class="text-muted m-b-0">Booking</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-file-text-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">20% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">145</h4>
                                    <h6 class="text-muted m-b-0">Task Completed</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-calendar-check-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">20</h4>
                                    <h6 class="text-muted m-b-0">Expired Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-hand-o-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">25% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-purple">50</h4>
                                    <h6 class="text-muted m-b-0">All Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">10% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">100</h4>
                                    <h6 class="text-muted m-b-0">Booking</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-file-text-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">20% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">145</h4>
                                    <h6 class="text-muted m-b-0">Task Completed</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-calendar-check-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">20</h4>
                                    <h6 class="text-muted m-b-0">Expired Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-hand-o-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">25% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-purple">50</h4>
                                    <h6 class="text-muted m-b-0">All Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">10% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">100</h4>
                                    <h6 class="text-muted m-b-0">Booking</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-file-text-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">20% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">145</h4>
                                    <h6 class="text-muted m-b-0">Task Completed</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-calendar-check-o f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">20</h4>
                                    <h6 class="text-muted m-b-0">Expired Users</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-hand-o-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">25% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>


@endsection