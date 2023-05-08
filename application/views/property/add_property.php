			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Properties</h1>

						<a href="<?php echo base_url();?>property/add_property" class="btn btn-primary">Create New Property</a>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
					</div><!-- /.dashboard-header -->

						

	<form method="post"  id="insertproperty" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-md-8 col-lg-9">
				 <div class="content">	 
                      
              <div class="alert alert-success alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
                      <span id="success">Property added successfuly!</span>
                    </div>
                    
                    <div class="alert alert-danger alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
                      <span id="danger">Error occurr during insertion!</span>
                    </div>   
                  
                          
	
    
    			            	
	<div class="page-header page-header-small">
		<h3>Basic Information</h3>
	</div><!-- /.page-header -->

	<div class="form-group">
		<label>Property Title</label>
		<input type="text" class="form-control" name="title" id="title">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="6" name="description"></textarea>
	</div><!-- /.form-group -->
    
    <div class="form-group">
		<label>Property Type</label>
		<select class="form-control" name="property_type"  required>
              <option value="" >Select Property Type</option>
              <option value="flat" >Flat</option>
              <option value="house" >House</option>
              <option value="apartment" >Apartment</option>
              <option value="villa" >Villa</option>
              <option value="condos" >Condos</option>
              <option value="room" >Room</option>
              
              
        </select>      
	</div><!-- /.form-group -->


	<div class="page-header page-header-small">
		<h3>Flate/House Information</h3>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-sm-4">
		    <div class="form-group">
		        <label>Bedrooms</label>

	           <input type="text" class="form-control" name="bedrooms" id="bedrooms" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->

		<div class="col-sm-4">
		    <div class="form-group">
		        <label>Washrooms</label>

	           <input type="text" class="form-control" name="washrooms" id="washrooms" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->

	    <div class="col-sm-4">
		    <div class="form-group">
		        <label>Kitchen</label>

	           <input type="text" class="form-control" name="kitchen" id="kitchen" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        
        <div class="col-sm-4">
		    <div class="form-group">
		        <label>Garage</label>

	           <input type="text" class="form-control" name="garage" id="garage" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        <div class="col-sm-4">
		    <div class="form-group">
		        <label>Area sqft</label>

	           <input type="text" class="form-control" name="coverd_area" id="coverd_area" onkeypress="return isNumber(event)"s>
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        <div class="col-sm-4">
	        <div class="form-group">
	            <label>Rent per Month</label>
	            <input type="text" class="form-control" name="price" id="price"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||
   event.charCode == 46 || event.charCode == 0 ">
	        </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
	</div><!-- /.row -->

	<div class="page-header page-header-small">
		<h3>Location</h3>
	</div><!-- /.page-header -->

	<div class="row">
    
    <div class="col-sm-4">
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="address" id="address">
			</div><!-- /.form-group -->
		</div><!-- /.col-* -->
    
		<div class="col-sm-4">
			<div class="form-group">
				<label>State</label>
				 <select class="form-control" name="state_id" onchange="getcities(this.value)" required>
                            	<option value="" >Select State</option>
                                <?php foreach($states as $state){?>
            					<option  value="<?php echo $state['id']; ?>" ><?php echo $state['name']?></option>
            			<?php }?>
                            </select>
			</div><!-- /.form-group -->
		</div><!-- /.col-* -->

		<div class="col-sm-4">
			<div class="form-group" id="city_id">
                            <label>City</label>
                            
                            <select class="form-control" name="city_id"  required>
                                <option value="" >Select City</option>
							<?php foreach($cities as $city){?>
                                <option  value="<?php echo $city['id']; ?>" ><?php echo $city['name']?></option>
                            <?php }?>
                            </select>
                        </div><!-- /.form-group -->
		</div><!-- /.col-* -->

		<div class="col-sm-4">
			<div class="form-group">
				<label>Zipcode</label>
				<input type="text" class="form-control" name="zipcode" id="zipcode">
			</div><!-- /.form-group -->
		</div><!-- /.col-* -->		
	</div><!-- /.row -->

	

	<div class="page-header page-header-small">
		<h3>Amenities</h3>
	</div><!-- /.page-header -->
	
    
	<div class="checkbox-list">
    
    <?php foreach($amenities as $row){ ?>
		<div class="checkbox">
			<label><input value="<?php echo $row['id']?>" name="amenities[]" type="checkbox" class="checkboxs"> <?php echo $row['name'];?></label>
		</div><!-- /.checkbox-->
	<?php }?>
		
	</div><!-- /.checkbox-list -->

	<div class="page-header page-header-small">
		<h3>Images</h3>
	</div><!-- /.page-header -->
    
    	<div class="row" id="images_show_id">
       
        </div>
         <div id='status_image_Loading' style='display:none'><img src="<?php echo base_url();?>assets/loader.gif" alt="Uploading...."/></div>
	
    <div class="row">
	    <div class="col-sm-6">
	        <div class="form-group">
	            <label>Images</label>
	            <input type="file" class="form-control" name="photos[]" id="photos" onchange="image_upload()" multiple>
	        </div><!-- /.form-group -->
	    </div><!-- /.col-* -->

	</div>				
	

	<div class="center">
    <input type="hidden"  name="user_id" id="user_id"  value="<?php echo $users['user_id']?>">
    <button type="submit" class="btn btn-primary"  >Submit Property</button>
		<!--<a href="#" class="btn btn-primary">Submit Property</a>-->
	</div><!-- /.center -->

				            </div><!-- /.content -->
			            </div><!-- /.col-* --><!-- /.col-* -->
		</div><!-- /.row -->
	</form>
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
    <script type="text/javascript">
	//-------------------------------
		function image_upload(){
			
			var user_id = $('#user_id').val();
			//alert(user_id);
			var files = $('#photos').prop('files');	
			//console.log(files);
			
			if(files){
				
			var formData = new FormData();
			
			for(var i=0; i<files.length; i++){
				formData.append('photos'+i,files[i]);
			}
			
			formData.append('user_id',user_id);
			
			
			console.log(formData);
			
				$.ajax({
					type:"POST",
					url: baseurl+"property/ajaxImageUploads",
					beforeSend: function() { $('#status_image_Loading').css('display','block'); },
					complete: function() { $('#status_image_Loading').css('display','none');  },
					contentType: false,
					processData: false,
					data: formData,
					success: function(output){
						
						if(output){
							$('#images_show_id').append(output);
						}
						
					}
				   
				});
		}
		
	}
	
	//--------------------------------------
	function delete_upload_image(image_id){
		if (confirm("Are you sure to delete this image ?") == false){
                return;
  		}
		var image_name = $('#image_name_'+image_id).val();
		
			$.ajax({
			   type: "POST",
			   url:  baseurl+"property/delete_upload_image",
			   async: false ,
			   data: {image_id:image_id,image_name:image_name},
			   success: function(output)
			   {  
			   
			   if (output==1)
			   
			   {
			$('#row_'+image_id).remove();
			   }
			   else
			   {
			   
			   alert ("Deletion Failed")
			   }
			   
			   }  
		   });
		
		
	}
	//----------------------------------
  function hide(classname){
	$('.'+classname).css('display','none')
  }
  </script>  