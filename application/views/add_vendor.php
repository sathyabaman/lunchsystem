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
                  <h2 class="panel-title"><strong>Sign Up</strong> a Vendor</h2>
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form id="frm_add_vender" role="form" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("administrator/add_vendor/");?>">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">vendor name</label>
                              <label style="color:red;" id="vendor_name_error"></label>
                              <div class="append-icon">
                                <input type="text" id="vendor_name" name="vendor_name" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Vendor Address</label>
                              <label style="color:red;" id="vendor_addr_error"></label>
                              <div class="append-icon">
                                <input type="text" id="vendor_addr" name="vendor_addr" class="form-control" placeholder="Enter your email..." required>
                                <i class="icon-envelope"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Vendor Email</label>
                                      <label style="color:red;" id="vendor_email_error"></label>
                                      <div class="append-icon">
                                          <input type="email" id="vendor_email" name="vendor_email" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Vendor Phone</label>
                                      <label style="color:red;" id="vendor_phone_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="vendor_phone" name="vendor_phone" class="form-control" placeholder="Enter your address..." required>
                                          <i class="icon-envelope"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Password</label>
                              <label style="color:red;" id="vendor_password_error"></label>
                              <div class="append-icon">
                                <input type="password" id="vendor_password" name="vendor_password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                <i class="icon-lock"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Repeat your password</label>
                              <label style="color:red;" id="vendor_password2_error"></label>
                              <div class="append-icon">
                                <input type="password" id="vendor_password2" name="vendor_password2" class="form-control" placeholder="Must be equal to your first password..." minlength="4" maxlength="16" required>
                                <i class="icon-lock"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Vendor Cell</label>
                                      <label style="color:red;" id="vendor_cell_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="vendor_cell" name="vendor_cell" class="form-control" placeholder="Minimum 3 characters..." >
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Vendor Admin</label>
                                      <label style="color:red;" id="vendor_admin_error"></label>
                                      <div class="append-icon">
                                          <input type="text" id="vendor_admin" name="vendor_admin" class="form-control" placeholder="Enter a number..." required>
                                          <i class="icon-envelope"></i>
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

    <?php $this->load->view('add_vender_script');?>

  </body>
</html>

