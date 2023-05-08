<?php //$this->load->view('common/admin_header');?>
<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Properties</h1>

						<a href="<?php echo base_url();?>property/add_property" class="btn btn-primary">Create New Property</a>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
					</div><!-- /.dashboard-header -->
                    
                    
                    <div class="filter filter-gray push-bottom">
                <form method="get" action="<?php echo base_url();?>admin/view_properties">
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
                            </div><!-- /.row -->
           </form>             
	</div><!-- /.filter -->


                    

					<!--<div class="dashboard-subheader">
						<h2>123 Users Matching Your Criteria</h2>		

						<div class="dashboard-subheader-actions">
							<a href="#" class="btn btn-secondary"><i class="fa fa-filter"></i> Redefine Search Criteria</a><a href="#" class="btn btn-secondary"><i class="fa fa-times"></i> Remove All</a>
						</div><!-- /.dashboard-subheader-actions -->
					<!--</div>--><!-- /.dashboard-header -->

					<div class="row">
						<table class="table table-users">
                        <thead>
                            <tr>
                                <th class="min-width"></th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Featured</th>
                                <th>Rent</th>
                                <th>Status</th>
                                
                                <th colspan="2" align="center" style="text-align:center" class="min-width ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
		
								<?php 
                                    $i=$page+1;;
                                    //print_r($all_users);exit;
                                    
                                foreach($all_properties as $row){
                                    $address = $row['address'].', '.$row['city_name'].', '.$row['state_name'].', '.$row['zipcode'];
                                   
                                    
                                ?>
                                    <tr id="row_<?php echo $row['id']; ?>">
                                        <td class="min-width"><?php echo $i; ?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td>
                                       <a href="<?php echo base_url().'property/property_detail/'.$row['id']?>" target="_blank"><?php  echo rtrim($address , ', '); ?></a>
                                        </td>
                                        <td><?php echo ucfirst($row['property_type']);?></td>
                                        
                                        
                                         <td>
                        <a  href="javascript:featured_status(<?php echo $row['id']; ?>);">
                            <?php 
                                
                                if($row['featured']=='no'){ ?>
                                    <span id='featured_id_<?php echo $row['id']; ?>' data-id="no" ><i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i></span>
        
                                <?php }elseif($row['featured']=='yes'){?>
                                    <span id='featured_id_<?php echo $row['id']; ?>' data-id="yes" ><i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i></span>
                                <?php }
                        
                        ?></a></td>
                                        
                                        
                                        
                                        
                                        <td><?php echo '$ '.$row['price'];?></td>
                                        
                                        
                                        <!--------------------------------------->
                                        <td>
				<a  href="javascript:property_status(<?php echo $row['id']; ?>);">
					<?php 
						
						if($row['status']==0){ ?>
							<span id='status_id_<?php echo $row['id']; ?>' data-id="0" ><i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i></span>

						<?php }elseif($row['status']==1){?>
							<span id='status_id_<?php echo $row['id']; ?>' data-id="1" ><i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i></span>
						<?php }
				
				?></a></td>
                                        
                                        <!------->
                                        
                                        
                                        
                                        
                                        <td>
                                       
                                        <td class="min-width">
                                            <a target="_blank" href="<?php echo base_url().'property/property_detail/'.$row['id']?>" class="btn btn-primary"><i class="fa fa-location-arrow"></i> View</a>
                                            <a href="javascript:delete_myproperty(<?php echo $row['id']; ?>);" class="btn btn-danger"><i class="fa fa-times"></i> Remove</a>
                                        </td>
                                    </tr>
                                <?php $i++; }?>
                                    
                                
                            </tbody>
                        </table>

	<?php echo $pagenations;?>

<!-- /.pagination-wrapper -->
					</div><!-- /.row -->	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
<script type="text/javascript" >
	function property_status(property_id){
	
	status = $('#status_id_'+property_id).data("id");
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"admin/property_status",
			   data: {property_id:property_id,status:status}, 
			   success: function(data){
			   	if(data==1){
					if(status == 1) {
				   		$('#status_id_'+property_id).data("id", 0);
				  		 $('#status_id_'+property_id).html('<i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i>');
				   }else{
				  	 $('#status_id_'+property_id).data("id", 1);
					 $('#status_id_'+property_id).html('<i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i>');
				  }
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	}
	
	//-------------------------------------------------------//
	
	
	function featured_status(property_id){
	
	var featured = $('#featured_id_'+property_id).data("id");
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"admin/featured_status",
			   data: {property_id:property_id,featured:featured}, 
			   success: function(data){
			   	if(data==1){
					if(featured == 'yes') {
				   		$('#featured_id_'+property_id).data("id", 'no');
				  		 $('#featured_id_'+property_id).html('<i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i>');
				   }else{
				  	 $('#featured_id_'+property_id).data("id", 'yes');
					 $('#featured_id_'+property_id).html('<i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i>');
				  }
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	}

</script>