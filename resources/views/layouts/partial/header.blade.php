<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Flora Cares</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/backend/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/backend/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/backend/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/backend/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/backend/dashboard">Flora Cares</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ Auth::user()->image }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="/home"><i class="material-icons">person</i>Profile</a></li>
                            
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>  
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            @if(Auth::user()->role_id==1)
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="/backend/dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/backend/home">
                            <i class="material-icons">account_circle</i>
                            <span>User Create</span>
                        </a>
                    </li>
                    <li>
                        <a href="/backend/specialization">
                            <i class="material-icons">school</i>
                            <span>Specialization</span>
                        </a>
                    </li>
                    <li>
                        <a href="/backend/clinic">
                            <i class="material-icons">event_seat</i>
                            <span>Clinic</span>
                        </a>
                    </li>
                    <li>
                        <a href="/backend/clinic_detail">
                            <i class="material-icons">view_list</i>
                            <span>Clinic Detail</span>
                        </a>
                    </li>

                    <li>
                        <a href="/backend/appointment/adminview">
                            <i class="material-icons">bookmark</i>
                            <span>Appointment</span>
                        </a>
                    </li>

                    <li>
                        <a href="/backend/feedback">
                            <i class="material-icons">feedback</i>
                            <span>Feedback</span>
                        </a>
                    </li>

                    <li>
                        <a href="/backend/bankinfo">
                            <i class="material-icons">account_balance</i>
                            <span>Bank</span>
                        </a>
                    </li>

                    <li>
                        <a href="/backend/payment">
                            <i class="material-icons">payment</i>
                            <span>payment</span>
                        </a>
                    </li>

                    <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/backend/report/user" style="color:black !important;">Total User Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/clinic" style="color:black !important;">Clinic Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/appointment" style="color:black !important;">Total Booking Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/appointmentaccept" style="color:black !important;">Accepted Booking Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/appointmentdeny" style="color:black !important;">Denied Booking Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/appointmentpending" style="color:black !important;">Pending Booking Report</a>
                            </li>
                            <li>
                                <a href="/backend/report/appointmentexpire" style="color:black !important;">Expire Booking Report</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                </ul>
            </div>

            @else

            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="/backend/dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="/backend/payment">
                            <i class="material-icons">payment</i>
                            <span>payment</span>
                        </a>
                    </li>

                    <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">text_fields</i>
                            <span>Booking</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/backend/appointment" style="color:black !important;">New Booking</a>
                            </li>
                            <li>
                                <a href="/backend/appconfirm" style="color:black !important;">Confirmed Booking</a>
                            </li>
                            <li>
                                <a href="/backend/appreject" style="color:black !important;">Reject Booking</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="/home">
                            <i class="material-icons">account_circle</i>
                            <span>Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="/backend/clinic">
                            <i class="material-icons">accessibility</i>
                            <span>Clinic</span>
                        </a>
                    </li>   
                    
                </ul>
            </div>
            <!-- #Menu -->
            @endif