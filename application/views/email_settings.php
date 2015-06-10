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
                  <h2 class="panel-title"><strong>Email</strong> Settings</h2>
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form role="form" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("administrator/settings/");?>">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">SMTP Host</label>
                              <div class="append-icon">
                                <input type="text" name="smtp_host" value="<?php echo $email[0]->smtp_host; ?>" class="form-control"  required>
                                <i class="icon-user"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Email Address</label>
                              <div class="append-icon">
                                <input type="email" name="email" value="<?php echo $email[0]->email; ?>" class="form-control"  required>
                                <i class="icon-envelope"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Password</label>
                                      <div class="append-icon">
                                          <input type="text" name="password" value="<?php echo $email[0]->password; ?>" class="form-control" required>
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>
                              
                          </div>

               


                        <div class="text-center  m-t-20">
                          <button type="submit" id="submit_school" name="submit" class="btn btn-embossed btn-primary">Update Email Settings</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>




            <div class="col-md-12">
              <div class="panel panel-default no-bd">
                <div class="panel-header bg-dark">
                  <h2 class="panel-title"><strong>Payment</strong> Settings</h2>
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form role="form" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("administrator/paypal_settings/");?>">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <div class="append-icon">
                                <input type="text" name="pay_name" value="<?php echo $payment[0]->name; ?>" class="form-control"  required>
                                <i class="icon-user"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">User Name</label>
                                      <div class="append-icon">
                                          <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"  required>
                                          
                                      </div>
                                  </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Password</label>
                                      <div class="append-icon">
                                          <input type="text" name="password" value="<?php echo $password; ?>" class="form-control"  required>
                                          
                                      </div>
                                  </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Signature</label>
                                      <div class="append-icon">
                                          <input type="text" name="signature" value="<?php echo $signature; ?>" class="form-control"  required>
                                          
                                      </div>
                                  </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Currency</label>
                                      <div class="append-icon">
                                          <input type="text" name="currency" value="<?php echo $currency; ?>" class="form-control"  required>
                                          
                                      </div>
                                  </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Item Charge</label>
                                      <div class="append-icon">
                                      <input type="text" name="perItemFee" value="<?php echo $perItemFee; ?>" class="form-control"  required>
                                         
                                          
                                      </div>
                                  </div>
                          </div>
                          <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="control-label">Order Value</label>
                                      <div class="append-icon">
                                      <input type="text" name="perOrderFee" value="<?php echo $perOrderFee; ?>" class="form-control"  required>
                                         
                                      </div>
                                  </div>
                          </div>

                        </div>

                        

                        <div class="text-center  m-t-20">
                          <button type="submit" id="submit_school" name="submit" class="btn btn-embossed btn-primary">Update Payment Settings</button>
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

