			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Change Password</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						
					</div><!-- /.dashboard-header -->

					

	<form method="post" action="<?php echo base_url();?>user/updatepassword" id="change_password"   >
		<div class="row">
			<div class="col-md-12 col-lg-8 col-lg-offset-2">
				<div class="row">
                <!-- Messages --->
                <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php }?>
                    
                    <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('error');?>
                    </div>
                    <?php }?>
                <!-- --->
					<div class="col-sm-6">
                    
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control"  name="old_password" id="ld_password" required>
                        </div><!-- /.form-group -->
                        
                         <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control"  name="new_password" id="new_password" required>
                        </div><!-- /.form-group -->
                        
                         <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control"  name="confirm_password" id="confirm_password" required>
                        </div><!-- /.form-group -->          
                        				
					</div><!-- /.col-* -->
				</div><!-- /.row -->			

					<div class="form-group-btn">
						<button type="submit" class="btn btn-primary">Change Password</button>
					</div><!-- /.form-group-btn -->					
				

							
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	