			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Properties</h1>

						<a href="<?php echo base_url();?>property/add_property" class="btn btn-primary">Create New Property</a>
                        
                        <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
                        
                        
                        <?php
						$remaining_property = $this->common_model->get_table_data('membership','remaining_property,expiray_date',array('user_id'=>$this->session->userdata('loginid')),'id desc',$m=1);
			$cur_date = date('Y-m-d');
						?>
                        
                        <?php if($remaining_property['remaining_property']<6){?>
                        <div class="alert alert-danger alert-dismissible" style="margin-top: 15px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Your have only "<?php echo $remaining_property['remaining_property']; ?>" properties remaining. Upgrade your account 
                          <a href="<?php echo base_url();?>user/upgrade" class="btn btn-primary" style="margin-top:0px;">Upgrade Account</a>
                        </div>
                        <?php }?>
                        
                        <?php if($remaining_property['expiray_date']<$cur_date){?>
                        <div class="alert alert-danger alert-dismissible" style="margin-top: 15px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Your account has been expire on "<?php echo $remaining_property['expiray_date']; ?>".  Upgrade your account 
                          <a href="<?php echo base_url();?>user/upgrade" class="btn btn-primary" style="margin-top:0px;">Upgrade Account</a>
                        </div>
                        <?php }?>
                        
					</div><!-- /.dashboard-header -->
                    
                    
                    <div class="filter filter-gray push-bottom">
                        <form method="get" action="<?php echo base_url();?>property/myproperties">
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
                            </div>
                        </form>
	</div>
                    

	<div class="row">		
		<div class="col-md-12 col-lg-12">
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
                        
                        <div class="col-md-6 col-lg-4" id="row_<?php echo $rows['id']?>">
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
                                   
                                    
                                    <dt>Edit</dt><dd><a style="padding: 0px;width: 51px;font-size: 12px;" class="btn btn-primary" href="<?php echo base_url().'property/edit_property/'.$rows['id'];?>">Edit</a> </dd>
                                    
                                    <dt>Delete</dt><dd><a style="padding: 0px;width: 51px;font-size: 12px;" class="btn btn-danger" href="javascript:delete_myproperty(<?php echo $rows['id']; ?>);">Delete</a></dd>
                              <!---- Publish -----> 
                              <?php if($pub_status==1){?>
                                   <span id="change_publish_<?php echo $rows['id']?>">
                                   
                                    <dt>Published</dt>
                                    <dd><a style="padding: 0px;width: 51px;font-size: 12px;"  href="javascript:publish_myproperty(<?php echo $rows['id']; ?>);">
                                    
                                    <?php if($rows['published']=='1'){?>
                                    <span id='publish_id_<?php echo $rows['id']; ?>' data-id="1" ><i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i></span>
                                   
                                    <?php }else{?>
                                    
                                    <span id='publish_id_<?php echo $rows['id']; ?>' data-id="0" ><i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i></span>
                                    
                                   
                                    
                                    <?php }?>
                                    </a></dd>
                                    
                                     
                                          
                                   
                                     <dt>Published on </dt><dd> <?php if($rows['publish_date']){  echo $rows['publish_date']; }else{ echo 'Not Yet'; } ?></dd>
                                    
                                    
                                    
                                     
                                     </span>
                                      	
                                        <?php if($rows['featured']=='yes'){?>
                                         <dt>Status Type </dt><dd> Featured </dd>
                                         <?php }else{?>
                                         <dt>Make Featured</dt><dd><a style="padding: 0px;width: 51px;font-size: 12px;" class="btn btn-success" href="<?php echo base_url().'property/featured/'.$rows['id']?>">Featured</a> </dd>
                                         <?php }?>
                                      
                                      <?php }else{ ?>
                                     <dt>Upgrade your account</dt><dd><a style="padding: 0px;width: 51px;font-size: 12px;" class="btn btn-success" href="<?php echo base_url();?>user/upgrade">Upgrade</a> </dd>
                                     <?php } ?>
                                      <!---- end Publish -----> 
                                    
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
    
    <script type="text/javascript">
	
	
	function user_favouritss(id,user_id,favourit){
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"property/user_favourit",
			   data: {id:id,user_id:user_id,favourit:favourit}, 
			   success: function(output){
			   	if(output==1){
					$('#hearts_'+id).css('color','red');
					$("#favrits_a_"+id).attr("href", 'javascript:user_favouritss('+id+','+user_id+',1)');
					
				}else if(output==0){
			   		$('#hearts_'+id).css('color','white');
					$("#favrits_a_"+id).attr("href", 'javascript:user_favouritss('+id+','+user_id+',0)');
					
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	} 
	//--------- Publish -----------------------------------

	
	function publish_myproperty(property_id){
	
	publish = $('#publish_id_'+property_id).data("id");
	
	//alert(publish);exit;
	$.ajax({
			type: "POST",
			   url: baseurl+"property/publish_myproperty",
			   data: {property_id:property_id,publish:publish}, 
			   success: function(data){
			   	if(data==0){
					alert('Error');
			   }else{
			   		$('#change_publish_'+property_id).html(data);
			   }
			}   
		});
	
	}
	
	
</script>	   