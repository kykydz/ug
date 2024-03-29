
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->

            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <?php foreach($data_view->result_array() as $row):?>
                    <div class="col-md-12">
                        <div class="card card-outline-primary">
                             <div class="card-header">
                                 <h4 class="m-b-0 text-white">Delivery Notes For PO <?php echo $row['nomor_po']?></h4>
                             </div>
                             <br>
                             <div class="card-body">
                               <div class="form-group row">
                                   <div class="col-md-3">
                                       <label class="control-label">Vendor Name</label>
                                   </div>
                                   <div class="col-md-9">
                                       <input type="text" class="form-control" value="<?php echo $row['nama_vendor']?>" readonly >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <div class="col-md-3">
                                       <label class="control-label">Invoicing To</label>
                                   </div>
                                   <div class="col-md-9">
                                       <input type="text" class="form-control" value="<?php echo $row['alamat_penagihan']?>" readonly >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <div class="col-md-3">
                                       <label class="control-label">Delivery To</label>
                                   </div>
                                   <div class="col-md-9">
                                       <input type="text" class="form-control"  value="<?php echo $row['alamat_pengiriman']?>" readonly >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <div class="col-md-3">
                                       <label class="control-label">Delivery Date</label>
                                   </div>
                                   <div class="col-md-9">
                                       <input type="text" class="form-control" value="<?php echo $row['deadline_pengiriman']?>" readonly >
                                   </div>
                               </div>
                               <form  action="<?php echo base_url().'Purchase_order/pic_app'?>" method="post">

                                 <input type="hidden" name="id_po" value="<?php echo $row['id_po']?>">
                               <div class="form-group row">
                                   <div class="col-md-3">
                                       <label class="control-label">Token Approval</label>
                                   </div>
                                   <div class="col-md-5">
                                       <input type="text" class="form-control" name="token" required>
                                   </div>
                                  
                               </div>

                               <div class="form-group row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-9">
                                     <button type="submit" class="btn btn-success btn-rounded m-b-10 m-l-5">Accept</button>
                                   </div>
                               </div>
                             </form>
                             </div>
                          </div>


                    </div>

                    <div class="col-md-12">


                        <div class="card card-outline-primary">
                             <div class="card-header">
                                 <h4 class="m-b-0 text-white">Goods</h4>
                             </div>
                             <br>
                             <div class="card-body">

                                      <div class="row">
                                          <div class="col-md-12">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                  <tr>
                                                    <th>Name of Goods</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total Price</th>


                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach($data_barang->result() as $db):?>
                                                    <tr>
                                                    <td><?php echo $db->nama_barang?></td>
                                                    <td><?php echo $db->jumlah_barang?></td>
                                                    <td><?php echo $db->harga_satuan?></td>
                                                    <td><?php echo $db->total?></td>
                                                  </tr>
                                                  <?php endforeach ?>
                                                </tbody>
                                              </table>
                                          </div>
                                      </div>

                             </div>
                          </div>


                    </div>

                      <?php endforeach ?>
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



    <!--datatables-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>

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
