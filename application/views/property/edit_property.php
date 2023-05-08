			<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Properties</h1>

						<a href="<?php echo base_url();?>property/add_property" class="btn btn-primary">Create New Property</a>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
					</div><!-- /.dashboard-header -->

						

	
		<div class="row">
			<div class="col-md-8 col-lg-9">
				 <div class="content">	      
                 
                  <div class="alert alert-success alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
                      <span id="success">Property Update successfuly!</span>
                    </div>
                    
                    <div class="alert alert-danger alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
                      <span id="danger">Error occurr during insertion!</span>
                    </div>
                          
	<form method="post"  id="editproperty"   >	
    
    
   
             	
	<div class="page-header page-header-small">
		<h3>Basic Information</h3>
	</div><!-- /.page-header -->

	<div class="form-group">
		<label>Property Title</label>
		<input type="text" class="form-control" name="title" id="title" value="<?php echo $property['title'];?>">
	</div><!-- /.form-group -->

	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="6" name="description"><?php echo $property['description'];?></textarea>
	</div><!-- /.form-group -->
    
    <div class="form-group">
		<label>Property Type</label>
		<select class="form-control" name="property_type"  required>
              <option value="" >Select Property Type</option>
              <option <?php if($property['property_type']=='flat'){?> selected="selected" <?php }?> value="flat" >Flat</option>
              <option <?php if($property['property_type']=='house'){?> selected="selected" <?php }?> value="house" >House</option>
              <option <?php if($property['property_type']=='apartment'){?> selected="selected" <?php }?> value="apartment" >Apartment</option>
              <option <?php if($property['property_type']=='villa'){?> selected="selected" <?php }?> value="villa" >Villa</option>
              <option <?php if($property['property_type']=='room'){?> selected="selected" <?php }?> value="room" >Room</option>
              <option <?php if($property['property_type']=='condos'){?> selected="selected" <?php }?> value="condos" >Condos</option>
              
        </select>      
	</div><!-- /.form-group -->
    
     <div class="form-group">
		<label>Status</label>
		<select class="form-control" name="available_status" >
              
              <option <?php if($property['available_status']=='available'){?> selected="selected" <?php }?> value="available" >Available</option>
              <option <?php if($property['available_status']=='rent'){?> selected="selected" <?php }?> value="rent" >Rent</option>
              
              
        </select>      
	</div><!-- /.form-group -->


	<div class="page-header page-header-small">
		<h3>Flate/House Information</h3>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-sm-4">
		    <div class="form-group">
		        <label>Bedrooms</label>

	           <input type="text" class="form-control" name="bedrooms" id="bedrooms" value="<?php echo $property['bedrooms'];?>" onkeypress="return isNumber(event)" >
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->

		<div class="col-sm-4">
		    <div class="form-group">
		        <label>Washrooms</label>

	           <input type="text" class="form-control" name="washrooms" id="washrooms" value="<?php echo $property['washrooms'];?>" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->

	    <div class="col-sm-4">
		    <div class="form-group">
		        <label>Kitchen</label>

	           <input type="text" class="form-control" name="kitchen" id="kitchen" value="<?php echo $property['kitchen'];?>" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        
        <div class="col-sm-4">
		    <div class="form-group">
		        <label>Garage</label>

	           <input type="text" class="form-control" name="garage" id="garage" value="<?php echo $property['garage'];?>" onkeypress="return isNumber(event)">
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        <div class="col-sm-4">
		    <div class="form-group">
		        <label>Area sqft</label>

	           <input type="text" class="form-control" name="coverd_area" id="coverd_area" value="<?php echo $property['coverd_area'];?>" onkeypress="return isNumber(event)"s>
		    </div><!-- /.form-group -->
	    </div><!-- /.col-* -->
        
        <div class="col-sm-4">
	        <div class="form-group">
	            <label>Rent per Month</label>
	            <input type="text" class="form-control" name="price" id="price" value="<?php echo $property['price'];?>"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57) ||
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
				<input type="text" class="form-control" name="address" id="address" value="<?php echo $property['address'];?>">
			</div><!-- /.form-group -->
		</div><!-- /.col-* -->
    
		<div class="col-sm-4">
			<div class="form-group">
				<label>State</label>
				 <select class="form-control" name="state_id" onchange="getcities(this.value)" required>
                            	<option value="" >Select State</option>
                                <?php foreach($states as $state){?>
            					<option <?php if($property['state_id']==$state['id']){?> selected="selected" <?php }?> value="<?php echo $state['id']; ?>" ><?php echo $state['name']?></option>
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
                                <option <?php if($property['city_id']==$city['id']){?> selected="selected" <?php }?> value="<?php echo $city['id']; ?>" ><?php echo $city['name']?></option>
                            <?php }?>
                            </select>
                        </div><!-- /.form-group -->
		</div><!-- /.col-* -->

		<div class="col-sm-4">
			<div class="form-group">
				<label>Zipcode</label>
				<input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $property['zipcode'];?>" />
			</div><!-- /.form-group -->
		</div><!-- /.col-* -->		
	</div><!-- /.row -->

	

	<div class="page-header page-header-small">
		<h3>Amenities</h3>
	</div><!-- /.page-header -->
	
    
	<div class="checkbox-list">
    
    <?php foreach($amenities as $row){ ?>
		<div class="checkbox">
			<label>
            <input value="<?php echo $row['id'];?>" name="amenities[]" <?php if(in_array($row['id'],$property_amenities)){?> checked <?php }?> type="checkbox" class="checkboxs">
             <?php echo $row['name'];?>
             </label>
		</div><!-- /.checkbox-->
	<?php }?>
		
	</div><!-- /.checkbox-list -->

	 <div class="page-header page-header-small">
		<h3>Images</h3>
	</div><!-- /.page-header -->
    
                       
    
    				
                    <div class="row" id="images_show_id">
                    <?php foreach($property_images as $images){?>
                    <div class="col-sm-3" id="row_<?php echo $images['id'];?>">
                        <div class="">
                            <img width="116" height="100" src="<?php echo base_url().'uploads/'.$images['image'];?>" />
                            <a href="javascript:delete_image(<?php echo $images['id'] ?>,<?php echo $property['id']?>)"> Delete</a>
                            
                            <input type="hidden"  name="image_name" id="image_name_<?php echo $images['id'];?>"  value="<?php echo $images['image'];?>">
                        </div>
                    </div>
            	<?php }?>
                   
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
    <input type="hidden"  name="cover_image" id="cover_image"  value="<?php echo $property['cover_image']?>">
    <input type="hidden"  name="property_id" id="property_id"  value="<?php echo $property['id']?>">
    <button type="submit" class="btn btn-primary"  >Update Property</button>
		<!--<a href="#" class="btn btn-primary">Submit Property</a>-->
	</div><!-- /.center -->
	
    </form>
				            </div><!-- /.content -->
			            </div><!-- /.col-* --><!-- /.col-* -->
		</div><!-- /.row -->
	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
    <script type="text/javascript">
  function hide(classname){
	$('.'+classname).css('display','none')
  }
  
  function delete_image(image_id,property_id){
  	if (confirm("Are you sure to delete this Image ?") == false){
                return;
  	}
	
	var image_name = $('#image_name_'+image_id).val();
	var cover_image = $('#cover_image').val();
	
	 $.ajax({
	   type: "POST",
	   url:  "<?php echo base_url();?>property/delete_image",
	   async: false ,
	   data: {image_id:image_id,image_name:image_name,property_id:property_id,cover_image:cover_image},
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
  //-------------------------------
		function image_upload(){
			
			var property_id = $('#property_id').val();
			//alert(user_id);
			var files = $('#photos').prop('files');	
			//console.log(files);
			
			if(files){
				
			var formData = new FormData();
			
			for(var i=0; i<files.length; i++){
				formData.append('photos'+i,files[i]);
			}
			
			formData.append('property_id',property_id);
			
			
			console.log(formData);
			
				$.ajax({
					type:"POST",
					url: baseurl+"property/ajaxImageUploadEdit",
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
  </script>  
  
  