<!DOCTYPE html>
<html>
<head>
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

    <style type="text/css">
        h5 {
              display: inline-block;
              padding: 10px;
              background: #B9121B;
              border-top-left-radius: 10px;
              border-top-right-radius: 10px;
            }

            .full-screen {
              background-size: cover;
              background-position: center;
              background-repeat: no-repeat;
            }
        body, html { height: 100%; }
        .bgku {
                /* The image used */
                background-image: url("<?php echo base_url('assets/images/slider1.png') ?>");

                /* Full height */
                height: 100%; 

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        .tombol { width: 70%; height: 90%; color: white}
        .tombolRev { width: 70%; height: 90%; }
        .xx { padding: 1%; }
        /*div {  border: solid black 1px; }*/

    </style>

</head>
<body class="landing-pg">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div class="bgku">
        <nav class="navbar fixed-top">
                <!-- Logo -->
            <div class="navbar-header" style="background-color: #d42628;" align="center"> 
                <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                    <img src="<?php echo base_url() ?>assets/images/einvoice.png" height="50" alt="homepage" class="dark-logo">
                </a>
            </div>
        </nav>
        <div class="row mg-2" style="padding-top: 70vh; ">
            <div class="col-md-3 offset-md-1 xx">
                <!-- <a  class="btn tombol" href="<?php echo site_url() ?>Login/signinup">Login</a> -->
                <a href="#" class="btn tombolRev" data-toggle="modal" data-target="#exampleModal">
                    Sign-In/Up
                </a>
            </div>
            <!-- Button trigger modal -->
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
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
            </div>
        </div>

    </div>

    <script src="<?php echo base_url() ?>assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>

    <script type="text/javascript">
        var $item = $('.carousel-item'); 
        var $wHeight = $(window).height();
        $item.eq(0).addClass('active');
        $item.height($wHeight); 
        $item.addClass('full-screen');

        $('.carousel img').each(function() {
          var $src = $(this).attr('src');
          var $color = $(this).attr('data-color');
          $(this).parent().css({
            'background-image' : 'url(' + $src + ')',
            'background-color' : $color
          });
          $(this).remove();
        });

        $(window).on('resize', function (){
          $wHeight = $(window).height();
          $item.height($wHeight);
        });

        $('.carousel').carousel({
          interval: 60000,
          pause: "false"
        });
    </script>
</body>
</html>