			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Account Upgrade</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						
					</div><!-- /.dashboard-header -->

					

	<form method="post" action="<?php echo base_url();?>user/upgrademembership"   >
		<div class="row">
			<div class="col-md-12 col-lg-8 col-lg-offset-2">
				<div class="row">
                 <?php if($this->session->flashdata('message_name')){?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('message_name');?>
                    </div>
                    <?php }?>
                     <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('error');?>
                    </div>
                    <?php }?>
                    	
					<div class="col-sm-6">
                    
						
                        
                        <div class="form-group">
                            <label>Membership</label>
                            
                            <select class="form-control" name="membership" onchange="membershivalue(this.value)" required>
                            	<option value="" >Select Membership</option>
                                
                                <?php foreach($membership as $row){?>
                                	<option value="<?php echo $row['id'];?>"><?php echo $row['name'].' - $'.$row['amount'].' - ('.$row['no_of_days'].' days)'; ?></option>
                                <?php }?>
                               
                            </select>
                        </div><!-- /.form-group -->
                        
                        		
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="item_name" value="membership">
                                <input type="hidden" name="item_number" value="1">
                                <input type="hidden" name="credits" value="510">
                                <input type="hidden" name="user_id" value="<?php echo $users['user_id'];?>">
                                <input type="hidden" name="amount" id="amount" >
                                <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
                                <input type="hidden" name="no_shipping" value="1">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="handling" value="0">
                                <input type="hidden" name="cancel_return" value="<?php echo $cancelURL = base_url().'user/cancel';?>">
                                <input type="hidden" name="return" value="<?php echo $returnURL = base_url().'user/success'; ?>">
                                 <input type="hidden" name="notify" value="<?php echo $notifyURL = base_url().'user/ipn'; ?>">
                                
                                <!--<div class="form-group">
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                </div>--><!-- /.form-group -->
                        
                        				
					</div><!-- /.col-* -->
				</div><!-- /.row -->			

				
					

					<div class="form-group-btn">
                    
                    
						<button type="submit" class="btn btn-primary">Upgrade Account</button>
					</div><!-- /.form-group-btn -->					
				

							
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
    
    
    <script type="text/javascript">
		function membershivalue(amount){
		
			$('#amount').val(amount);
		
		}
	
	</script>