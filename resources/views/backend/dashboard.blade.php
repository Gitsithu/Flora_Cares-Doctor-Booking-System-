
@include('layouts.partial.master')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            @if(Auth::user()->role_id == 1)
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$total_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">Appointment</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$appointment_count}}</div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Doctors</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$user_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-brown hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Customer</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$user_counts}}</div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->

            <!-- Widgets -->
            
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">call_received</i>
                        </div>
                        <div class="content">
                            <div class="text">Accepted Appointment</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{$appointment_counts}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">home</i>
                        </div>
                        <div class="content">
                            <div class="text">Clinic</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{$clinic_count}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            @else

                <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$total_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">Appointment</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$appointment_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">call_received</i>
                        </div>
                        <div class="content">
                            <div class="text">Accepted Appointment</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{$appointment_counts}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">home</i>
                        </div>
                        <div class="content">
                            <div class="text">Clinic</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{$clinic_count}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            @endif
            
        </div>
    </section>

    



