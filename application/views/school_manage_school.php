<!DOCTYPE html>
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

  <!-- BEGIN BODY -->
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
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header ">
                  <h3><i class="fa fa-table"></i> <strong>School</strong> Tables</h3>
                </div>
                <div class="panel-content">
                  <div class="m-b-20">
                    <div class="btn-group">
                   
                    </div>
                  </div>
                  <table class="table table-hover dataTable" >
                    <thead>
                      <tr>
                        <th>School Name</th>
                        <th>Admin Name</th>
                        <th>No of Registered Students</th>
                        <th>Email</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                          <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit School</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Model Content  -->

<div class="panel-body bg-white">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form role="frm_edit_school" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("school/edit_school/");?>">
                <div class="row">
                <input type="text" id="scl_id" name="scl_id" style="display: none" >
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">School Name</label>
                            <div class="append-icon">
                                
                                <input type="text" id="scl_name" name="scl_name" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
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
                            <div class="append-icon">
                                <input type="text" id="scl_Phonenumber" name="scl_Phonenumber" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <div class="append-icon">
                                <input type="text" id="scl_Address" name="scl_Address" class="form-control" placeholder="Enter your email..." required>
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
                                <input type="password" id="scl_password" name="scl_password" id="password" class="form-control" placeholder="Between 4 and 16 characters">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Repeat your password</label>
                            <div class="append-icon">
                                <input type="password" id="scl_password2" name="scl_password2" id="password2" class="form-control" placeholder="Must be equal to your first password..." >
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Time of Lunch</label>
                            <div class="append-icon">
                                <input type="text" id="scl_TimeofLunch" name="scl_TimeofLunch" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Total Number Of Student</label>
                            <div class="append-icon">
                                <input type="text" id="scl_TotalNumberOfStudent" name="scl_TotalNumberOfStudent" class="form-control" placeholder="Enter your email..." required>
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
                                    <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;" >
                                    <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Admin Name</label>
                            <div class="option-group">
                                <div class="append-icon">
                                <input type="text" id="scl_admin" name="scl_admin" class="form-control" placeholder="Enter your email..." required>
                                <i class="icon-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php foreach ($schools as $school): ?>
                    <tr>
                        <td><?php echo $school->sch_name; ?></td>
                        <td><?php echo $school->sch_admin; ?></td>
                        <td><?php echo $school->no_of_students; ?></td>
                        <td><?php echo $school->sch_email; ?></td>
                        <td class="text-right">
                            <button type="button" class="edit btn btn-sm btn-default" data-school-id="<?php echo $school->sch_id; ?>" data-toggle="modal" data-target="#myModal" >
                                <i class="icon-note" ></i>
                            </button>

                            
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
          <?php $this->load->view('footer');?>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>
    <!-- BEGIN SEARCH -->
    <div id="morphsearch" class="morphsearch">
      <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..."/>
        <button class="morphsearch-submit" type="submit">Search</button>
      </form>
      <div class="morphsearch-content withScroll">
        <div class="dummy-column user-column">
          <h2>Users</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar1_big.png" alt="Avatar 1"/>
            <h3>John Smith</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar2_big.png" alt="Avatar 2"/>
            <h3>Bod Dylan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar3_big.png" alt="Avatar 3"/>
            <h3>Jenny Finlan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar4_big.png" alt="Avatar 4"/>
            <h3>Harold Fox</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar5_big.png" alt="Avatar 5"/>
            <h3>Martin Hendrix</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/avatars/avatar6_big.png" alt="Avatar 6"/>
            <h3>Paul Ferguson</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Articles</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/1.jpg" alt="1"/>
            <h3>How to change webdesign?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/2.jpg" alt="2"/>
            <h3>News From the sky</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/3.jpg" alt="3"/>
            <h3>Where is the cat?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/4.jpg" alt="4"/>
            <h3>Just another funny story</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/5.jpg" alt="5"/>
            <h3>How many water we drink every day?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/6.jpg" alt="6"/>
            <h3>Drag and drop tutorials</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Recent</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/7.jpg" alt="7"/>
            <h3>Design Inspiration</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/8.jpg" alt="8"/>
            <h3>Animals drawing</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/9.jpg" alt="9"/>
            <h3>Cup of tea please</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/10.jpg" alt="10"/>
            <h3>New application arrive</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/11.jpg" alt="11"/>
            <h3>Notification prettify</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url(); ?>template/assets/global/images/gallery/12.jpg" alt="12"/>
            <h3>My article is the last recent</h3>
          </a>
        </div>
      </div>
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
    var school = $(this).data('school-id');
    console.log(school);
      $.ajax({
              type:"POST",
              dataType: 'json',
              url:"<?php echo base_url('school/get_single_school/'); ?>",
              data: {school_id: school},
              success: function(data) {
                        //console.log(data);
                        console.log(data.total);
                        for (var i = 0; i < data.total.length; i++) {
                                              
                            $('#scl_id').val(data.total[i].sch_id);
                            $('#scl_name').val(data.total[i].sch_name);
                            $('#scl_email').val(data.total[i].sch_email);
                            $('#scl_Phonenumber').val(data.total[i].sch_phone);
                            $('#scl_Address').val(data.total[i].sch_addr);
                            $('#scl_TimeofLunch').val(data.total[i].lunch_time);
                            $('#scl_TotalNumberOfStudent').val(data.total[i].no_of_students);
                            $('#scl_admin').val(data.total[i].sch_admin);
                                 
                        };
                                          
                        }
                });



    });
    </script>




  </body>
</html>

