      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1>
            <a href="dashboard.html"></a>
          </h1>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top">
            <form action="search-result.html" method="post" class="searchform" id="search-results">
              <input type="text" class="form-control" name="keyword" placeholder="Search...">
            </form>
          </div>
          <div class="menu-title">
            Navigation 
            <div class="pull-right menu-settings">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
              <i class="icon-settings"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" id="reorder-menu" class="reorder-menu">Reorder menu</a></li>
                <li><a href="#" id="remove-menu" class="remove-menu">Remove elements</a></li>
                <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Hide user &amp; search</a></li>
              </ul>
            </div>
          </div>
          <ul class="nav nav-sidebar">
            <li>
              <a href="<?php echo base_url(); ?>school/dashboard/"><i class="icon-home"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-parent">
              <a href="#"><i class="icon-bulb"></i><span>Schools</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li>
                  <a href="<?php echo base_url(); ?>school/manage_school/">Manage School</a>
                </li>
                
              </ul>
            </li>
            <li class="nav-parent">
              <a href="#"><i class="icon-bulb"></i><span>Parents</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li>
                  <a href="<?php echo base_url(); ?>school/manage_parent/">Manage Parents</a>
                </li>
                
              </ul>
            </li>
            <li class="nav-parent">
              <a href="#"><i class="icon-bulb"></i><span>Students</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li>
                  <a href="<?php echo base_url(); ?>school/manage_student/">Manage Students</a>
                </li>
              </ul>
            </li>

            <li class="nav-parent">
              <a href="#"><i class="icon-bulb"></i><span>Menu</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li>
                  <a href="<?php echo base_url(); ?>school/manage_menu/">Manage Menu</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>school/add_menu/">Add Menu</a>
                </li>

              </ul>
            </li>

           
             <li>
              <a href="<?php echo base_url(); ?>school/add_menu_date/"><i class="icon-home"></i><span>Menu Date</span></a>
            </li>
            
          
            <li>
              <a href="<?php echo base_url(); ?>school/manage_orders/"><i class="icon-home"></i><span>Orders</span></a>
            </li>
            
          </ul>
          <!-- SIDEBAR WIDGET FOLDERS -->          
          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="user-lockscreen.html" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="<?php echo base_url(); ?>school/logout/" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->