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
<!--     <link href="<?php echo base_url();?>assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">   -->
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
     
    <link href="<?php echo base_url();?>assets/css/villareal-turquoise.css" rel="stylesheet" type="text/css" id="css-primary>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicon.png">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>

    <style>

#mapid {
	height: 400px !important;
}


</style>
	
    <title>Rental Apartment</title>
</head>

<body class="" >
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
			<a href="<?php echo base_url();?>" class="nav-link ">
				Home
			</a>	

			
		</li>

		<li class="nav-item nav-item-parent">
			<a href="<?php echo base_url();?>property" class="nav-link <?php if($activelink=='properties'){ echo 'active';}?>">
				Properties
			</a>

			<ul class="sub-menu">
				<li><a href="<?php echo base_url();?>property/newproperties">New Properties</a></li>
				
			</ul>		
		</li>	
		
        
        <li class="nav-item ">
			<a href="<?php echo base_url();?>contactus" class="nav-link <?php if($activelink=='contactus'){ echo 'active';}?>">
				Contact Us
			</a>	
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
            
            <a href="<?php echo base_url();?>login" class="nav-link <?php if($activelink=='login'){ echo 'active';}?>">
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