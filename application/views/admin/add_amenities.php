			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Properties</h1>

						<a href="<?php echo base_url()?>admin/add_amenities" class="btn btn-primary">Create New Property</a>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
					</div><!-- /.dashboard-header -->

<style>
.has-error{
	color:#FF0000;
}
</style>					

	<form method="post" action="<?php echo base_url();?>admin/insert_amenities" id="amenities" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-md-8 col-lg-9">
				<div class="row">
                 
                    <div class="alert alert-success alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
                      <span id="success">Amenity name added successfuly!</span>
                    </div>
                    
                    <div class="alert alert-danger alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
                      <span id="danger">Error occurr during insertion!</span>
                    </div>
                   
					<div class="page-header page-header-small">
                        <h3>Basic Information</h3>
                    </div><!-- /.page-header -->
                
                    <div class="form-group">
                        <label>Amenity Name</label>
                        <input type="text" class="form-control" name="name" id="name" required >
                    </div><!-- /.form-group -->

					
				</div><!-- /.row -->			

				<div class="center">
    
    			<button type="submit" class="btn btn-primary"  >Submit Amenity</button>
		
				</div><!-- /.center -->

							
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
    
  <script type="text/javascript">
  function hide(classname){
	$('.'+classname).css('display','none')
  }
  </script>  