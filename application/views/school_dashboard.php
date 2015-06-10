<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-surplusdev.com">
    <meta name="author" content="surplusdev.com">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>template/assets/global/images/favicon.png" type="image/png">
    <title>Dashboard -Lunch</title>
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
     

      <?php $this->load->view('school_side_bar');?>

      <div class="main-content">
       

         <?php $this->load->view('topbar');?>


        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
         

 <div class="row">
            <h2 class="m-t-30 m-b-10"><strong>DashBoard</strong></h2>


            <div class="row0">
              <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel">
                  <div class="panel-content widget-info">
                    <div class="row">
                      <div class="left">
                        <i class="fa fa-umbrella bg-green"></i>
                      </div>
                      <div class="right">
                        <p class="number" ><?php echo $total_order;?></p>
                        <p class="text">Orders</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel">
                  <div class="panel-content widget-info">
                    <div class="row">
                      <div class="left">
                        <i class="fa fa-bug bg-blue"></i>
                      </div>
                      <div class="right">
                        <p class="number"><?php echo $total_menus;?></p>
                        <p class="text">Menus</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel">
                  <div class="panel-content widget-info">
                    <div class="row">
                      <div class="left">
                        <i class="fa fa-fire-extinguisher bg-red"></i>
                      </div>
                      <div class="right">
                        <p class="number" ><?php echo $total_students;?></p>
                        <p class="text">Students</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">

                <div class="panel-content">
                      <div class="filter-left">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order No</th>
                          <th>Date</th>
                          <th class='hidden-350'>School</th>
                          <th class='hidden-1024'>Student</th>
                          <th class='hidden-480'>Payment Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       <?php foreach ($orders as $order) : ?>
                        <tr>
                          <td><?php echo $order->order_id; ?></td>
                          <td><?php echo $order->order_date; ?></td>
                          <td class='hidden-350'><?php echo $order->sch_name; ?></td>
                          <td class='hidden-1024'><?php echo $order->stu_firstname; ?></td>
                          <td class='hidden-480'><?php echo $order->paid_status; ?></td>
                        </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span><a href="http://surplusdev.com">Surplus</a></span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
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
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> 
    <!-- Animated Progress Bar -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/pages/table_editable.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/admin/layout1/js/layout.js"></script>
  </body>
</html>

