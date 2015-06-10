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
              <div class="col-lg-12">
                  <div class="col-lg-4">
                      <div class="form-group">

                      <form method="POST" action="<?=base_url("administrator/reports/");?>">
                          <div class="option-group">
                              <label class="control-label  ">School</label>
                              <select id="School" name="School" class="form-control"  required>
                                  <option value="">Select School</option>

                                  <?php foreach ($schools as $school) :?>
                                  <option value="<?php echo $school->sch_id; ?>"><?php echo $school->sch_name; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">

                          <div class="option-group">
                              <label class="control-label">State Date</label>
                              <input name="datestart" type="text" id="datepicker" style="width: 100%; height: 32px;" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">

                          <div class="option-group">
                              <label class="control-label">End Date</label>
                              <input name="dateend" type="text" id="datepicker1" style="width: 100%; height: 32px;" required>
                          </div>
                      </div>
                  </div>

                  <div class="text-center  m-t-20">
                          <button type="submit" id="submit_school" name="submit" class="btn btn-embossed btn-primary" style="float: right">Generate Report</button>
                  </div>
                  <br/>
                  </form>
              </div>
              <div class="col-lg-12">
                  <div class="col-md-12">
                      <div class="panel">
                          <div class="panel-header ">
                              <h3>Report </h3>
                              <div class="panel-content">
                                  <div class="tab_left">
                                      <ul class="nav nav-tabs nav-red">

                                      <li class="active"><a href="#tab3_1" data-classroom-id="0" data-toggle="tab" aria-expanded="false">All Orders</a></li>

                                      <?php foreach ($classroom as $class) :?>
                                          <li><a   class="getorders" data-classroom-id="<?php echo $class->classroom_id;?>"  data-toggle="tab" aria-expanded="false"><?php echo $class->classroom_name;?></a></li>
                                      <?php endforeach; ?>

                                      </ul>
                                      <div class="tab-content">
                                          <div id="tab3_1">
                                              <table class="table table-hover ">
                                                  <thead>
                                                  <tr>
                                                      <th>Date</th>
                                                      <th>Student</th>
                                                      <th>Item</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody class="orders">
                                                  <?php foreach ($reports as $report):?>
                                                    <tr>
                                                        <td><?php echo $report->order_date;?></td>
                                                        <td><?php echo $report->stu_firstname;?></td>
                                                        <td><?php echo $report->item_count;?></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>


                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            <div class="clearfix"></div>
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

    <script>
      $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });
    </script>

       <script>
    $('.getorders').click(function(e){
    e.preventDefault();
    var menu = $(this).data('classroom-id');
    console.log('classroom_id : '+menu);

      $.ajax({
              type:"POST",
              dataType: 'json',
              url:"<?php echo base_url('administrator/get_class_orders/'); ?>",
              data: {classroom_id: menu},
              success: function(data) {
                        //console.log(data);
                        console.log(data.total);
                        $('.orders').html('');
                        for (var i = 0; i < data.total.length; i++) {

                       
                                  
                                  $('<tr>'+
                                      '<td>'+data.total[i].order_date+'</td>'+
                                      '<td>'+data.total[i].stu_firstname+'</td>'+
                                      '<td>'+data.total[i].item_count+'</td>'+
                                  '</tr>').appendTo('.orders');

                                  console.log(data.total[i].order_date);

                        }
                    }
                });

    });
    </script>

  </body>
</html>

