<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <title>Login/Register</title>
    <title>landing</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">

    <!-- Core Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Google -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Icon font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/kustomlanding.css" rel="stylesheet">
</head>
<body style="background-image: url(<?php echo base_url('assets/images/slider1.png') ?>); background-size: contain; background-repeat: no-repeat; ">

    <section class="wrapper-login">
        <div class="container login-panel">
            <div class="row">
                <div class="col-md-6 kontens">
                    <h1 class="display-4" style="font-weight: bold; color: black">United Group</h1>
                    <h2 style="font-weight: bold; color: black">Your Leading Mobile Phone Manufacturer</h2>
                </div>

                <div class="col-md-12 sideright">
                    <div id="accordion">
                        <?php echo $this->session->flashdata('msg')?>


                        <div class="staflogin">
                            <div data-toggle="collapse" data-target="#colLogin" aria-expanded="false" aria-controls="collapseTwo" align="center">
                                <h3 style="color: white"><strong>United Group Login</strong></h3>
                            </div>
                            <div id="colLogin" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="<?php echo base_url().'Login/auth'?>" method="post" autocomplete="off">
                                        <input type="email" class="inputan" name="email" placeholder="Email">
                                        <input type="password" class="inputan" name="password" placeholder="Password">
                                        <button type="submit" class="butlogin" name="save">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="signup">
                            <div data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" align="center">
                                <h3 style="color: white"><strong>Vendor Sign Up</strong></h3>
                            </div   >
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <form class="" action="<?php echo base_url().'Login/vendor'?>" method="post" autocomplete="off">
                                        <input type="text" class="inputan" name="company" placeholder="Company Name">
                                        <input type="text" class="inputan" name="address" placeholder="Address">
                                        <input type="text" class="inputan" name="contact" placeholder="Contact">
                                        <input type="text" class="inputan" name="email" placeholder="Email">
                                        <input type="text" class="inputan" name="npwp" placeholder="NPWP Number">
                                        <input type="text" class="inputan" name="siup" placeholder="SIUP Number">
                                        <input type="text" class="inputan" name="bidang_usaha" placeholder="Bidang Usaha">

                                        <input type="password" class="inputan" name="password" placeholder="Password">
                                        <button type="submit" class="buttonku" name="save">Sign Up</button>
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo base_url() ?>assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
</body>
</html>
