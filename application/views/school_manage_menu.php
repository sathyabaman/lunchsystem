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
                  <h3><i class="fa fa-table"></i> <strong>Menu</strong> Tables</h3>
                </div>
                <div class="panel-content">
                  <div class="m-b-20">
                    <div class="btn-group">
                    <a href="<?php echo base_url(); ?>school/add_menu/">
                       <button id="table-edit_new" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Add New Menu</button>
                      </a>
                    </div>
                  </div>
                  <table class="table table-hover dataTable" >
                    <thead>
                      <tr>
                        <th>Menu Name</th>
                        <th>School Name</th>
                        <th>Total NUmber of Item</th>
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
                                            <h4 class="modal-title" id="myModalLabel">View Menu</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-lg-12">
                                  <div class="form-group">
                                      <label class="control-label">Menu Name</label>
                                      <div class="append-icon">
                                          <input type="text" id="menuname" name="menuname" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                          <i class="icon-user"></i>
                                      </div>
                                  </div>
                              </div>

                              <h4 class="modal-title" id="myModalLabel"></h4><hr>
                              



                              <div class="row">
                                  <div class="panel-header bg-dark">
                                      <h2 class="panel-title"><strong>View</strong> Items</h2>
                                  </div>
                                  <table class="table table-hover dataTable" >
                                      <thead>
                                      <tr>
                                          <th>Category name</th>
                                          <th>Item name</th>
                                          <th>price</th>
                                          <th>cost</th>
                                          <th>Description</th>
                                      </tr>

                                      </thead>
                                      <tbody class="insert_item">


                                      <!-- appending tudents here with jquery -->


                                      
                                      </tbody>
                                  </table>
                              </div>


                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>






                    <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td><?php echo $menu->menu_name; ?></td>
                        <td><?php echo $menu->sch_name; ?></td>
                        <td><?php echo $menu->items; ?></td>

                        <td class="text-right">

                            <a href="<?php echo base_url(); ?>school/edit_menu/<?php echo $menu->menu_id; ?>" class="btn btn-sm btn-default" ><i class="icon-note" ></i></a>


                            <button type="button" class="edit btn btn-sm btn-default" data-menu-id="<?php echo $menu->menu_id; ?>" data-toggle="modal" data-target="#myModal" >
                                <i class="icon-screen-tablet" ></i>
                            </button>

                            <a href="<?php echo base_url(); ?>school/delete_menu/<?php echo $menu->menu_id; ?>" onclick="return confirm('Are you sure you want to Remove?');" class="delete btn btn-sm btn-danger" ><i class="icons-office-52"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit School</h4>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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
    $('.edit').click(function(e){
    e.preventDefault();
    var menu = $(this).data('menu-id');
    console.log('menu_id : '+menu);

      $.ajax({
              type:"POST",
              dataType: 'json',
              url:"<?php echo base_url('school/get_items_single_menu/'); ?>",
              data: {menu_id: menu},
              success: function(data) {
                        //console.log(data);
                        console.log(data.total);
                        $('.insert_item').html('');
                        for (var i = 0; i < data.total.length; i++) {

                       
                                  
                                  $('<tr>'+
                                      '<td>'+data.total[i].category_name+'</td>'+
                                      '<td>'+data.total[i].item_name+'</td>'+
                                      '<td>'+data.total[i].item_price+'</td>'+
                                      '<td>'+data.total[i].item_cost+'</td>'+
                                      '<td>'+data.total[i].description+'</td>'+
                                    
                                  '</tr>').appendTo (".insert_item");

                              $('#menuname').val(data.total[i].menu_name);

                              console.log(data.total[i].item_name);
                              console.log(data.total[i].item_price);
                              console.log(data.total[i].item_cost);        
                                      
                                       
                        }
                    }
                });

    });
    </script>




  </body>
</html>

