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
	
    <title>Real Estate - Properties</title>
</head>

<body class="">
	<div class="page-wrapper">
		<div class="dashboard-wrapper">
			<div class="dashboard-sidebar">
				<div class="dashboard-title">
					<a href="<?php echo base_url();?>" target="_blank">
						<span class="logo-shape"></span> Real Estate
					</a>

					<button class="navbar-toggler pull-xs-right hidden-lg-up" type="button" data-toggle="collapse" data-target=".dashboard-nav-primary">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>						
				</div><!-- /.dashboard-title -->

				<div class="dashboard-user hidden-md-down">
					<!--<div class="dashboard-user-image" style="background-image: url('assets/img/tmp/agent-1.jpg');">-->
                    <div class="dashboard-user-image" style="background-image: url('<?php echo base_url()."uploads/".$profile_image;?>');">
					</div><!-- /.dashboar-user-image -->
                    
                    <?php if($fullname){?>
                    
					<strong><?php echo $fullname;?></strong>
                    <?php }else{?>
                    	<strong><?php echo $this->session->userdata('username');?></strong>
                    <?php }?>
				</div><!-- /.dashboard-user -->

				<div class="dashboard-nav-primary collapse navbar-toggleable-md">
					<ul class="nav nav-stacked">
                    
                    	<<!-- li class="nav-item">
							<a href="<?php echo base_url()?>user/profile" class="nav-link <?php if($activelink=='profile'){ ?> active <?php }?>">
								<i class="fa fa-user"></i> Profile
							</a>
						</li>	 -->
						
                        
                        <!-- <li class="nav-item">
							<a href="<?php echo base_url();?>property/myproperties" class="nav-link <?php if($activelink=='myproperties'){ ?> active <?php }?>">
								<i class="fa fa-building"></i> My Properties
							</a>
						</li> -->

						<!--<li class="nav-item">
							<a href="dashboard-agents.html" class="nav-link ">
								<i class="fa fa-suitcase"></i> Agents
							</a>
						</li>					

						<li class="nav-item">
							<a href="dashboard-agencies.html" class="nav-link ">
								<i class="fa fa-globe"></i> Agencies
							</a>
						</li>

						<li class="nav-item">
							<a href="dashboard-charts.html" class="nav-link ">
							<i class="fa fa-pie-chart"></i> Charts
							</a>
						</li>-->
						
                        <?php if($this->session->userdata('role')=='admin'){?>
                        
                        <li class="nav-item">
							<a href="<?php echo base_url()?>admin/view_properties" class="nav-link <?php if($activelink=='properties'){ ?> active <?php }?>">
								<i class="fa fa-building"></i> Properties
							</a>
						</li>
                        
						<li class="nav-item">
							<a href="<?php echo base_url()?>admin/view_users" class="nav-link <?php if($activelink=='users'){ ?> active <?php }?>">
								<i class="fa fa-users"></i> Users
							</a>
						</li>
                        
                        <li class="nav-item">
							<a href="<?php echo base_url()?>admin/view_amenities" class="nav-link <?php if($activelink=='amenities'){ ?> active <?php }?>">
								<i class="fa fa-plus-square"></i> Amenities
							</a>
						</li>	
                        
                        					
						<?php }?>
                        
                        <?php if($this->session->userdata('role')!='admin'){?>
                        <li class="nav-item">
							<a href="<?php echo base_url()?>user/upgrade" class="nav-link <?php if($activelink=='upgrade'){ ?> active <?php }?>">
								<i class="fa fa-arrow-circle-up"></i> Upgrade Account
							</a>
						</li>
                        <?php }?>
                         <li class="nav-item">
							<a href="<?php echo base_url()?>user/message_inbox" class="nav-link <?php if($activelink=='message_inbox'){ ?> active <?php }?>">
                            <?php $count_mess = $this->common_model->count_rows('message_inbox',array('to_id'=>$this->session->userdata('loginid'),'status_read'=>'0'));?>
								<i class="fa fa-inbox" aria-hidden="true"></i> Inbox <span class="badge" style="color:#ffffff; background: #c9302c; border-radius: 100%; padding: 1px 9px 6px 9px;"><?php echo $count_mess;?></span>
							</a>
						</li>
                        
                        
                        <li class="nav-item">
							<a href="<?php echo base_url()?>user/changepassword" class="nav-link <?php if($activelink=='password'){ ?> active <?php }?>">
								<i class="fa fa-key"></i> Change Password
							</a>
						</li>
                        
                        
						<li class="nav-item">
							<a href="<?php echo base_url()?>logout" class="nav-link">
								<i class="fa fa-sign-out"></i> Logout
							</a>
						</li>
                        
                        
                        <li class="nav-item">
							<a href="<?php echo base_url()?>" class="nav-link" target="_blank">
								<i class="fa fa-home"></i> Back to Home
							</a>
						</li>
                        					
					</ul>
				</div><!-- /.dashboard-nav-primary -->

				<!--<div class="dashboard-tags hidden-md-down">
					<h2>Tags</h2>

					<ul>
						<li><a href="#" class="tag-red">Most Recent</a></li>
						<li><a href="#" class="tag-green">Properties For Review</a></li>
						<li><a href="#" class="tag-blue">Open Houses</a></li>
						<li><a href="#" class="tag-yellow">Pricing Plans</a></li>
						<li><a href="#">Interesting Reviews</a></li>
					</ul>
				</div>--><!-- /.dashboard-tags -->

				<div class="dashboard-text hidden-md-down">
					<h2>Do you need help?</h2>

					<p>
						If you have any questions, feel free to use our profile form. We will contact you as soon as possible.
					</p>
				</div><!-- /.dashboard-text -->
				
			</div><!-- /.dashboard-sidebar -->
<style>
.has-error{
	color:#FF0000;
}
</style>