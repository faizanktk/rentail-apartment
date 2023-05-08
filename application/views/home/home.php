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

				<p>An Interactive platform for those who are looking for a house of their own choise </p>
			</div><!-- /.cover-title-->
		 
			<form method="get" action="<?php echo base_url();?>property/index" />
            
            <div class="form-group col-sm-3">
               
					<select class="form-control" name="state" onchange="search_getcities(this.value)">
						<option value="">State</option>
                        <?php foreach($states as $state){?>
						<option value="<?php echo $state['id'];?>"><?php echo $state['name']?></option>
                        <?php } ?>
					</select>
				</div><!-- /.form-group -->
                
				<div class="form-group col-sm-3" id="search_cities_id">
               
					<select class="form-control" name="city">
						<option value="">City</option>
                        <?php foreach($cities as $city){?>
						<option value="<?php echo $city['id'];?>"><?php echo $city['name']?></option>
                        <?php } ?>
					</select>
				</div><!-- /.form-group -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-multiselect.css" type="text/css"/>
<!---------------------------------------------------->
<!-- <div class="form-group col-sm-3">

<select id="example-multiple-optgroups">
    <optgroup label="Group 1" class="group-1">
        <option value="1-1">Option 1.1</option>
        <option value="1-2" selected="selected">Option 1.2</option>
        <option value="1-3" selected="selected">Option 1.3</option>
    </optgroup>
    <optgroup label="Group 2" class="group-2">
        <option value="2-1">Option 2.1</option>
        <option value="2-2">Option 2.2</option>
        <option value="2-3">Option 2.3</option>
    </optgroup>
</select>
</div> -->
                <!--<select id="example-multiple-optgroups" class="form-control" multiple="multiple">
                
                <?php $category = $this->common_model->get_table_data('category','*');?>
                
                <?php foreach($category as $cat){ ?>
                <optgroup label="<?php echo $cat['category_name'];?>">
                	<?php $types = $this->common_model->get_table_data('category_type','*',array('category_id'=>$cat['id']));?>
                    <?php foreach($types as $typ){?>
                    	<option value="AK"><?php echo $typ['type_name']; ?></option>
                    <?php }?>
                
                </optgroup>
                
                <?php }?>
              
                   
                </select>-->
                
                
				
				
<!----------------------------------------------------->
				
               <!-- <div class="form-group col-sm-3">
					<select class="form-control" name="type">
						<option value="">Property Type</option>
						<option value="flat" >Flat</option>
                     	<option value="house" >House</option>
                     	<option value="apartment" >Apartment</option>
                     	<option value="villa" >Villa</option>
                      	<option value="condos" >Condos</option>
                      	<option value="room" >Room</option>
					</select>
				</div>-->	<!-- /.form-group -->					

				<div class="form-group col-sm-2">
					<button type="submit" class="btn btn-primary btn-block">Search</button>
				</div>
			</form>
		</div><!-- /.container -->
	</div><!-- /.cover-title -->
</div><!-- /.cover -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>-->



<script type="text/javascript">
					//$('#example-multiple-optgroups').multiselect();
				</script>
<script>
 $(document).ready(function() {
       // $('#example-getting-started').multiselect({enableClickableOptGroups: true});
		// $('#example-multiple-optgroups').multiselect();
    });
	
</script>
<div class="information-bar">
	<div class="container">
		<i class="fa fa-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#">Praesent ullamcorper justo </a>.
	</div><!-- /.container -->
</div><!-- /.information-bar -->

<div class="container">
	<div class="page-header">
		<h1>Make Something Great. Playfully</h1> 

		<ul>
			<!--<li><a href="">List New Rental Property</a></li>
			<li><a href="">Featured</a></li>
			<li><a href="">Reduced</a></li>
			<li><a href="">Sale</a></li>-->
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
			<h2><a href="<?php echo base_url().'property/property_detail/'.$property['id']?>"><?php echo $property['title'];?></a></h2>
			<h3><?php echo '$ '.$property['price'];?> / per month</h3>
		</div><!-- /.listing-box-image-title -->

		<span class="listing-box-image-links" id="favrit_<?php echo $property['id']?>">
        
			<?php if($this->session->userdata('loginid')){ ?>
            
			<a id="favrit_a_<?php echo $property['id']?>" href="javascript:user_favourits(<?php echo $property['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
            <i class="fa fa-heart" <?php echo $style;?> id="heart_<?php echo $property['id'];?>" ></i> <span>Add to favorites</span></a>
            
            
			<?php }else{?>
            
            <a href="javascript:void(0)" ><i class="fa fa-heart" ></i> <span>Add to favorites</span></a><!--data-toggle="modal" data-target="#login-modal"-->
            <?php }?>
            
			<a href="<?php echo base_url().'property/property_detail/'.$property['id']?>"><i class="fa fa-search"></i> <span>View Detail</span></a>
			<!--<a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare</span></a>-->
		</span>
	</div><!-- /.listing-box-image -->			
</div><!-- /.listing-box -->
	</div><!-- /.col-* -->

	<?php }else{ ?>		
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="listing-box ">
	<div class="listing-box-image listing-box-simple" style="background-image: url('<?php echo $cover_image;?>')">
		 <?php if($property['featured']=='yes'){?>
        <div class="listing-box-image-label">Featured</div><!-- /.listing-box-image-label -->
		<?php } ?>
		<span class="listing-box-image-links" id="favrit_<?php echo $property['id']?>">
        	
            <?php if($this->session->userdata('loginid')){ ?>
            
			<a id="favrit_a_<?php echo $property['id']?>" href="javascript:user_favourits(<?php echo $property['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
            
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
			<dt>Location</dt><dd><?php echo $property['city_name'];?></dd>
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
					<h2>List your property now</h2>

					<p>
						Nunc eleifend, nibh sit amet sodales eleifend, justo purus porta ante, congue vestibulum nunc neque eget libero.
					</p>

					<a href="<?php echo base_url();?>property/add_property" class="btn btn-primary"><i class="fa fa-upload"></i> <span>Upload Property</span></a>
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
	<?php	foreach($featured as $prop_row){ 
		$cover_image = base_url()."uploads/".$prop_row['cover_image'];	
		
			$favourit_data = $this->common_model->get_table_data('favourit_property','id',array('property_id'=>$prop_row['id'],'user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		if($favourit_data['id']>0){
			$favourit = '1';
			$style = "style='color:red'";
		}else{
			$favourit = '0';
			$style = "style='color:white'";
		}
		
		?>		
				<div class="listing-box">
                    <div class="listing-box-image listing-box-simple" style="background-image: url('<?php echo $cover_image; ?>')">
                        <?php if($prop_row['featured']=='yes'){?>
                        <div class="listing-box-image-label">Featured</div><!-- /.listing-box-image-label -->
                        <?php }?>
                        <span class="listing-box-image-links" id="favrits_<?php echo $prop_row['id']?>">
                        
                        <?php if($this->session->userdata('loginid')){ ?>
            
                            <a id="favrits_a_<?php echo $prop_row['id']?>" href="javascript:user_favouritss(<?php echo $prop_row['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
                            <i class="fa fa-heart" <?php echo $style;?> id="hearts_<?php echo $prop_row['id'];?>" ></i> <span>Add to favorites</span></a>
                            
                            
                            <?php }else{?>
                            
                            <a href="javascript:void(0)"><i class="fa fa-heart" ></i> <span>Add to favorites</span></a>
                            <?php }?>
                        
                        
                            
                            
                            
                            
                            <a href="<?php echo base_url().'property/property_detail/'.$prop_row['id'] ?>"><i class="fa fa-search"></i> <span>View detail</span></a>
                            <!--<a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare property</span></a> -->
                        </span>		
                    </div><!-- /.listing-box-image -->
                
                    <div class="listing-box-title">
                        <h2><a href="<?php echo base_url().'property/property_detail/'.$prop_row['id'] ?>"><?php echo $prop_row['title'];?></a></h2>
                        <h3>$ <?php echo $property['price'];?></h3>
                    </div><!-- /.listing-box-title -->
                
                    <div class="listing-box-content">
                        <dl>
                            <dt>Type</dt><dd><?php echo $prop_row['title'];?></dd>
                            <dt>Location</dt><dd><?php echo $prop_row['city_name'];?></dd>
                            <dt>Area</dt><dd><?php echo $prop_row['coverd_area'];?> sqft</dd>
                        </dl>
                    </div><!-- /.listing-box-cotntent -->
                </div><!-- /.listing-box -->
		<?php } ?>					
		</div>
	</div>
</div>

	
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
    
    
 