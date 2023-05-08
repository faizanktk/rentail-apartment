<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Property</title>
</head>

<body>
<?php if($this->session->flashdata('message_name')){
	
		echo $this->session->flashdata('message_name').'<br />';
	}?>
	<form method="post" action="<?php echo base_url();?>property/add_property" >
    	
        Bedrooms : <input type="text"  name="bedrooms" required  /><br /><br />
        
         bathrooms : <input type="text"  name="bathrooms" required  /><br /><br />
         
          kitchen : <input type="text"  name="kitchen" required  /><br /><br />
          
          garage : <input type="text"  name="garage" required  /><br /><br />
          
           area : <input type="text"  name="coverd_area" required  />Sqfts<br /><br />
           
           Price : <input type="text"  name="price" required  /><br /><br />
       
        Address : <input type="text"  name="address" required  /><br /><br />
       
       State :  <select name="state_id" onchange="getcities(this.value)" required>
        	<option value="" >Select City</option>
            <?php foreach($states as $state){?>
            	<option value="<?php echo $state['id']; ?>" ><?php echo $state['name']?></option>
            <?php }?>
        </select><br /><br />
       
        City : <div id="city_id">
        	<select name="city_id" required>
        	<option value="" >Select City</option>
            <?php foreach($cities as $city){?>
            	<option  value="<?php echo $city['id']; ?>" ><?php echo $city['name']?></option>
            <?php }?>
        </select>
        
        </div>
        		
        <br /><br />
        
        zipcode : <input type="text"  name="zipcode" required  /><br /><br />
        
        Description: <textarea name="description"></textarea>
        user_id : <input type="text" value="<?php echo $user_id?>" name="user_id" required  /><br /><br />
        

        
        <input type="submit" value="Submit"  />
         
    </form>
    
    
    <form id="form_Images" method="post" enctype="multipart/form-data" action='<?php echo base_url();?>property/ajaxImageUpload' style="clear:both">
<h1>Upload Multiple images</h1> 
<div id='status_image_Loading' style='display:none'><img src="<?php echo base_url()?>assets/loader.gif" alt="Uploading...."/></div>
<div id='button_Image_loading'>
<input type="file" name="photos[]" class="file_image" id="image_Photo" multiple="true" />
</div>
</form>

<div id='preview_Upload_images'>
</div>
 </body>
 
 <style>
 .file_image {
	border:2px solid red;
	font-size:18px;
	font-family:lobaster;
	padding:8px;
}
 </style>
 
 <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.wallform.js"></script>
<script type="text/javascript">
 $(document).ready(function() { 
		//var url      = window.location.href;  // retrn full url
		
            $('#image_Photo').die('click').live('change', function()			{ 
			           //$("#preview_Upload_images").html('');
			    
				$("#form_Images").ajaxForm({target: '#preview_Upload_images', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#status_image_Loading").show();
					 $("#button_Image_loading").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#status_image_Loading").hide();
					 $("#button_Image_loading").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#status_image_Loading").hide();
					$("#button_Image_loading").show();
					} }).submit();
			});
        }); 
		
		
	function deleteimage(id){
	
		if (confirm("Are you sure to delete this Image ?") == false){
						return;
		  }
		
		 $.ajax({
		   type: "POST",
		   url: "<?php echo base_url()?>property/delete_image",
		   async: false ,
		   data: {id:id},
		   success: function(output)
		   {  
		   
		   if (output==1){
			$('#row_'+id).remove();
			
		   }
		   else
		   {
		   
		   alert ("Deletion Failed")
		   }
		   
		   }  
		   }); 
		
			}	
</script>
 
  <script type="text/javascript">
 
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
           
	function getcities(state_id){
		
		$.ajax({
			type: "POST",
			   url: "<?php echo base_url();?>user/get_cities",
			   data: {state_id:state_id}, 
			   success: function(data)
			   {
				   $('#city_id').html(data);//alert(data); // show response from the php script.
			   }
		});
		}
			
			
        </script>
 
</html>
