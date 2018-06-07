
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
                    <div class="col-md-6">


                        <div class="card card-outline-primary">
                             <div class="card-header">
                                 <h4 class="m-b-0 text-white">Invoicing To</h4>
                             </div>
                             <div class="card-body">
                               <?php echo $row['alamat_penagihan']?>
                             </div>
                          </div>


                    </div>
                    <div class="col-md-6">


                        <div class="card card-outline-primary">
                             <div class="card-header">
                                 <h4 class="m-b-0 text-white">Delivery To</h4>
                             </div>
                             <div class="card-body">
                               <?php echo $row['alamat_pengiriman']?>
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
                               <form>
                               <div class="row">
                                 <input type="hidden" name="id_po" id="id_po" value="<?php echo $row['id_po']?>">
                                 <input type="hidden" name="id_vendor" id="id_vendor" value="<?php echo $row['id_vendor']?>">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Name Of Goods</label>
                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barangx" placeholder="Name of Goods" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="number" class="form-control" id="qty" name="qtyx" min="0" required placeholder="Quantity">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Unit Cost</label>
                                                    <input type="number" class="form-control" id="harga" name="harga_satuan" onkeyup="count_tot()" placeholder="Unit Cost" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control" id="total" name="totalx"  readonly>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                     function count_tot(){
                                                       var qty = document.getElementById('qty').value;
                                                       var harga = document.getElementById('harga').value;
                                                       var total = qty * harga ;
                                                       document.getElementById('total').value = total;
                                                     }
                                                 </script>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label style="color:#fff;">adfdsfs</label>
                                                    <button id="btn_simpan" class="form-control btn btn-success btn-rounded">Add</button>
                                                    <a href="<?php echo base_url().'Vendor/done_po/'.$row['id_po']?>" class="form-control btn btn-info btn-rounded">Done</a>
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                      <div class="row">
                                          <div class="col-md-12">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                  <tr>
                                                    <th>Name of Goods</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total Price</th>
                                                    <th>Action</th>

                                                  </tr>
                                                </thead>
                                                <tbody id="show_data">

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
  $(document).ready(function(){
    tampil_data_barang();	//pemanggilan fungsi tampil barang.

		$('#example').dataTable();
    function tampil_data_barang(){
		    $.ajax({
		        type  : 'ajax',
		        url   : "<?php echo base_url().'Vendor/data_barang/'.$this->uri->segment(3)?>",
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].nama_barang+'</td>'+
		                        '<td>'+data[i].jumlah_barang+'</td>'+
		                        '<td>'+data[i].harga_satuan+'</td>'+
		                        '<td>'+data[i].total+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<button id="btn_hapus" class="btn btn-danger" data="'+data[i].id_dn+'">Delete</button>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

  $('#btn_simpan').on('click',function(){
        var nama=$('#nama_barang').val();
        var harga=$('#harga').val();
        var qty=$('#qty').val();
        var total=$('#total').val();
        var id_po=$('#id_po').val();
        var id_vendor=$('#id_vendor').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Vendor/simpan_barang')?>",
            dataType : "JSON",
            data : {nama:nama , harga:harga, qty:qty, total:total, id_po:id_po, id_vendor:id_vendor},
            success: function(data){
                $('[name="nama_barangx"]').val("");
                $('[name="qtyx"]').val("");
                $('[name="harga_satuan"]').val("");
                $('[name="totalx"]').val("");
                tampil_data_barang();
            }
        });
        return false;
    });

    $('#btn_hapus').on('click',function(){
           var id=$(this).attr('data');
           $.ajax({
           type : "POST",
           url  : "<?php echo base_url('Vendor/hapus_barang')?>",
           dataType : "JSON",
                   data : {kode: id},
                   success: function(data){
                           tampil_data_barang();
                   }
               });
               return false;
           });
  });
    </script>


</body>

</html>
