
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
                                <h4 class="m-b-0 text-white">Add User</h4>
                            </div>
                            <br>
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo base_url().'Master/save_user'?>" method="post" autocomplete="off">

                                  <div class="form-group row">
                                      <div class="col-md-3">
                                          <label class="control-label">Fullname</label>
                                      </div>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="fullname" required >
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-md-3">
                                          <label class="control-label">Employee ID</label>
                                      </div>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="nik_karyawan" required >
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-md-3">
                                          <label class="control-label">Email</label>
                                      </div>
                                      <div class="col-md-9">
                                          <input type="email" class="form-control" id="email" name="email" onkeyup="checkemail()" required>
                                          <span id="email_status"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-md-3">
                                          <label class="control-label">Phone Number</label>
                                      </div>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" id="nohp" name="nohp" required >
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-md-3">
                                          <label class="control-label">Assignment</label>
                                      </div>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="jabatan" required>
                                      </div>
                                  </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="control-label">Level</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select type="text" class="form-control"  name="level" id="level" required>
                                          <option value="">-Select-</option>
                                          <option value="Manager">Manager</option>
                                          <option value="Supervisor">Supervisor</option>
                                          <option value="Budget">Budget</option>
                                          <option value="Accounting">Accounting</option>
                                          <option value="Treasury">Treasury</option>
                                          <option value="Procurement">Procurement</option>
                                          <option value="Procurement Staff">Procurement Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="control-label">Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                      <button type="submit" class="btn btn-success btn-rounded m-b-10 m-l-5">Save</button>
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
      function checkemail(){
        var email = document.getElementById("email").value;
        if(email){
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url().'Master/cekemail'?>',
            data : {
              email_user:email,
            },
            success: function(response){
              $('#email_status').html(response);
              if(response=="OK"){
                return true;
              }else{
                return false;
              }
            }
          });
        }else{
          $('#email_status').html("");
          return false;
        }
      }

    function checkall(){
      var email_status = document.getElementById('email_status');
      if(email_status=='OK'){
        return true;
      }else{
        return false;
      }
    }
  </script>


</body>

</html>
