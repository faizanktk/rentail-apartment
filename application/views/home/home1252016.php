<div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        	

	            <div class="content">
	                <div class="cover cover-center">
	<div class="cover-image"></div><!-- /.cover-image -->

	<div class="cover-title">
		<div class="container">
			<div class="cover-title-inner">
				<h1>Start Searching Best Properties</h1>

				<p> Villareal implements features like favorites, compare properties, advanced search fields. For more information check out full list of features.</p>
			</div><!-- /.cover-title-->

			<form method="get" action="<?php echo base_url();?>property/index" />
				<div class="form-group col-sm-3">
					<select class="form-control" name="state">
						<option value="">Location</option>
                        <?php foreach($states as $state){?>
						<option value="<?php echo $state['id'];?>"><?php echo $state['name']?></option>
                        <?php } ?>
					</select>
				</div><!-- /.form-group -->

				<div class="form-group col-sm-3">
					<select class="form-control" name="type">
						<option value="">Property Type</option>
						<option value="flate" >Flate</option>
                     	<option value="house" >House</option>
                     	<option value="apartment" >Apartment</option>
                     	<option value="villa" >Villa</option>
                      	<option value="condos" >Condos</option>
                      	<option value="room" >Room</option>
					</select>
				</div><!-- /.form-group -->					

				<div class="form-group col-sm-2">
					<button type="submit" class="btn btn-primary btn-block">Search</button>
				</div>
			</form>
		</div><!-- /.container -->
	</div><!-- /.cover-title -->
</div><!-- /.cover -->

<div class="information-bar">
	<div class="container">
		<i class="fa fa-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#">Praesent ullamcorper justo </a>.
	</div><!-- /.container -->
</div><!-- /.information-bar -->

<div class="container">
	<div class="page-header">
		<h1>Make Something Great. Playfully</h1> 

		<ul>
			<li><a href="">Recent</a></li>
			<li><a href="">Featured</a></li>
			<li><a href="">Reduced</a></li>
			<li><a href="">Sale</a></li>
		</ul>
	</div><!-- /.page-header -->

	<div class="row">
    
    <?php 
	$i=0;
	foreach($properties as $property){ 
		$cover_image = base_url()."uploads/".$property['cover_image'];
		
		$favourit_data = $this->common_model->get_table_data('favourit_property','id',array('property_id'=>$property['id'],'user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		if($favourit_data['id']>0){
			$favourit = '1';
			$style = "style='color:red'";
		}else{
			$favourit = '0';
			$style = "style='color:white'";
		}
		
	if($i==0){
	?>
    
    
	<div class="col-md-6">
		
		<div class="listing-box listing-box-simple">
	<div class="listing-box-image" style="background-image: url('<?php echo $cover_image;?>')">
		<div class="listing-box-image-title">
			<h2><a href="properties-detail-standard.html"><?php echo $property['title'];?></a></h2>
			<h3><?php echo '$ '.$property['price'];?> / per month</h3>
		</div><!-- /.listing-box-image-title -->

		<span class="listing-box-image-links" id="favrit_<?php echo $property['id']?>">
        
			<?php if($this->session->userdata('loginid')){ ?>
            
			<a href="javascript:user_favourits(<?php echo $property['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
            <i class="fa fa-heart" <?php echo $style;?> id="heart_<?php echo $property['id'];?>" ></i> <span>Add to favorites</span></a>
            
            
			<?php }else{?>
            
            <a href="javascript:void(0)"><i class="fa fa-heart" ></i> <span>Add to favorites</span></a>
            <?php }?>
            
			<a href="<?php echo base_url().'property/property_detail/'.$property['id']?>"><i class="fa fa-search"></i> <span>View Detail</span></a>
			<!--<a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare</span></a>-->
		</span>
	</div><!-- /.listing-box-image -->			
</div><!-- /.listing-box -->
	</div><!-- /.col-* -->

	<?php }else{ ?>		
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="listing-box">
	<div class="listing-box-image" style="background-image: url('<?php echo $cover_image;?>')">
		<!--<div class="listing-box-image-label">Featured</div>--><!-- /.listing-box-image-label -->
		
		<span class="listing-box-image-links" id="favrit_<?php echo $property['id']?>">
        	
            <?php if($this->session->userdata('loginid')){ ?>
            
			<a href="javascript:user_favourits(<?php echo $property['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
            
            <i class="fa fa-heart" <?php echo $style;?> id="heart_<?php echo $property['id'];?>" ></i> <span>Add to favorites</span></a>
            
            
            <?php }else{?>
            <a href="javascript:void(0)"><i class="fa fa-heart"></i> <span>Add to favorites</span></a>
            <?php }?>
            
			<a href="<?php echo base_url().'property/property_detail/'.$property['id']?>"><i class="fa fa-search"></i> <span>View detail</span></a>
			<!--<a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare property</span></a> -->
		</span>		
	</div><!-- /.listing-box-image -->

	<div class="listing-box-title">
		<h2><a href="<?php echo base_url().'property/property_detail/'.$property['id'] ?>"><?php echo $property['title'];?></a></h2>
		<h3><?php echo '$ '.$property['price'];?></h3>
	</div><!-- /.listing-box-title -->

	<div class="listing-box-content">
		<dl>
			<dt>Type</dt><dd><?php echo ucfirst($property['property_type']);?></dd>
			<dt>Location</dt><dd><?php echo $property['state_name'];?></dd>
			<dt>Area</dt><dd><?php echo $property['coverd_area'];?> sqft</dd>
		</dl>
	</div><!-- /.listing-box-cotntent -->
</div><!-- /.listing-box -->
				</div><!-- /.col-* -->
			
				<!-- /.col-* -->
			
<?php } 
	$i++;
	}?>		

</div><!-- /.row -->
<!-------- End loop ---------->
	<div class="push-top">
		<div class="background-white fullwidth">
	<div class="boxes">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="box">
					<div class="box-icon">
						<i class="fa fa-diamond"></i>
					</div><!-- /.box-icon -->

					<div class="box-content">
						<h2>WE Commit</h2>
						<p>Nunc eleifend, nibh sit amet sodales eleifend, justo purus porta ante, congue vestibulum nunc neque eget libero.</p>
					</div><!-- /.box-content -->
				</div><!-- /.box -->
			</div><!-- /.col-* -->

			<div class="col-md-6 col-lg-3">
				<div class="box">
					<div class="box-icon">
						<i class="fa fa-star-o"></i>
					</div><!-- /.box-icon -->

					<div class="box-content">
						<h2>We Relate</h2>
						<p>Donec ornare risus et purus semper consequat. Suspendisse ultrices in sem vel pharetra.</p>
					</div><!-- /.box-content -->
				</div><!-- /.box -->
			</div><!-- /.col-* -->

			<div class="col-md-6 col-lg-3">
				<div class="box">
					<div class="box-icon">
						<i class="fa fa-cog"></i>
					</div><!-- /.box-icon -->

					<div class="box-content">
						<h2>We Deliver</h2>
						<p>Integer pretium ipsum vel arcu consectetur, eu rhoncus nisi tristique. Sed euismod, neque non maximus lobortis.</p>
					</div><!-- /.box-content -->
				</div><!-- /.box -->
			</div><!-- /.col-* -->

			<div class="col-md-6 col-lg-3">
				<div class="box">
					<div class="box-icon">
						<i class="fa fa-desktop"></i>
					</div><!-- /.box-icon -->

					<div class="box-content">
						<h2>Responsible</h2>
						<p>Suspendisse auctor tincidunt enim, et pulvinar odio consequat quis. Nam eget neque porttitor.</p>
					</div><!-- /.box-content -->
				</div><!-- /.box -->
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</div><!-- /.boxes -->
</div>

	</div>

	<div class="push-bottom">
		<div class="page-header">
	<h1>Popular Property Categories</h1>

	<p>
		Check the best property categories avaialable in our directory.
	</p>
</div><!-- /.page-header -->

<div class="categories">
	<div class="row">
		<div class="col-lg-8">
			<div class="row">
				<div class="col-sm-6">
					<div class="category" style="background-image: url('assets/img/tmp/tmp-6.jpg');">
						<a href="<?php echo base_url();?>property/index?type=villa" class="category-link">
							<span class="category-content">
								<span class="category-title">Villas</span>
								<span class="category-subtitle"><?php echo $count_villa;?> submissions in directory</span>
								<span class="btn btn-primary">View List</span>
							</span><!-- /.category-content -->
						</a>
					</div><!-- /.category -->
				</div><!-- /.col-* -->

				<div class="col-sm-6">
					<div class="category">
						<a href="<?php echo base_url();?>property/index?type=house" class="category-link">
							<span class="category-content">
								<span class="category-title">Houses</span>
								<span class="category-subtitle"><?php echo $count_house;?> submissions in directory</span>
								<span class="btn btn-primary">View List</span>
							</span><!-- /.category-content -->
						</a>
					</div><!-- /.category -->
				</div><!-- /.col-* -->
			</div><!-- /.row -->

			<div class="category" style="background-image: url('assets/img/tmp/tmp-13.jpg');">
				<a href="<?php echo base_url();?>property/index?type=condos" class="category-link">
					<span class="category-content">
						<span class="category-title">Condos</span>
						<span class="category-subtitle"><?php echo $count_condos;?> submissions in directory</span>
						<span class="btn btn-primary">View List</span>
					</span><!-- /.category-content -->
				</a>
			</div><!-- /.category -->
		</div><!-- /.col-* -->

		<div class="col-lg-4">
			<div class="category category-vertical" style="background-image: url('assets/img/tmp/tmp-7.jpg');">
				<a href="<?php echo base_url();?>property/index?type=apartment" class="category-link">
					<span class="category-content">
						<span class="category-title">Apartments</span>
						<span class="category-subtitle"><?php echo $count_apartment;?> submissions in directory</span>
						<span class="btn btn-primary">View List</span>
					</span><!-- /.category-content -->
				</a>
			</div><!-- /.category -->
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.categories -->
	</div>
</div><!-- /.container -->

<div class="image-wrapper">
	<div class="container">
		<div class="row">
			<div class="image-description-wrapper col-md-12 col-lg-7">			
				<div class="image-description">
					<h2>Real Estate Application Kit</h2>

					<p>
						Villareal is advanced real estate application kit. It is written upon Bootstrap 4 framework to offer best coding and user experience. It is easy to add or modify any part of the HTML template.
					</p>

					<a href="blog.html" class="btn btn-primary">View Blog Template</a>
				</div><!-- /.image-description -->
			</div><!-- /.col-* -->			
		</div><!-- /.row -->		
	</div><!-- /.container -->		

	<div class="image-holder col-lg-5 col-lg-offset-7 hidden-md-down">
	</div><!-- /.col-* -->
</div><!-- /.image-wrapper -->

<div class="container">
	<div class="page-header">
		<h2>Featured Properties</h2>
	</div>

	<div class="listing-box-wrapper listing-box-background">
	<div class="listing-carousel-wrapper">
		<div class="listing-carousel">		
	<?php	foreach($properties as $property){ 
		$cover_image = base_url()."uploads/".$property['cover_image'];	
		
			$favourit_data = $this->common_model->get_table_data('favourit_property','id',array('property_id'=>$property['id'],'user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		if($favourit_data['id']>0){
			$favourit = '1';
			$style = "style='color:red'";
		}else{
			$favourit = '0';
			$style = "style='color:white'";
		}
		
		?>		
				<div class="listing-box">
                    <div class="listing-box-image" style="background-image: url('<?php echo $cover_image; ?>')">
                        <!--<div class="listing-box-image-label">Featured</div>--><!-- /.listing-box-image-label -->
                        
                        <span class="listing-box-image-links" id="favrits_<?php echo $property['id']?>">
                        
                        <?php if($this->session->userdata('loginid')){ ?>
            
                            <a href="javascript:user_favouritss(<?php echo $property['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
                            <i class="fa fa-heart" <?php echo $style;?> id="hearts_<?php echo $property['id'];?>" ></i> <span>Add to favorites</span></a>
                            
                            
                            <?php }else{?>
                            
                            <a href="javascript:void(0)"><i class="fa fa-heart" ></i> <span>Add to favorites</span></a>
                            <?php }?>
                        
                        
                            
                            
                            
                            
                            <a href="<?php echo base_url().'property/property_detail/'.$property['id'] ?>"><i class="fa fa-search"></i> <span>View detail</span></a>
                            <!--<a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare property</span></a> -->
                        </span>		
                    </div><!-- /.listing-box-image -->
                
                    <div class="listing-box-title">
                        <h2><a href="<?php echo base_url().'property/property_detail/'.$property['id'] ?>"><?php echo $property['title'];?></a></h2>
                        <h3>$ <?php echo $property['price'];?></h3>
                    </div><!-- /.listing-box-title -->
                
                    <div class="listing-box-content">
                        <dl>
                            <dt>Type</dt><dd><?php echo $property['title'];?></dd>
                            <dt>Location</dt><dd><?php echo $property['state_name'];?></dd>
                            <dt>Area</dt><dd><?php echo $property['coverd_area'];?> sqft</dd>
                        </dl>
                    </div><!-- /.listing-box-cotntent -->
                </div><!-- /.listing-box -->
		<?php } ?>					
		</div>
	</div>
</div>

	<div class="partners">
	<div class="partner-wrapper">
		<a href="#"><img src="assets/img/tmp/partner-1.jpg" alt=""></a>
	</div><!-- /.partner-wrapper -->

	<div class="partner-wrapper">
		<a href="#"><img src="assets/img/tmp/partner-2.jpg" alt=""></a>
	</div><!-- /.partner-wrapper -->

	<div class="partner-wrapper">
		<a href="#"><img src="assets/img/tmp/partner-3.jpg" alt=""></a>
	</div><!-- /.partner-wrapper -->

	<div class="partner-wrapper">
		<a href="#"><img src="assets/img/tmp/partner-4.jpg" alt=""></a>
	</div><!-- /.partner-wrapper -->	

	<div class="partner-wrapper partner-wrapper-no-right-border">
		<a href="#"><img src="assets/img/tmp/partner-1.jpg" alt=""></a>
	</div><!-- /.partner-wrapper -->		
</div><!-- /.partners -->
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
    
    
 