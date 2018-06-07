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
                                <h4 class="card-title">Notifications Purchase Order</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>PO Number</th>
                                                <th>Delivery Address</th>
                                                <th>Delivery Date</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($notif_vendor->result() as $cu):?>
                                            <tr align="center">
                                                <td><?php echo $cu->nomor_po ?></td>
                                                <td><?php echo $cu->alamat_pengiriman ?></td>
                                                <td><?php echo $cu->deadline_pengiriman ?></td>
                                                <td><?php echo number_format($cu->total_harga) ?></td>
                                                <td><?php echo $cu->status ?></td>

                                                <td align="center"><a href="<?php echo base_url().'Vendor/views/'.$cu->id_po?>"><button class="btn btn-success btn-rounded m-b-10 m-l-5">View</button></a></td>
                                            </tr>
                                          <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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
