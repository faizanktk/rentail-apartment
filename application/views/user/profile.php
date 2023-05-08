			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Profile</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						
					</div><!-- /.dashboard-header -->

					

	<form method="post" action="<?php echo base_url();?>user/update" id="profile" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-md-12 col-lg-8 col-lg-offset-2">
				<div class="row">
                 <?php if($this->session->flashdata('message_name')){?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('message_name');?>
                    </div>
                    <?php }?>	
					<div class="col-sm-6">
                    
						<div class="form-group">
							<label for="">First Name</label>
							<input type="text" class="form-control" value="<?php echo $users['first_name']?>" name="first_name" tabindex="1" required >
						</div><!-- /.form-group -->

						
                        
                        <div class="form-group">
							<label for="">Cell Phone</label>
							<input type="text" class="form-control" value="<?php echo $users['mobile_no']?>" name="mobile_no" tabindex="3" required onkeypress="return isNumber(event)" >
						</div><!-- /.form-group -->
                        
                        
                      <!-- <div class="form-group">
                       <label for="">Martial Status</label>
                       <div class="checkbox" style="margin-top:7.4%;">
                           <div class="ez-radio"><input type="radio" value="rent"  name="form-property-type" checked="checked"  class="ez-hide"></div> Single  
                           &nbsp;&nbsp;&nbsp;<div class="ez-radio"><input type="radio" value="rent" name="form-property-type"  class="ez-hide"></div> Married  					
                        </div>
                         
                       </div>--> <!-- /.form-group -->
                       
                       <div class="form-group">
							<label for="">Address</label>
							<input type="text" class="form-control" value="<?php echo $users['address']?>" name="address" tabindex="5" required >
						</div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>State</label>
                            
                            <select class="form-control" name="state_id" onchange="getcities(this.value)" tabindex="6"required>
                            	<option value="" >Select State</option>
                                <?php foreach($states as $state){?>
            					<option <?php if($state['id']==$users['state_id']){?> selected="selected"<?php }?> value="<?php echo $state['id']; ?>" ><?php echo $state['name']?></option>
            			<?php }?>
                            </select>
                        </div><!-- /.form-group -->
                        
                        <div class="form-group" id="city_id">
                            <label>City</label>
                            
                            <select class="form-control" name="city_id" tabindex="7"  required>
                                <option value="" >Select City</option>
							<?php foreach($cities as $city){?>
                                <option <?php if($city['id']==$users['city_id']){?> selected="selected"<?php }?> value="<?php echo $city['id']; ?>" ><?php echo $city['name']?></option>
                            <?php }?>
                            </select>
                        </div><!-- /.form-group -->

						
                        
					</div><!-- /.col-* -->

					<div class="col-sm-6">	
						<div class="form-group">
							<label for="">Last Name</label>
							<input type="text" class="form-control" value="<?php echo $users['last_name']?>" name="last_name" tabindex="2" required>
						</div><!-- /.form-group -->

						<!--<div class="form-group">
							<label for="">Number of Family Members</label>
							<input type="text" class="form-control" value="<?php //echo $users['family_member']?>" name="family_member" tabindex="3" required onkeypress="return isNumber(event)" >
						</div>--><!-- /.form-group -->

						
                        
                        <div class="form-group">
							<label for="">Home Phone</label>
							<input type="text" class="form-control" value="<?php echo $users['landline_no']?>" name="landline_no" tabindex="4" onkeypress="return isNumber(event)" >
						</div><!-- /.form-group -->
                        
                        <!--<div class="form-group">
							<label for="">Social Security No</label>
							<input type="text" class="form-control" value="<?php //echo $users['social_security_no']?>" tabindex="9" name="social_security_no">
						</div>--><!-- /.form-group -->
                        
                        <div class="form-group">
							<label for="">E-mail</label>
							<input type="email" class="form-control" value="<?php echo $users['email']?>" name="email" required  readonly="readonly" >
						</div><!-- /.form-group -->
                        
                        <div class="form-group">
							<label for="">Zipcode</label>
							<input type="text" class="form-control" value="<?php echo $users['zipcode']?>" name="zipcode" tabindex="8" required onkeypress="return isNumber(event)" >
						</div><!-- /.form-group -->
                        
                        <div class="form-group">
							<label for="">Profile Picture</label>
							<input type="file" class="form-control"  name="profile_image" tabindex="9"  accept="image/*"  >
						</div><!-- /.form-group -->
                        
                        				
					</div><!-- /.col-* -->
				</div><!-- /.row -->			

				<div class="center">
					

					<div class="form-group-btn">
                    
                    <input type="hidden" class="form-control" value="<?php echo $users['user_id']?>" name="user_id"  >
						<button type="submit" class="btn btn-primary" tabindex="10">Update Profile</button>
					</div><!-- /.form-group-btn -->					
				</div><!-- /.center -->

							
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	