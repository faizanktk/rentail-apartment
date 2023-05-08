			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Featured Property</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						
					</div><!-- /.dashboard-header -->

					

	
		<div class="row">
			<div class="col-md-12 col-lg-8 col-lg-offset-2">
				<div class="row">
                	
					<div class="col-sm-6">
                    
						
                        Dear Member ASDF Your payment was successful, thank you for featured property
                        
                        <p style="color: #646464;">Property : 
                        <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">
						<a href="<?php echo base_url().'property/property_detail/'.$property_id; ?>" >View Property </a></strong>
                        </p><br/>
                        <span style="color: #646464;">TXN ID : 
                            <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09"><?php echo $txn_id; ?></strong>
                        </span><br/>
                        <span style="color: #646464;">Amount Paid : 
                            <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">$<?php echo $payment_gross.' '.$currency_code; ?></strong>
                        </span><br/>
                        <span style="color: #646464;">Payment Status : 
                            <strong style="font:15px Arial,Helvetica,sans-serif;color:#f09"><?php echo $payment_status; ?></strong>
                        </span><br/>
                        
                        				
					</div><!-- /.col-* -->
				</div><!-- /.row -->			

							
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	