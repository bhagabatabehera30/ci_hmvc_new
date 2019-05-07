</head>
<body class="home">
	<!-- preloader -->
	<div class="myapp-preloader">
		<div class="spinner-wrapper">
			<div class="spinner"></div>
		</div><!-- .spinner-wrapper -->
	</div> <!-- .myapp-preloader -->

	<header class="site-header">
		<div class="top-bar clearfix">
			<div class="container">
				<ul class="list-inline pull-left quick-contact">
					<li><a href="#"><i class="fa fa-phone"></i> <span>+88 01679 252595</span></a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> <span>hello@myapp.com</span></a></li>
				</ul> <!-- .quick-contact -->

				<ul class="list-inline pull-right top-bar-social">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				</ul> <!-- .top-bar-menu -->

				<ul class="list-inline pull-right top-bar-menu">
					<li><a href="#">Welcome</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="#">Sitemap</a></li>
				</ul> <!-- .top-bar-menu -->
			</div> <!-- .container -->
		</div> <!-- .top-bar -->
		<nav class="navbar myapp-navbar navbar-01">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars"></i>
					</button>
 <a href="<?=PATH?>" class="navbar-brand"><?php
	  $LogoImage=$MyAppSettings->web_site_logo_small;
	if($LogoImage!='' && file_exists("./cdn/logoImage/$LogoImage")) { ?><img src="<?=CDN_PATH?>logoImage/<?=$LogoImage;?>" alt="<?=$MyAppSettings->website_name?>">
<?php } else{ ?>
<img src="<?php echo ASSETS; ?>img/logo.png" alt="<?=$MyAppSettings->website_name?>"> 
<?php } ?></a>
					
					

				</div> <!-- .navbar-header -->

				<div class="collapse navbar-collapse navbar-items" id="navbar-items">
					<ul class="nav navbar-nav navbar-right">
						<li class="active dropdown menu-large">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
							<ul class="dropdown-menu megamenu row">

								<li class="col-sm-3">
									<ul>
										<li><a href="index_01.html">Home 01</a></li>
										<li><a href="index_02.html">Home 02</a></li>
										<li><a href="index_03.html">Home 03</a></li>
										
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="index_04.html">Home 04</a></li>
										<li><a href="index_05.html">Home 05</a></li>
										<li><a href="index_06.html">Home 06</a></li>
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="index_07.html">Home 07</a></li>
										<li><a href="index_08.html">Home 08</a></li>
										<li><a href="index_09.html">Home 09</a></li>
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="index_10.html">Home 10</a></li>
										<li><a href="index_11.html">Home 11</a></li>
										<li><a href="index_12.html">Home 12</a></li>
									</ul>
								</li>

							</ul> <!-- .dropdown-menu megamenu row -->
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features</a>

							<ul class="dropdown-menu">
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Headers</a>
									<ul class="dropdown-menu">
										<li><a href="index.html">Header 01</a></li>
										<li><a href="index_header_02.html">Header 02</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Footers</a>
									<ul class="dropdown-menu">
										<li><a href="index.html">Footer 01</a></li>
										<li><a href="index_footer_02.html">Footer 02</a></li>
									</ul> <!-- .dropdown-menu -->

								</li>
							</ul> <!-- .dropdown-menu -->

						</li> <!-- .dropdown -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
									<ul class="dropdown-menu">
										<li><a href="about.html">About 01</a></li>
										<li><a href="about_02.html">About 02</a></li>
										<li><a href="about_03.html">About 03</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Service</a>
									<ul class="dropdown-menu">
										<li><a href="service.html">Service 01</a></li>
										<li><a href="service_02.html">Service 02</a></li>
										<li><a href="service_03.html">Service 03</a></li>
										<li><a href="service_04.html">Service 04</a></li>
										<li><a href="service_details.html">Service Details</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Faq</a>
									<ul class="dropdown-menu">
										<li><a href="faq.html">Faq 01</a></li>
										<li><a href="faq_02.html">Faq 02</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Team Members</a>
									<ul class="dropdown-menu">
										<li><a href="team_members.html">Team Members 01</a></li>
										<li><a href="team_members_02.html">Team Members 02</a></li>
										<li><a href="team_members_03.html">Team Members 03</a></li>
										<li><a href="member_details.html">Member Details 01</a></li>
										<li><a href="member_details_02.html">Member Details 02</a></li>
										<li><a href="member_details_03.html">Member Details 03</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
							</ul> <!-- .dropdown-menu -->
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">2 Column</a>
									<ul class="dropdown-menu">
										<li><a href="portfolio_2column.html">Normal</a></li>
										<li><a href="portfolio_2column_fullwidth.html">Fullwidth</a></li>
										<li><a href="portfolio_2column_nogap.html">No Gap</a></li>
										<li><a href="portfolio_2column_nogap_fullwidth.html">No Gap Fullwidth</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">3 Column</a>
									<ul class="dropdown-menu">
										<li><a href="portfolio_3column.html">Normal</a></li>
										<li><a href="portfolio_3column_fullwidth.html">Fullwidth</a></li>
										<li><a href="portfolio_3column_nogap.html">No Gap</a></li>
										<li><a href="portfolio_3column_nogap_fullwidth.html">No Gap Fullwidth</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">4 Column</a>
									<ul class="dropdown-menu">
										<li><a href="portfolio_4column.html">Normal</a></li>
										<li><a href="portfolio_4column_fullwidth.html">Fullwidth</a></li>
										<li><a href="portfolio_4column_nogap.html">No Gap</a></li>
										<li><a href="portfolio_4column_nogap_fullwidth.html">No Gap Fullwidth</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li><a href="portfolio-details.html">Portfolio Details 01</a></li>
								<li><a href="portfolio-details_02.html">Portfolio Details 02</a></li>
								<li><a href="portfolio-details_03.html">Portfolio Details 03</a></li>
								<li><a href="portfolio-details_04.html">Portfolio Details 04</a></li>
							</ul> <!-- .dropdown-menu -->
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog Grid</a>
									<ul class="dropdown-menu">
										<li><a href="blog_grid_3column.html">3 Column</a></li>
										<li><a href="blog_grid_4column.html">4 Column</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog Grid Fullwidth</a>
									<ul class="dropdown-menu">
										<li><a href="blog_grid_3column_fullwidth.html">3 Column</a></li>
										<li><a href="blog_grid_4column_fullwidth.html">4 Column</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog Overlay</a>
									<ul class="dropdown-menu">
										<li><a href="blog_overlay_3column.html">3 Column</a></li>
										<li><a href="blog_overlay_4column.html">4 Column</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog Overlay Fullwidth</a>
									<ul class="dropdown-menu">
										<li><a href="blog_overlay_3column_fullwidth.html">3 Column</a></li>
										<li><a href="blog_overlay_4column_fullwidth.html">4 Column</a></li>
									</ul> <!-- .dropdown-menu -->
								</li>
								<li><a href="blog_01.html">Blog Simple</a></li>
								<li><a href="blog_02.html">Blog Classic</a></li>
								<li><a href="blog_03.html">Blog Classic Alt</a></li>
								<li><a href="blog_04.html">Blog Grid with Sidebar</a></li>
								<li><a href="blog_05.html">Blog Modern 01</a></li>
								<li><a href="blog_06.html">Blog Modern 02</a></li>
							</ul> <!-- .dropdown-menu -->
						</li>
						<li class="dropdown menu-large">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shortcodes</a>
							<ul class="dropdown-menu megamenu row">

								<li class="col-sm-3">
									<ul>
										<li><a href="shortcode_accordion.html">accordion</a></li>
										<li><a href="shortcode_alerts.html">Alerts</a></li>
										<li><a href="shortcode_button.html">Buttons</a></li>
										<li><a href="shortcode_columns.html">Columns</a></li>
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="shortcode_divider.html">Divider</a></li>
										<li><a href="shortcode_dropcaps.html">Dropcaps</a></li>
										<li><a href="shortcode_heading.html">Heading</a></li>
										<li><a href="shortcode_modals.html">Modals</a></li>
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="shortcode_popover.html">Popover</a></li>
										<li><a href="shortcode_pricetable.html">Price Table</a></li>
										<li><a href="shortcode_progressbar.html">Progressbar</a></li>
										<li><a href="shortcode_progresscircle.html">Progress Circle</a></li>
									</ul>
								</li>

								<li class="col-sm-3">
									<ul>
										<li><a href="shortcode_tables.html">Tables</a></li>
										<li><a href="shortcode_tabs.html">Tabs</a></li>
										<li><a href="shortcode_timeline.html">Timeline</a></li>
										<li><a href="shortcode_tooltip.html">Tooltip</a></li>
									</ul>
								</li>

							</ul> <!-- .dropdown-menu megamenu row -->
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul> <!-- .nav navbar-nav -->
				</div> <!-- .collapse navbar-collapse -->

			</div> <!-- .container -->
		</nav> <!-- .navbar -->
	</header> <!-- .site-header -->