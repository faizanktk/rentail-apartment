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
	<div class="col-md-3">
		<div class="form-group">
			<label>Location</label>
			
			<select class="form-control" name="state">
						<option value="">Location</option>
                        <?php foreach($states as $state){?>
						<option <?php if($this->input->get('state')==$state['id']){ ?> selected="selected" <?php }?> value="<?php echo $state['id'];?>"><?php echo $state['name']?></option>
                        <?php } ?>
			</select>
		</div><!-- /.form-group -->
	</div><!-- /.col-* -->

	<div class="col-md-3">
		<div class="form-group">
			<label>Keyword</label>
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
	<!--<div class="col-sm-6">
		<div class="filter-sort">
			<strong>Sort By</strong>

			<div class="checkbox-inline">
				<label><input type="checkbox" name="filter-form-order" checked="checked"> Price</label>
			</div><!-- /.checkbox -->

			<!--<div class="checkbox-inline">
				<label><input type="checkbox" name="filter-form-order" checked="checked"> Published</label>
			</div><!-- /.checkbox -->					
		<!--</div><!-- /.filter-sort -->
	<!--</div>--><!-- /.row -->

	<div class="col-sm-6">
		<div class="filter-sord">
			<strong>Order By</strong>

			<div class="checkbox-inline">
				<label><input type="radio" name="order" <?php if($this->input->get('order')=='asc'){?>checked="checked"<?php }?> value="asc" > Asc</label>
			</div><!-- /.checkbox -->

			<div class="checkbox-inline">
				<label><input type="radio" name="order" <?php if($this->input->get('order')=='desc'){?>checked="checked"<?php }?>  value="desc"> Desc</label>
			</div><!-- /.checkbox -->
		</div><!-- /.filter-order -->				
	</div><!-- /.col-* -->
</div><!-- /.row -->
		</form>
	</div><!-- /.filter -->

	<div class="row">		
		<div class="col-md-8 col-lg-9">
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
            <div class="listing-row">
            <div class="listing-row-inner">
                <div class="listing-row-image" style="background-image: url('<?php echo $image;?>');">
                    <span class="listing-row-image-links" id="favrits_<?php echo $rows['id']?>">
                    
                     <?php if($this->session->userdata('loginid')){ ?>
            
                            <a href="javascript:user_favouritss(<?php echo $rows['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);">
                            <i class="fa fa-heart" <?php echo $style;?> id="hearts_<?php echo $rows['id'];?>" ></i> <span>Add to favorites</span></a>
                            
                            
                            <?php }else{?>
                            
                            <a href="javascript:void(0)"><i class="fa fa-heart" ></i> <span>Add to favorites</span></a>
                            <?php }?>
                    
                        
                        
                        
                        <a target="_blank" href="<?php echo base_url().'property/property_detail/'.$rows['id']?>"><i class="fa fa-search"></i> <span>View detail</span></a>
                       <!-- <a href="properties-compare.html"><i class="fa fa-balance-scale"></i> <span>Compare property</span></a>--> 
                    </span>				
                </div>
        
                <div class="listing-row-content">
                    <h3><a target="_blank" href="<?php echo base_url().'property/property_detail/'.$rows['id']?>"><?php echo $rows['title']; ?></a></h3>
                    <h4>$ <?php echo $rows['price']; ?></h4>
        
                    <ul class="listing-row-attributes">
                        <li>
                            <strong><i class="fa fa-map-marker"></i> City</strong>
                            <span><?php echo $rows['city_name']; ?></span>
                        </li>
        
                        <li>
                            <strong><i class="fa fa-building"></i> Type</strong>
                            <span><?php echo ucfirst($rows['property_type']); ?></span>
                        </li>
        
                        <li>
                            <strong><i class="fa fa-certificate"></i> Status</strong>
                            <span>Rent</span>
                        </li>
        
                        <li>
                            <strong><i class="fa fa-arrows-alt"></i> Area</strong>
                            <span><?php echo $rows['coverd_area']; ?> sqft</span>
                        </li>		
        
                        <li>
                            <strong><i class="fa fa-umbrella"></i> Baths</strong>
                            <span><?php echo $rows['washrooms']; ?></span>
                        </li>
        
                        <li>
                            <strong><i class="fa fa-bed"></i> Bedrooms</strong>
                            <span><?php echo $rows['bedrooms']; ?></span>
                        </li>																		
                    </ul>			
                </div><!-- /.listing-row-content -->
            </div><!-- /.listing-row-inner -->
        </div><!-- /.listing-row -->			
                                
			<?php } ?>			
						
				<!-- /.listing-row -->			
						
				<!-- /.listing-row -->			
						
				<!-- /.listing-row -->			
						
				<!-- /.listing-row -->			
						
			<?php echo $pagenations;?>
			<!-- /.pagination-wrapper -->		
		</div><!-- /.col-sm-* -->

		<div class="col-md-4 col-lg-3"> 			
			
			<div class="widget">
	<h2 class="widgettitle">Contact Information</h2>

	<table class="contact">
		<tbody>
			<tr>
				<th>Address:</th>
				<td>2300 Main Ave.<br>Lost Angeles, CA 23123<br>United States<br></td>
			</tr>

			<tr>
				<th>Phone:</th>
				<td>+0-123-456-789</td>
			</tr>

			<tr>
				<th>E-mail:</th>
				<td><a href="mailto:info@example.com">info@example.com</a></td>
			</tr>

			<tr>
				<th>Skype:</th>
				<td>your.company</td>
			</tr>
		</tbody>
	</table>	
</div><!-- /.widget -->					
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   