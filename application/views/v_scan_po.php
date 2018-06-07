
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->

            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Purchase Order</h4>
                            </div>
                            <br>
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo base_url().'Purchase_order/ocr'?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                  <div class="form-group">

                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                          Browse… <input type="file" id="imgInp" name="pict_po">
                                        </span>
                                      </span>
                                      <input type="text" class="form-control" readonly>

                                    </div>
                                    <img id='img-upload' class="img-responsive">
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-md-3">
                                      </div>
                                      <div class="col-md-9">
                                        <button type="submit" class="btn btn-success btn-rounded m-b-10 m-l-5">Scan</button>
                                      </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> PT.Wallezz Finansial Teknologi <a href="https://wallezz.com">Wallezz.com</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url() ?>assets/js/lib/jquery/jquery.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>



    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>

    <script type="text/javascript">
  $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
  });
  </script>

  <script type="text/javascript">
      $('.tokken_button').click(function() {

        $.ajax({
            url: '<?php echo base_url()?>Purchase_order/token',
            type: 'POST',
            data: {'submit':true}, // An object with the key 'submit' and value 'true;
            success: function (result) {
              alert("Your token has been created");
            }
        });

        });
    </script>


</body>

</html>
