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
                                <h4 class="card-title">Users</h4>
                                <div class="table-responsive m-t-40">
                              <a href="<?php echo base_url().'master/user_add'?>"><button type="button" class="btn btn-success m-b-10 m-l-5">Add User</button></a>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Assignment</th>
                                                <th>Email</th>
                                                <th>Level</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($users->result() as $cu):?>
                                            <tr align="center">
                                                <td><?php echo $cu->nik_karyawan ?></td>
                                                <td><?php echo $cu->full_name ?></td>
                                                <td><?php echo $cu->jabatan ?></td>
                                                <td><?php echo $cu->email ?></td>
                                                <td><?php echo $cu->level ?></td>

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
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/datatables/datatables-init.js"></script>
</body>

</html>
