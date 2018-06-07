<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/logo/envoice-black.png">
    <title>Envoice</title>


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-material-datetimepicker.css" />
    <link href="<?php echo base_url() ?>assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/kustomisasi.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url().'home'?>">
                        <!-- Logo icon -->
                      <img src="<?php echo base_url() ?>assets/images/einvoice.png" height="30" alt="homepage" class="dark-logo" >
                        <!--End Logo icon -->
                        <!-- Logo text -->

                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->

                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->

                                            <!-- Message -->

                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title"></div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->

                                            <!-- Message -->
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url() ?>assets/images/logo/user.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="<?php echo base_url().'Login/logout'?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li class="nav-devider"></li>
                                <li class="nav-label">Home</li>
                                <li> <a class="has-arrow  " href="<?php echo base_url().'Home'?>" aria-expanded="false"><i class="fas fa-chart-bar"></i><span class="hide-menu">Dashboard </span></a>

                                </li>
                                  <?php if($this->session->userdata('level')!='Vendor'):?>
                                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">Purchase Order</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                      <?php if($this->session->userdata('level')=='Procurement'):?>
                                        <li ><a href="<?php echo base_url().'Purchase_order'?>">Purchase Order</a></li>
                                      <?php endif;
                                      if($this->session->userdata('level')=='Accounting'):
                                      ?>
                                        <li><a href="<?php echo base_url().'Accounting'?>">Accounting</a></li>
                                      <?php endif;
                                      if($this->session->userdata('level')=='Treasury'): ?>
                                        <li><a href="<?php echo base_url().'Request/budget'?>">Treasury</a></li>
                                      <?php endif;
                                      if($this->session->userdata('level')=='Procurement Staff'):
                                      ?>
                                        <li><a href="<?php echo base_url().'Purchase_order/delivery'?>">Delivery Notes</a></li>
                                      <?php endif?>
                                    </ul>
                                </li>
                              <?php endif ?>
                                <?php if($this->session->userdata('level')!='Vendor'):?>
                                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Master Data</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="<?php echo base_url().'Master/users'?>">Users Group</a></li>

                                    </ul>
                                </li>
                              <?php endif; if($this->session->userdata('level')=='Vendor'){?>
                                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-suitcase"></i><span class="hide-menu">Vendor</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="<?php echo base_url().'Vendor/notifications'?>">Notifications</a></li>
                                        <li><a href="<?php echo base_url().'Vendor/delivery'?>">Delivery Notes</a></li>
                                        <li><a href="<?php echo base_url().'Invoice'?>">Invoice</a></li>
                                    </ul>
                                </li>
                              <?php } ?>



							  <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-unlock-alt"></i><span class="hide-menu">Change Password</span></a>
							  <li> <a class="has-arrow" href="<?php echo base_url().'login/logout'?>" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Logout</span></a>

                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </div>
