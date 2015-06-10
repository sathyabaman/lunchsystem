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


        <div class="page-content page-thin">  
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header ">
                  <h3><i class="fa fa-table"></i> <strong>Order</strong> Tables</h3>
                </div>
                <div class="panel-content">
                
                  <table class="table table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>School</th>
                        <th>Student</th>
                        <th>Paid/Paid on Dilivery</th>
                          <th> Dilivered or not</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>


                    <tr>
                        
                       
                        <td class="text-right">
                           
                           
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Order</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel-body bg-white">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <form role="form" class="form-validation">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Date</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="firstname" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                                                            <i class="icon-user"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">School </label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="email" class="form-control" placeholder="Enter your email..." required>
                                                                            <i class="icon-envelope"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Student</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="Phonenumber" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                                                            <i class="icon-user"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Item Ordered</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="Address" class="form-control" placeholder="Enter your email..." required>
                                                                            <i class="icon-envelope"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Student ID</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="password" id="password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                                                            <i class="icon-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Teacher Name</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="password2" id="password2" class="form-control" placeholder="Must be equal to your first password..." minlength="4" maxlength="16" required>
                                                                            <i class="icon-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Paid Status</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="password" id="password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                                                            <i class="icon-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Delivered Status</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="password2" id="password2" class="form-control" placeholder="Must be equal to your first password..." minlength="4" maxlength="16" required>
                                                                            <i class="icon-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Amount</label>
                                                                        <div class="append-icon">
                                                                            <input type="text" name="password" id="password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                                                            <i class="icon-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Order View</h4>
                                        </div>



                                        <div class="modal-body">
                                            <table class="table table-hover dataTable">
                                                <tr>
                                                    <th>info</th>
                                                    <th>Des</th>

                                                </tr>
                                                <tr>
                                                    <td>Date</td>
                                                    <td id="or_date"></td>
                                                </tr>
                                                <tr>
                                                    <td>School</td>
                                                    <td id="or_scool">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td id="or_st_name">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Student Allergy</td>
                                                    <td id="or_st_allergy">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Student Allergy Description</td>
                                                    <td id="or_st_allergy_des">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Student ID</td>
                                                    <td id="or_st_id">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Name</td>
                                                    <td id="or_class">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Teacher Name</td>
                                                    <td id="or_teacher">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Paid Status</td>
                                                    <td id="or_paid">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Delivered Status</td>
                                                    <td id="or_delivered">y</td>
                                                </tr>
                                                <tr>
                                                    <td>Amount</td>
                                                    <td id="or_amount">y</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php foreach ($orders as $order) : ?>

                    <tr>
                    	 <tr>
                        <td><?php echo $order->order_date; ?></td>
                        <td><?php echo $order->sch_name; ?></td>
                        <td><?php echo $order->stu_firstname; ?></td>
                        <td><?php echo $order->paid_status; ?></td>
                        <td><?php echo $order->delivery_status; ?></td>
                        <td class="text-right">
                        	<a href="<?php echo base_url(); ?>school/edit_order/<?php echo $order->order_id; ?>" >
                            <button type="button" class="edit btn btn-sm btn-default">
                                <i class="icon-note"></i>
                            </button>
                            </a>
                            <button type="button" data-order-id="<?php echo $order->order_id; ?>" class="edit btn btn-sm btn-default view_order_dtls"  data-toggle="modal" data-target="#myModall">
                                <i class="icon-screen-tablet" data-order-id="<?php echo $order->order_id; ?>" ></i>
                            </button>
                           

                    </tr>

                	<?php endforeach; ?>

                    </tbody>
                  </table>
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

     <script>
    $('.view_order_dtls').click(function(e){
    e.preventDefault();
    var order = $(this).data('order-id');
    console.log("order id : "+order);
      $.ajax({
              type:"POST",
              dataType: 'json',
              url:"<?php echo base_url('school/get_single_order/'); ?>",
              data: {order_id: order},
              success: function(data) {
                        //console.log(data);
                        console.log(data.total);
                        for (var i = 0; i < data.total.length; i++) {
                                              
                            $('#or_date').html(data.total[i].order_date);
                            $('#or_scool').html(data.total[i].sch_name);
                            $('#or_st_name').html(data.total[i].stu_firstname);
                            var allgy = data.total[i].food_allergy;
                            var allergy ="";
                            if(allgy == 1){ allergy="yes";}else{ allergy="No";}
                            $('#or_st_allergy').html(allergy);
                            $('#or_st_allergy_des').html(data.total[i].allergy_description);
                            $('#or_st_id').html(data.total[i].stu_schoolid);
                            $('#or_teacher').html(data.total[i].teacher_name);
                            $('#or_class').html(data.total[i].classroom_name);
                            $('#or_paid').html(data.total[i].paid_status);
                            $('#or_delivered').html(data.total[i].delivery_status);
                            $('#or_amount').html(data.total[i].amount);
                        }

                    }
                });
			  });
			</script>

  </body>
</html>

