<div class="page-wrapper">
            <!-- Bread crumb -->

            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Invoice Purchase Order</h4>
                                <?php foreach($data_gambar->result() as $pict):?>
                                <img src="<?php echo base_url().'assets/images/invoice/'.$pict->nama_dokumen?>" class="img-resposive">
                              <?php endforeach ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- The Modal -->

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
    <script src="<?php echo base_url() ?>assets/js/lib/jquery/jquery.min.js"></script>
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


    <script src="<?php echo base_url() ?>assets/js/lib/datatables/datatables.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/lib/datatables/datatables-init.js"></script>
</body>

</html>
