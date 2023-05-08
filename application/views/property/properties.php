  <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Properties </h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				
				<li class="active">Properties</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

	            <div class="content">
	                <div class="container">
	<div class="filter filter-gray push-bottom">
		<form method="get" action="<?php echo base_url();?>property/index">
			<div class="row">
            
            
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>State</label>
                            
                            <select class="form-control" name="state" onchange="search_getcities(this.value)" >
                                        <option value="">State</option>
                                        <?php foreach($states as $state){?>
                                        <option <?php if($this->input->get('state')==$state['id']){ ?> selected="selected" <?php }?> value="<?php echo $state['id'];?>"><?php echo $state['name']?></option>
                                        <?php } ?>
                            </select>
                        </div><!-- /.form-group -->
          		  </div><!-- /.col-* -->
            
            
            
	<div class="col-md-2">
		<div class="form-group">
			<label>City</label>
			
            <span id="search_cities_id">
			<select class="form-control" name="city">
						<option value="">City</option>
                        <?php foreach($cities as $city){?>
						<option <?php if($this->input->get('city')==$city['id']){ ?> selected="selected" <?php }?> value="<?php echo $city['id'];?>"><?php echo $city['name']?></option>
                        <?php } ?>
			</select>
            </span>
		</div><!-- /.form-group -->
	</div><!-- /.col-* -->

	<div class="col-md-2">
		<div class="form-group">
			<label>Keyword/Zipcode</label>
			<input type="text" class="form-control" name="key" value="<?php echo $this->input->get('key');?>">
		</div><!-- /.form-group -->
	</div><!-- /.col-* -->

	<div class="col-md-2">
		<div class="form-group">
			<label>Price From</label>
			<input type="text" class="form-control" name="from" value="<?php echo $this->input->get('from');?>">
		</div><!-- /.form-group -->
	</div><!-- /.col-* -->

	<div class="col-md-2">
		<div class="form-group">
			<label>Price To</label>
			<input type="text" class="form-control" name="to" value="<?php echo $this->input->get('to');?>">
		</div><!-- /.form-group -->		
	</div><!-- /.col-* -->

	<div class="col-md-2">
		<div class="form-group-btn form-group-btn-placeholder-gap">
			<button type="submit" class="btn btn-primary btn-block">Filter</button>
		</div><!-- /.form-group -->		
	</div><!-- /.col-* -->			
</div><!-- /.row -->
			<div class="row filter-options">
	<div class="col-sm-6">
		<div class="filter-sort">
			<strong>Sort By</strong>

			<div class="checkbox-inline">
				<label><input type="checkbox" name="price" value="price" <?php if($this->input->get('price')=='price'){?>checked="checked"<?php }?>  />Price</label>
			</div><!-- /.checkbox -->

			<div class="checkbox-inline">
				<label><input type="checkbox" name="publish" value="publish" <?php if($this->input->get('publish')=='publish'){?>checked="checked"<?php }?>  />Published</label>
			</div><!-- /.checkbox -->					
		</div><!-- /.filter-sort -->
	</div><!-- /.row -->

	<div class="col-sm-6">
		<div class="filter-order">
			<strong>Order By</strong>

			<div class="checkbox-inline">
				<label><input type="radio" name="order" <?php if($this->input->get('order')=='asc'){?>checked="checked"<?php }?> value="asc" > Asc</label>
			</div><!-- /.checkbox -->

			<div class="checkbox-inline">
				<label><input type="radio" name="order" <?php if($this->input->get('order')=='desc'){?>checked="checked"<?php }?>  value="desc"> Desc</label>
			</div><!-- /.checkbox -->
		</div><!-- /.filter-order -->				
	</div><!-- /.col-* -->
</div><!-- /.row --><!-- /.row -->
		</form>
	</div><!-- /.filter -->

	
			<div class="row">
						
                        <?php foreach($properties as $rows){
				
								if($rows['cover_image']){
									$image = base_url()."uploads/".$rows['cover_image'];
								}else{
									$image = base_url()."assets/img/tmp/tmp-5.jpg";
								}
								
								
							$favourit_data = $this->common_model->get_table_data('favourit_property','id',array('property_id'=>$rows['id'],'user_id'=>$this->session->userdata('loginid')),'',$r=1);
						
						if($favourit_data['id']>0){
							$favourit = '1';
							$style = "style='color:red'";
						}else{
							$favourit = '0';
							$style = "style='color:white'";
						}
							?>			
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="listing-box">
                            <div class="listing-box-image listing-box-simple" style="background-image: url('<?php echo $image;?>')">
                                
                                <?php if($rows['featured']=='yes'){?>
                               	 <div class="listing-box-image-label">Featured</div><!-- /.listing-box-image-label -->
                                <?php } ?>
                                
                               <span class="listing-box-image-links" id="favrits_<?php echo $rows['id']?>">
                                     <?php if($this->session->userdata('loginid')){ ?>
            
                            <a id="favrits_a_<?php echo $rows['id']?>" href="javascript:user_favouritss(<?php echo $rows['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
                            <i class="fa fa-heart" <?php echo $style;?> id="hearts_<?php echo $rows['id'];?>" ></i> <span>Add to favorites</span></a>
                            
                            
                            <?php }else{?>
                            
                            <a href="javascript:void(0)"><i class="fa fa-heart" ></i> <span>Add to favorites</span></a>
                            <?php }?>
                            
                            <a target="_blank" href="<?php echo base_url().'property/property_detail/'.$rows['id']?>"><i class="fa fa-search"></i> <span>View detail</span></a>
                                </span>	
                            </div><!-- /.listing-box-image -->
                        
                            <div class="listing-box-title">
                                <h2><a target="_blank" href="<?php echo base_url().'property/property_detail/'.$rows['id']?>"><?php echo $rows['title']; ?></a></h2>
                                <h3>$ <?php echo $rows['price']; ?></h3>
                            </div><!-- /.listing-box-title -->
                        
                            <div class="listing-box-content">
                                <dl>
                                    <dt>Type</dt><dd><?php echo ucfirst($rows['property_type']); ?></dd>
                                    <dt>Sate</dt><dd><?php echo $rows['state_name']; ?></dd>
                                    <dt>City</dt><dd><?php echo $rows['city_name']; ?></dd>
                                    <dt>Area</dt><dd><?php echo $rows['coverd_area']; ?> sqft</dd>
                                    <dt>Published on </dt><dd><?php echo $rows['publish_date']; ?></dd>
                                </dl>
                            </div><!-- /.listing-box-cotntent -->
                        </div><!-- /.listing-box -->			
                        </div><!-- /.col-* -->
						
				<?php } ?>	
				
			</div><!-- /.row -->		

			<?php echo $pagenations;?>
		
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   