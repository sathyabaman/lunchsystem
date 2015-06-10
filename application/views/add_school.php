<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <title>Dashboard -Lunch</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>template/assets/global/images/favicon.png" type="image/png">
    <link href="<?php echo base_url(); ?>template/assets/global/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/assets/global/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/assets/global/css/ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/assets/admin/layout1/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url(); ?>template/assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/assets/global/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>

  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>

        <?php $this->load->view('sidebar');?>


      <div class="main-content">

      <?php $this->load->view('topbar');?>
      
        
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default no-bd">
                <div class="panel-header bg-dark">
                  <h2 class="panel-title"><strong>Sign Up</strong> a school</h2>
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form id="frm_add_school" role="form" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("administrator/add_school/");?>">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">School Name</label>
                              <label style="color:red;" id="scl_name_error"></label>
                              <div class="append-icon">
                                <input type="text" id="scl_name" name="scl_name" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Email Address</label>
                              <label style="color:red;" id="scl_email_error"></label>
                              <div class="append-icon">
                                <input type="email" id="scl_email" name="scl_email" class="form-control" placeholder="Enter your email..." required>
                                <i class="icon-envelope"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Phone Number</label>
                                      <label style="color:red;" id="scl_Phonenumber_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="scl_Phonenumber" name="scl_Phonenumber" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Address</label>
                                      <label style="color:red;" id="scl_Address_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="scl_Address" name="scl_Address" class="form-control" placeholder="Enter your address..." required>
                                          <i class="icon-envelope"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Password</label>
                              <label style="color:red;" id="scl_password_error"></label>
                              <div class="append-icon">
                                <input type="password" id="scl_password" name="scl_password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                <i class="icon-lock"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Repeat your password</label>
                              <label style="color:red;" id="scl_password2_error"></label>
                              <div class="append-icon">
                                <input type="password" id="scl_password2" name="scl_password2" class="form-control" placeholder="Must be equal to your first password..." minlength="4" maxlength="16" required>
                                <i class="icon-lock"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Time of Lunch</label>
                                      <label style="color:red;" id="scl_TimeofLunch_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="scl_TimeofLunch" name="scl_TimeofLunch" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Total Number Of Student</label>
                                      <label style="color:red;" id="scl_TotalNumberOfStudent_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="scl_TotalNumberOfStudent" name="scl_TotalNumberOfStudent" class="form-control" placeholder="Enter a number..." required>
                                          <i class="icon-envelope"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">School Picture</label>
                              <div class="file">
                                <div class="option-group">
                                  <span class="file-button btn-primary">Choose File</span>
                                  <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;" required>
                                  <input type="text" class="form-control" name="uploader" id="uploader" placeholder="no file selected" readonly="">
                                </div>
                              </div>
                            </div>
                          </div>                          
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Admin Name</label>
                              <label style="color:red;" id="scl_admin_name_error"></label>
                              <div class="option-group">
                                  <div class="append-icon">
                                  <input type="text" id="scl_admin_name" name="scl_admin_name" class="form-control" placeholder="Enter your email..." required>
                                  <i class="icon-envelope"></i>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">                          
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Are you OK with our terms?</label>
                              <label style="color:red;" id="scl_terms_error"></label>
                              <div class="option-group">
                                <label  for="terms" class="m-t-10">
                                <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue" required/>
                                I agree with terms and conditions
                                </label>    

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center  m-t-20">
                          <button type="submit" id="submit_school" name="submit" class="btn btn-embossed btn-primary">Sign Up</button>
                          <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $this->load->view('footer');?>

        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>
    <!-- BEGIN QUICKVIEW SIDEBAR -->

    <!-- END QUICKVIEW SIDEBAR -->
    <!-- BEGIN SEARCH -->
    <div id="morphsearch" class="morphsearch">
      <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..."/>
        <button class="morphsearch-submit" type="submit">Search</button>
      </form>
      <!-- /morphsearch-content -->
      <span class="morphsearch-close"></span>
    </div>
    <!-- END SEARCH -->
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
   <?php $this->load->view('footer_links');?>

    <!-- BEGIN PAGE SCRIPTS -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
    <!-- END  PAGE SCRIPTS -->
    <script src="<?php echo base_url(); ?>template/assets/admin/layout1/js/layout.js"></script>

    <?php $this->load->view('add_school_script');?>

  </body>
</html>

