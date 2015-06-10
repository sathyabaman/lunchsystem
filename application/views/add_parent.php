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
                  <h2 class="panel-title"><strong>Sign Up</strong> a Parent</h2>
                </div>
                <div class="panel-body bg-white">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <form role="form" id="frm_add_parent" class="form-validation" method="post" enctype="multipart/form-data" action="<?=base_url("administrator/add_parent/");?>">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">First Name</label>
                                              <label style="color:red;" id="par_firstname_error"></label>
                                              <div class="append-icon">
                                                  <input type="text" id="par_firstname" name="par_firstname" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                                  <i class="icon-user"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Last Name</label>
                                              <label style="color:red;" id="par_lastname_error"></label>
                                              <div class="append-icon">
                                                  <input type="text" id="par_lastname" name="par_lastname" class="form-control" placeholder="Enter your lastname..." required>
                                                  <i class="icon-envelope"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Email Address</label>
                                              <label style="color:red;" id="par_email_error"></label>
                                              <div class="append-icon">
                                                  <input type="email" id="par_email" name="par_email" class="form-control" minlength="3" placeholder="Enter your email..." required>
                                                  <i class="icon-user"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Phone Number</label>
                                              <label style="color:red;" id="par_phone_error"></label>
                                              <div class="append-icon">
                                                  <input type="text" id="par_phone" name="par_phone" class="form-control" placeholder="Enter your phone number..." required>
                                                  <i class="icon-envelope"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Password</label>
                                              <label style="color:red;" id="par_password_error"></label>
                                              <div class="append-icon">
                                                  <input type="password" id="par_password" name="par_password" id="password" class="form-control" placeholder="Between 4 and 16 characters" minlength="4" maxlength="16" required>
                                                  <i class="icon-lock"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Repeat your password</label>
                                              <label style="color:red;" id="par_password2_error"></label>
                                              <div class="append-icon">
                                                  <input type="password" id="par_password2" name="par_password2" id="password2" class="form-control" placeholder="Must be equal to your first password..." minlength="4" maxlength="16" required>
                                                  <i class="icon-lock"></i>
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
                                                      <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Address</label>
                                              <label style="color:red;" id="par_address_error"></label>
                                              <div class="append-icon">
                                                  <input type="text" id="par_address" name="par_address" class="form-control" minlength="3" placeholder="Minimum 3 characters..." required>
                                                  <i class="icon-user"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="control-label">Are you OK with our terms?</label>
                                              <div class="option-group">
                                                  <label  for="terms" class="m-t-10">
                                                      <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue" required/>
                                                      I agree with terms and conditions
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="panel-header bg-dark">
                                    <h2 class="panel-title"> Add Students </h2>
                                  </div>

                                  <div class="all">
                                    <div  class="row student">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Firstname</label>
                                                <div class="append-icon">
                                                    <input type="text" id="std_first_name" name="std_first_name1" id="password" class="form-control" placeholder="Enter first name" minlength="4" maxlength="16" required>
                                                    <i class="icon-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="">
                                                <label class="">Select School</label>
                                                
                                                <div class="">
                                                  <select  class="std_scl_name1" name="std_scl_name1" style="width: 100%; height: 32px;">
                                                    
                                                    <option value="">Select school..</option>

                                                    <?php foreach ($schools as $school) :?>
                                                        <option value="<?php echo $school->sch_id; ?>"><?php echo $school->sch_name;?></option>
                                                    <?php endforeach; ?>

                                                  </select>

                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="">
                                                <label class="">Select class</label>
                                                
                                                <div class="">
                                                  <select  class="std_class_room1" name="std_class_room1" style="width: 100%; height: 32px;">
                                                    
                                                    <option value="">Select Class room..</option>

                                                    <?php foreach ($classromm as $class) :?>
                                                        <option value="<?php echo $class->classroom_id; ?>"><?php echo $class->classroom_name;?></option>
                                                    <?php endforeach; ?>

                                                  </select>

                                                </div>
                                              </div>
                                        </div>






                                                  
                                    </div>
                                    </div>

                                    <div class="add_student"><a><i class="fa fa-plus"></i><u><u>Add More Students</u></a></div>


                                  <div class="text-center  m-t-20">
                                      <button type="submit" name="submit" class="btn btn-embossed btn-primary">Sign Up</button>
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

    <?php $this->load->view('add_parent_script');?>

        <script type="text/javascript">

            $(document).ready(function(){       
            var count = 2;
            $('.add_student').click (function(){
              
                var clonedEl = $('.student').first().clone();
                clonedEl.find(':text').attr('name','std_first_name'+count);
                clonedEl.find('.std_scl_name1').attr('name','std_scl_name'+count);
                clonedEl.find('.std_class_room1').attr('name','std_class_room'+count);
                //clonedEl.find("<select>").attr('name','std_scl_name'+count);
                //Add the newly div the the entire div
                $('.all').append(clonedEl);

                //$('.std_scl_name'+count).html($('.std_scl_name1').html());
                count++;
              });
          });
        </script>

  </body>
</html>

