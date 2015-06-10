<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
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
      <?php $this->load->view('sidebar');?>

      <div class="main-content">
       <?php $this->load->view('topbar');?>

        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-app mailbox mailbox-send">
          <section class="app">
            <aside class="aside-sm emails-list">
              <section>
                <div class="mailbox-page clearfix">
                  <div class="append-icon">
                    <input type="text" class="form-control form-white pull-right" id="email-search" placeholder="Search...">
                    <i class="icon-magnifier"></i>
                  </div>
                </div>
                <ul class="nav nav-tabs text-right">
                  
                  <li class="active f-right"><a href="#recent" data-toggle="tab">Schools</a></li>
                  <li class="f-right"><a href="#Parents" data-toggle="tab">Parents</a></li>
                  <li class="f-right"><a href="#vendor" data-toggle="tab">Vendor</a></li>
                </ul>
                <div class="tab-content">

                <div class="tab-pane fade" id="vendor">
                    <div class="messages-list withScroll show-scroll" data-padding="200" data-height="window">
                     
                    
                    <?php foreach ($vendor as $ven) : ?>
                      <div class="message-item media">
                        <div class="media">
                          <div class="media-body">
                            <div class="sender"><?php echo $ven->vendor_name; ?></div>
                            <div class="email" name="email" ><?php echo $ven->vendor_email; ?></div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                     
                
                    </div>
                  </div>



                  <div class="tab-pane fade" id="Parents">
                    <div class="messages-list withScroll show-scroll" data-padding="200" data-height="window">
                     
                    
                    <?php foreach ($parent as $par) : ?>
                      <div class="message-item media">
                        <div class="media">
                          <img src="<?php echo base_url(); ?>parent_image/<?php echo $par->par_pic; ?>" alt="avatar 3" width="40" class="sender-img">
                          <div class="media-body">
                            <div class="sender"><?php echo $par->par_firstname; ?></div>
                            <div class="email" name="email" ><?php echo $par->par_email; ?></div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                     
                
                    </div>
                  </div>


                  <div class="tab-pane fade in active" id="recent">
                    <div class="messages-list withScroll show-scroll" data-padding="200" data-height="window">
                      
                    <?php foreach ($schools as $school) : ?>
                      <div class="message-item media">
                        <div class="media">
                          <img src="<?php echo base_url(); ?>school_image/<?php echo $school->school_pic; ?>" alt="avatar 3" width="40" class="sender-img">
                          <div class="media-body">
                            <div class="sender"><?php echo $school->sch_name; ?></div>
                            <div class="email" name="email" ><?php echo $school->sch_email; ?></div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                                  
                  
                     
                    </div>
                  </div>
                </div>
              </section>
            </aside>
            <div class="email-details">
              <section>
                <div class="email-subject">
                  <h1><strong>Write</strong> an email</h1>
                  <div class="clearfix">
                    <p>from <strong><span class="sender">Ezlunch</span></strong> &bull; <span class="date-send"><?php echo date('d-m-y'); ?></span></p>
                    <div class="pos-rel pull-left">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
                      <i class=" icon-rounded-arrow-down-thin"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#" class="reorder-menu">Delete email</a></li>
                        <li><a href="#" class="remove-menu">Move</a></li>
                        <li><a href="#" class="hide-top-sidebar">Print</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <form id="frm_email" method="post" action="<?=base_url("administrator/newsletter/");?>">
                <div class="email-details-inner withScroll" data-height="window" data-padding="200">
                  <div class="answers">
                    <div class="answer-subject">
                      <h2 class="answer-title"></h2>
                      <p>from <strong>EZlunch</strong> &bull; <span class="answer-date"></span></p>
                    </div>
                    <div class="answer-content"></div>
                  </div>
                  <div class="">
                    <div class="form-group">
                      <div>
                        <input type="text" id="recipient2" name="recipent" class="form-control form-white" required>
                      </div>
                    </div>
                  </div>
                  <div class="subject m-t-10">
                    <input class="form-control form-white" type="text" name="subject" placeholder="Subject" required>
                  </div>
                  <div class="write-answer"><br/>
                    <textarea name="message" style="width: 105%; height: 240px;" required></textarea>
                    <button id="save" class="btn btn-primary" type="submit" name="submit">Send Mail</button>
                  </div>
                </div>
                </form>
              </section>
            </div>
          </section>

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
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/charts-chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>template/assets/global/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPTS -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> 
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/summernote/summernote.min.js"></script> <!-- Simple HTML Editor -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/quicksearch/quicksearch.min.js"></script> <!-- Search Filter -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
    <script src="<?php echo base_url(); ?>template/assets/global/plugins/charts-morris/morris.min.js"></script> <!-- Morris Charts -->
    <script src="<?php echo base_url(); ?>template/assets/global/js/pages/mailbox.js"></script>
    <!-- BEGIN PAGE SCRIPTS -->
    <script src="<?php echo base_url(); ?>template/assets/admin/layout1/js/layout.js"></script>
      
    <script type="text/javascript">
      
      $(document).ready(function(){       
        
          $('.message-item').click (function(){

            var email_address = $(this).find('div.email').text();
         
            $("#recipient2").val(email_address);

          });
        });
      
    </script>


  </body>
</html>
