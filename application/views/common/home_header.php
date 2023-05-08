<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/libraries/chartist/chartist.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">    
    <link href="<?php echo base_url();?>assets/css/villareal-turquoise.css" rel="stylesheet" type="text/css" id="css-primary">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicon.png">
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <title>Real Estate</title>
</head>

<body class="cover-pull-top header-transparent">
<div class="page-wrapper">
				
    	<div class="header-wrapper">
	<div class="header header-small">
		<div class="header-inner">
			<div class="container">
				<div class="header-top">
					<div class="header-top-inner">
						<a class="header-logo" href="<?php echo base_url();?>">
							<span class="header-logo-shape"></span> 
							<span class="header-logo-text">Rental Apartment</span>
						</a><!-- /.header-logo -->
						
                        <?php if($this->session->userdata('loginid')){?>
						<a class="header-action" href="<?php echo base_url();?>property/add_property">
							<i class="fa fa-upload"></i> <span>Upload Property</span>
						</a><!-- /.header-action -->
						<?php }?>
						
<div class="nav-primary-wrapper collapse navbar-toggleable-sm">
	<ul class="nav nav-pills nav-primary">
		<li class="nav-item ">
			<a href="<?php echo base_url();?>" class="nav-link active">
				Home
			</a>	

			<!--<ul class="sub-menu">
				<li><a href="index-static-image.html">Static Image</a></li>
				<li><a href="index-static-image-filter.html">Static Image With Filter</a></li>
				<li><a href="index-static-image-filter-center.html">Static Image Filter Center</a></li>
				<li><a href="index-static-image-filter-center.html">Static Image Filter Center</a></li>
				<li><a href="index-carousel.html">Carousel</a></li>
				<li><a href="index-osm-filter-horizontal.html">OSM Horizontal Filter</a></li>
				<li><a href="index-google-maps-filter-vertical.html">Google Maps Vertical Filter</a></li>
				<li><a href="index-google-maps-filter-horizontal.html">Google Maps Horizontal Filter</a></li>
			</ul>-->
		</li>

		<li class="nav-item nav-item-parent">
			<a href="<?php echo base_url();?>property" class="nav-link ">
				Properties
			</a>

			<ul class="sub-menu">
				<li><a href="<?php echo base_url();?>property/newproperties">New Properties</a></li>
				
			</ul>			
		</li>	
		
		<!--<li class="nav-item nav-item-parent	">
			<a href="#" class="nav-link ">
				Agents
			</a>	

			<ul class="sub-menu">
				<li><a href="agents-row.html">Agents Row</a></li>
				<li><a href="agents-grid.html">Agents Grid</a></li>
				<li><a href="agents-detail.html">Agent Detail</a></li>
				<li><a href="agents-submit.html">Submit Agent</a></li>
				<li><a href="agencies-row.html">Agencies Row</a></li>
				<li><a href="agencies-detail.html">Agency Detail</a></li>
				<li><a href="agencies-submit.html">Submit Agency</a></li>
			</ul>		
		</li>-->

		<!--<li class="nav-item nav-item-parent">
			<a href="#" class="nav-link ">
				Pages
			</a>

			<ul class="sub-menu">				
				<li><a href="sticky-header.html">Sticky Header</a></li>
				<li><a href="pricing.html">Pricing Tables</a></li>
				<li><a href="filters.html">Filters</a></li>
				<li><a href="boxes.html">Boxes</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="invoice.html">Invoice</a></li>
				<li><a href="messages.html">Messages</a></li>
				<li><a href="grid.html">Grid</a></li>
				<li><a href="registration.html">Registration</a></li>
				<li><a href="login.html">Login</a></li>
				<li><a href="reset-password.html">Reset Password</a></li>
				<li><a href="tables.html">Tables</a></li>
				<li><a href="terms-conditions.html">Terms &amp; Conditions</a></li>
				<li class="nav-item-parent">
					<a href="#">Sample Submenu</a>

					<ul class="sub-menu">
						<li><a href="#">Item 1</a></li>
						<li><a href="#">Item 2</a></li>
						<li><a href="#">Item 3</a></li>
					</ul>
				</li>
				<li><a href="403.html">403 - Access Forbidden</a></li>
				<li><a href="404.html">404 - Not Found</a></li>
				<li><a href="500.html">500 - Internal Error</a></li>						
			</ul>
		</li>	-->

		<li class="nav-item ">
			<a href="<?php echo base_url();?>contactus" class="nav-link ">
				Contact Us
			</a>	

			<!--<ul class="sub-menu">
				<li><a href="blog.html">Row Layout</a></li>
				<li><a href="blog-fullwidth.html">Fullwidth Layout</a></li>
				<li><a href="blog-grid.html">Grid Version</a></li>
				<li><a href="blog-grid-fullwidth.html">Grid Fullwidth</a></li>
				<li><a href="blog-detail.html">Post Detail</a></li>
				<li><a href="blog-detail-left.html">Detail Left Sidebar</a></li>
			</ul>-->		
		</li>	

		<li class="nav-item nav-item-parent">
			<?php if($this->session->userdata('loginid')){?>
			<a href="<?php echo base_url();?>login" class="nav-link ">
				<?php echo $this->session->userdata('username');?>
			</a>	
            
            <ul class="sub-menu">
				<li><a href="<?php echo base_url()?>user/profile">Profile</a></li>
				<li><a href="<?php echo base_url();?>property/myproperties">My Properties</a></li>
                <?php if($this->session->userdata('role')=='admin'){?>
				<li><a href="<?php echo base_url()?>admin/view_properties">Properties</a></li>
				<li><a href="<?php echo base_url()?>admin/view_users">Users</a></li>
				<li><a href="<?php echo base_url()?>admin/view_amenities">Amenities</a></li>
                <?php }?>
                <li><a href="<?php echo base_url();?>user/changepassword">Change Password</a></li>
                <li><a href="<?php echo base_url();?>logout">Logout</a></li>
			</ul>
            
            <?php }else{?>
            
            <a href="<?php echo base_url();?>login" class="nav-link ">
				Login
			</a>
            
            <ul class="sub-menu">
           		 <li><a href="<?php echo base_url();?>login">Login</a></li>
				<li><a href="<?php echo base_url();?>login/signup">Sign-Up</a></li>
				
			</ul>
            
			<?php }?>	

						
		</li>																
	</ul><!-- /.nav -->
</div><!-- /.nav-primary -->


						<button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target=".nav-primary-wrapper">
	                        <span></span>
	                        <span></span>
	                        <span></span>
	                    </button>						
					</div><!-- /.header-top-inner -->
				</div><!-- /.header-top -->
			</div><!-- /.container -->
		</div><!-- /.header-inner -->
	</div><!-- /.header -->
</div><!-- /.header-wrapper-->