 <!-- ========== Left Sidebar Start ========== -->
           <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>
                            <li class="has_sub">
                                <a href="<?=Adminpath?>dashboard" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a>
                               
                            </li>
                            
            <?php                 
		
		// print_r($AdminUserDetails);
		
		// print_r($NavModules);
       //foreach ($offers_list as $row) {
               $arr_adm_privilages=$AdminUserDetails->adm_privi;        
               $arr_adm_privilages=explode(",",$arr_adm_privilages);  
               $totmodules=count($arr_adm_privilages);
               $Admstatus=$AdminUserDetails->status;  $access=array();  
			      foreach ($NavModules as $modulesFetch) { 
 if($modulesFetch['has_sub']=='Y'){ 
 ?>			  
  <li class="has_sub">
                                <a href="<?php echo $modulesFetch['url'];?>" title="<?php echo $modulesFetch['modulename'];?>"  target="<?php echo $modulesFetch['target'];?>" class="waves-effect"><?php echo $modulesFetch['mdi_icon'];?> <span><?php echo(ucwords($modulesFetch['modulename']));?></span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                   <?php $NavSubModules=$this->admin_model->FetchDataByTwoFieldByOrderBy('module_managements','ModuleStatus',$modulesFetch['module_id'],'Status','Y','modulename','asc');  foreach ($NavSubModules as $modulesFetch1) {  
 if($Admstatus=='S') {	
 if(in_array($modulesFetch1['modulename'],$arr_adm_privilages)==true){
		
 ?>
   <li><a href="<?=Adminpath?><?php echo $modulesFetch1['url'];?>" title="<?php echo $modulesFetch1['modulename'];?>"  target="<?php echo $modulesFetch1['target'];?>"><?php echo(ucwords($modulesFetch1['modulename']));?></a>
                                    </li>
                                   <?php }
								      }
if($Admstatus=='O')
 {	
 if(in_array($modulesFetch1['modulename'],$arr_adm_privilages)==true){  ?> 
 
 
		 <li><a href="<?=Adminpath?><?php echo $modulesFetch1['url'];?>" title="<?php echo $modulesFetch1['modulename'];?>"  target="<?php echo $modulesFetch1['target'];?>"><?php echo (ucwords($modulesFetch1['modulename']));?></span></a>
                                    </li> 
                                    
                                    
                                   <?php }
								      }
									   }?>
                                </ul>
                            </li>
<?php  } else{ ?> 
 <li>
                                <a href="<?php echo $modulesFetch['url'];?>" title="<?php echo $modulesFetch['modulename'];?>"  target="<?php echo $modulesFetch['target'];?>" class="waves-effect"><?php echo $modulesFetch['mdi_icon'];?> <span><?php echo(ucwords($modulesFetch['modulename']));?></span></a>
                            </li>

<?php }
} ?>
                        </ul>
                    </div>
                    
                    <!--<div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span class="label label-success pull-right">2</span> <span> Dashboard </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="index.php">Dashboard 1</a></li>
                                    <li><a href="dashboard_2.php">Dashboard 2</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> User Interface </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ui-buttons.php">Buttons</a></li>
                                    <li><a href="ui-typography.php">Typography</a></li>
                                    <li><a href="ui-panels.php">Panel</a></li>
                                    <li><a href="ui-portlets.php">Portlets</a></li>
                                    <li><a href="ui-modals.php">Modals</a></li>
                                    <li><a href="ui-checkbox-radio.php">Checkboxs-Radios</a></li>
                                    <li><a href="ui-tabs.php">Tabs</a></li>
                                    <li><a href="ui-progressbars.php">Progress Bars</a></li>
                                    <li><a href="ui-notifications.php">Notification</a></li>
                                    <li><a href="ui-alerts.php">Alerts</a>
                                    <li><a href="ui-carousel.php">Carousel</a>
                                    <li><a href="ui-video.php">Video</a>
                                    <li><a href="ui-tooltips-popovers.php">Tooltips & Popovers</a></li>
                                    <li><a href="ui-images.php">Images</a></li>
                                    <li><a href="ui-bootstrap.php">Bootstrap UI</a></li>
                                    <li><a href="ui-grid.php">Grid</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Admin UI </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="admin-sweet-alert.php">Sweet Alert</a></li>
                                    <li><a href="admin-widgets.php">Widgets</a></li>
                                    <li><a href="admin-nestable.php">Nestable List</a></li>
                                    <li><a href="admin-rangeslider.php">Range Slider</a></li>
                                    <li><a href="admin-ratings.php">Ratings</a></li>
                                    <li><a href="admin-animation.php">Animation</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="calendar.php" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Email </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="email-inbox.php"> Inbox</a></li>
                                    <li><a href="email-read.php"> Read Mail</a></li>
                                    <li><a href="email-compose.php"> Compose Mail</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-heart-outline"></i><span> Icons </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="icons-glyphicons.php">Glyphicons</a></li>
                                    <li><a href="icons-colored.php">Colored Icons</a></li>
                                    <li><a href="icons-materialdesign.php">Material Design</a></li>
                                    <li><a href="icons-ionicons.php">Ion Icons</a></li>
                                    <li><a href="icons-fontawesome.php">Font awesome</a></li>
                                    <li><a href="icons-themifyicon.php">Themify Icons</a></li>
                                    <li><a href="icons-typicons.php">Typicons</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-diamond"></i><span class="label label-info pull-right">New</span> <span> Forms </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.php">Form Elements</a></li>
                                    <li><a href="form-advanced.php">Form Advanced</a></li>
                                    <li><a href="form-validation.php">Form Validation</a></li>
                                    <li><a href="form-pickers.php">Form Pickers</a></li>
                                    <li><a href="form-wizard.php">Form Wizard</a></li>
                                    <li><a href="form-mask.php">Form Masks</a></li>
                                    <li><a href="form-summernote.php">Summernote</a></li>
                                    <li><a href="form-wysiwig.php">Wysiwig Editors</a></li>
                                    <li><a href="form-uploads.php">Multiple File Upload</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                	<li><a href="tables-basic.php">Basic Tables</a></li>
                                    <li><a href="tables-layouts.php">Tables Layouts</a></li>
                                    <li><a href="tables-datatable.php">Data Table</a></li>
                                    <li><a href="tables-responsive.php">Responsive Table</a></li>
                                    <li><a href="tables-tablesaw.php">Tablesaw Table</a></li>
                                    <li><a href="tables-editable.php">Editable Table</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Extra</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-arc"></i><span> Charts </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="chart-flot.php">Flot Chart</a></li>
                                    <li><a href="chart-morris.php">Morris Chart</a></li>
                                    <li><a href="chart-google.php">Google Chart</a></li>
                                    <li><a href="chart-chartist.php">Chartist Charts</a></li>
                                    <li><a href="chart-chartjs.php">Chartjs Chart</a></li>
                                    <li><a href="chart-c3.php">C3 Chart</a></li>
                                    <li><a href="chart-sparkline.php">Sparkline Chart</a></li>
                                    <li><a href="chart-knob.php">Jquery Knob</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map"></i> <span> Maps </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                	<li><a href="maps-google.php">Google Maps</a></li>
                                    <li><a href="maps-vector.php">Vector Maps</a></li>
                                    <li><a href="maps-mapael.php">Mapael Maps</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-user"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="page-starter.php">Starter Page</a></li>
                                    <li><a href="page-login.php">Login</a></li>
                                    <li><a href="page-register.php">Register</a></li>
                                    <li><a href="page-logout.php">Logout</a></li>
                                    <li><a href="page-recoverpw.php">Recover Password</a></li>
                                    <li><a href="page-lock-screen.php">Lock Screen</a></li>
                                    <li><a href="page-confirm-mail.php">Confirm Mail</a></li>
                                    <li><a href="page-404.php">Error 404</a></li>
                                    <li><a href="page-404-alt.php">Error 404-alt</a></li>
                                    <li><a href="page-500.php">Error 500</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-gift"></i><span> Extras </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="extras-profile.php">Profile</a></li>
                                    <li><a href="extras-sitemap.php">Sitemap</a></li>
                                    <li><a href="extras-about.php">About Us</a></li>
                                    <li><a href="extras-contact.php">Contact</a></li>
                                    <li><a href="extras-members.php">Members</a></li>
                                    <li><a href="extras-timeline.php">Timeline</a></li>
                                    <li><a href="extras-invoice.php">Invoice</a></li>
                                    <li><a href="extras-search-result.php">Search Result</a></li>
                                    <li><a href="extras-emailtemplate.php">Email Template</a></li>
                                    <li><a href="extras-maintenance.php">Maintenance</a></li>
                                    <li><a href="extras-coming-soon.php">Coming Soon</a></li>
                                    <li><a href="extras-faq.php">FAQ</a></li>
                                    <li><a href="extras-gallery.php">Gallery</a></li>
                                    <li><a href="extras-pricing.php">Pricing</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">More</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-comment-text-outline"></i><span> Blog </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="blogs-dashboard.php">Dashboard</a></li>
                                    <li><a href="blogs-blog-list.php">Blog List</a></li>
                                    <li><a href="blogs-blog-column.php">Blog Column</a></li>
                                    <li><a href="blogs-blog-post.php">Blog Post</a></li>
                                    <li><a href="blogs-blog-add.php">Add Blog</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-home-map-marker"></i><span> Real Estate </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="real-estate-dashboard.php">Dashboard</a></li>
                                    <li><a href="real-estate-list.php">Property List</a></li>
                                    <li><a href="real-estate-column.php">Property Column</a></li>
                                    <li><a href="real-estate-detail.php">Property Detail</a></li>
                                    <li><a href="real-estate-agents.php">Agents</a></li>
                                    <li><a href="real-estate-profile.php">Agent Details</a></li>
                                    <li><a href="real-estate-add.php">Add Property</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>-->
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">For Help ?</h5>
                        <p class=""><span class="text-custom">Email:</span> <br/> support@support.com</p>
                        <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+123) 123 456 789</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
 <!-- Left Sidebar End -->
     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">








