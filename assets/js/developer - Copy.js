var form3 = $('#register');
var error3 = $('.alert-danger', form3);
var success3 = $('.alert-success', form3);

    form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    username: {                        
                        required: true,
						remote:baseurl+ "login/user_name_checks"
                    },
                    
                    email: {
                        required: true,
                        email: true,
                       remote:baseurl+ "login/user_email_checks"
                           },
                    password:{                       
                        required: true,                        
                                     
                    },
                     confirmpassword: {
                      required: true,
                      equalTo: "#password"
                                }        
                },

                messages: { 
				username: "This username already taken",
				email : "This e-mail already taken"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });
	//---------------- Change Password ----------------------------------//
	var change_password = $('#change_password');
	var errorchange_password = $('.alert-danger', change_password);
	var successchange_password = $('.alert-success', change_password);

    change_password.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    old_password: {                        
                        required: true,
						remote:baseurl+ "user/user_password_checks"
                    },
                    
                    
                    new_password:{                       
                        required: true,                        
                                     
                    },
                     confirm_password: {
                      required: true,
                      equalTo: "#new_password"
                                }        
                },

                messages: { 
				old_password: "Old Password does'nt match",
				//new_password: "New Password is required",
				//confirm_password: "Confirm Password is required",
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });
	
	//----------------- End change Password ----------------------------/
	//------------ Only numeric value in text field ---------------------------//
	
	 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
   
   //--------- Get cities by ajax -----------------//
	function getcities(state_id){
		
		$.ajax({
			type: "POST",
			   url: baseurl+"user/get_cities",
			   data: {state_id:state_id}, 
			   success: function(data)
			   {
				   $('#city_id').html(data);//alert(data); // show response from the php script.
			   }
		});
		}
	
	//-------- Profile validation ------------------
	
	var profile = $('#profile1');
	var errorprofile = $('.alert-danger', profile);
	var successprofile = $('.alert-success', profile);

    profile.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    first_name: {                        
                        required: true,
                    },
					
					last_name: {                        
                        required: true,
                    },
					
					address: {                        
                        required: true,
                    },
					
					state_id: {                        
                        required: true,
                    },
					
					city_id: {                        
                        required: true,
                    },
					
					family_member: {                        
                        required: true,
                    },
					
					mobile_no: {                        
                        required: true,
                    },
					
					zipcode: {                        
                        required: true,
                    }
                    
                           
                },

                messages: { 
				first_name: "First name is required",
				last_name: "Last name is required",
				address: "Address is required",
				state_id: "State name is required",
				city_id: "City name is required",
				family_member: "Number of Family member is required",
				mobile_no: "Mobile No is required",
				zipcode: "Zipcode is required"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    successprofile.hide();
                    errorprofile.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    successprofile.show();
                    errorprofile.hide();
                    form[0].submit(); // submit the form
                }

            });
	
	//-------- Property Multiple images Upload ------------------//
	
	
	
	function uploadimages(){
		var files = $('#photos').prop('files');	
		console.log(files);
		
		var formData = new FormData();
		
		for(var i=0; i<files.length; i++){
			formData.append('photos'+i,files[i]);
		}
		
		console.log(formData);
		
		$.ajax({
			
			type:"POST",
			url: baseurl+"property/ajaxImageUpload",
			contentType: false,
			processData: false,
			data: formData,
			success: function(output){
				
				if(output==0){
					alert('error');
				}else{
					
					$('#photosvalue').val($('#photosvalue').val()+output);
					console.log(output);
				}
				
			}
			   
		});
	}
	
	///-------------------------------------------------------///
		//-------- Property validation ------------------
	
	var property = $('#insertproperty');
	var errorproperty = $('.alert-danger', property);
	var successproperty = $('.alert-success', property);

    property.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    title: {                        
                        required: true,
                    },
					
					description: {                        
                        required: true,
                    },
					property_type: {                        
                        required: true,
                    },
					
					address: {                        
                        required: true,
                    },
					
					state_id: {                        
                        required: true,
                    },
					
					city_id: {                        
                        required: true,
                    },
					
					bedrooms: {                        
                        required: true,
                    },
					
					kitchen: {                        
                        required: true,
                    },
					washrooms: {                        
                        required: true,
                    },
					price: {                        
                        required: true,
                    },
					
					zipcode: {                        
                        required: true,
                    }
                    
                           
                },

                messages: { 
				title: "Title is required",
				description: "Description is required",
				address: "Address is required",
				state_id: "State name is required",
				city_id: "City name is required",
				zipcode: "Zipcode is required",
				kitchen: "Kitchen is required",
				price:   "Rent is required",
				property_type: "Property Type is required"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    successprofile.hide();
                    errorprofile.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                    $.ajax({
							url:baseurl+"property/insert_property",
							type:"POST",
						   data:$("#insertproperty").serializeArray(),							
							success:function( res ) {
								console.log(res);
								
								if(res>0){
									$('.alert-success').css('display','block');
									
									$('#images_show_id').html('');
									$(':input','#insertproperty')
									 .not(':button, :submit, :reset, :hidden')
									 .val('')
									 .removeAttr('checked')
									 .removeAttr('selected');
									 
									// $('html, body').animate({ scrollTop: 0 }, 0);
									//$(window).scrollTop(0);
									 
									 /*$('html, body').animate({
        								 scrollTop: $("#insertproperty").offset().top
   										 }, 2000);*/

									}else{
									$('.alert-danger').css('display','block');
									 /*$('html, body').animate({
        								 scrollTop: $("#insertproperty").offset().top
   										 }, 2000);*/
								}// end check id
								
								//--------------------------------
							}
                          });
                    //form[0].submit(); // submit the form
                }

            });
			//-------- end property ---------
	//-------- Amenities validation ------------------
	
	var amenities = $('#amenities');
	var erroramenities = $('.alert-danger', amenities);
	var successamenities = $('.alert-success', amenities);

    amenities.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    name: {                        
                        required: true,
                    }
					     
                },

                messages: { 
				name: "Amenity name is required"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    successprofile.hide();
                    errorprofile.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					var name = $('#name').val();
					
                    $.ajax({
							url:baseurl+"admin/insert_amenities",
							type:"POST",
						   data:{name:name},							
							success:function( res ) {
								if(res==1){
									$('.alert-success').css('display','block');
									amenities.each(function(){
										this.reset();
									});
								}else{
									$('.alert-danger').css('display','block');
								}
							}
                          });
                    
                }

            });
	///--------------------//
	//--------- Get cities by ajax -----------------//
	function delete_amenity(id){
 	 if (confirm("Are you sure to delete this Amenity ?") == false){
                return;
  	}

	 $.ajax({
	   type: "POST",
	   url: baseurl+"admin/delete_amenity",
	   async: false ,
	   data: {id:id},
	   success: function(output)
	   {  
	   
	   if (output==1)
	   
	   {
	$('#row_'+id).remove();
	   }
	   else
	   {
	   
	   alert ("Deletion Failed")
	   }
	   
	   }  
	   }); 

}
//------------- Delete Property --------------------------//

	function delete_property(id){
 	 if (confirm("Are you sure to delete this Property ?") == false){
                return;
  	}

	 $.ajax({
	   type: "POST",
	   url:  baseurl+"admin/delete_property",
	   async: false ,
	   data: {id:id},
	   success: function(output)
	   {  
	   
	   if (output==1)
	   
	   {
	$('#row_'+id).remove();
	   }
	   else
	   {
	   
	   alert ("Deletion Failed")
	   }
	   
	   }  
	   }); 

}


function delete_myproperty(id){
 	 if (confirm("Are you sure to delete this Property ?") == false){
                return;
  	}

	 $.ajax({
	   type: "POST",
	   url:  baseurl+"property/delete_myproperty",
	   async: false ,
	   data: {id:id},
	   success: function(output)
	   {  
	   
	   if (output==1)
	   
	   {
	$('#row_'+id).remove();
	   }
	   else
	   {
	   
	   alert ("Deletion Failed")
	   }
	   
	   }  
	   }); 

}
//------- End delete property ---------------------------//

//-------- Property validation ------------------
	
	var editproperty = $('#editproperty');
	var erroreditproperty = $('.alert-danger', editproperty);
	var successeditproperty = $('.alert-success', editproperty);

    editproperty.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    title: {                        
                        required: true,
                    },
					
					description: {                        
                        required: true,
                    },
					property_type: {                        
                        required: true,
                    },
					
					address: {                        
                        required: true,
                    },
					
					state_id: {                        
                        required: true,
                    },
					
					city_id: {                        
                        required: true,
                    },
					
					bedrooms: {                        
                        required: true,
                    },
					
					kitchen: {                        
                        required: true,
                    },
					washrooms: {                        
                        required: true,
                    },
					price: {                        
                        required: true,
                    },
					
					zipcode: {                        
                        required: true,
                    }
                    
                           
                },

                messages: { 
				title: "Title is required",
				description: "Description is required",
				address: "Address is required",
				state_id: "State name is required",
				city_id: "City name is required",
				zipcode: "Zipcode is required",
				kitchen: "Kitchen is required",
				price:   "Rent is required",
				property_type: "Property Type is required"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    successprofile.hide();
                    errorprofile.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                    $.ajax({
							url:baseurl+"property/update_property",
							type:"POST",
						   data:$("#editproperty").serializeArray(),							
							success:function( res ) {
								console.log(res);
								$("#editproperty").css("display","none");
								
								if(res>0){ // check id
								//------------ Image Upload ------------------
								var files = $('#photos').prop('files');	
									console.log(files);
									
									if(files){
										
									var formData = new FormData();
									
									for(var i=0; i<files.length; i++){
										formData.append('photos'+i,files[i]);
									}
									
									formData.append('property_id',res);
									
									
									console.log(formData);
									
									$.ajax({
										
										type:"POST",
										url: baseurl+"property/ajaxImageUploadEdit",
										contentType: false,
										processData: false,
										data: formData,
										success: function(output){
											
											if(output){
												$('#images_show_id').html(output);
											}
											
										}
										   
									});
								}//---if
								
								$('.alert-success').css('display','block');
								 
								}else{
									$('.alert-danger').css('display','block');
								}// end check id
								
								//--------------------------------
							}
                          });
                    //form[0].submit(); // submit the form
                }

            });
	//--------------------- end edit property ---------------------//
	
	//-------------- Comments -------------------------------//
	var comments = $('#comments');
var errorcomments = $('.alert-danger', comments);
var successcomments = $('.alert-success', comments);

    comments.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                    
                    
                    comment:{                       
                        required: true,                        
                                     
                    },
                           
                },

                messages: { 
				
				comment : "Message is required"
                  /* email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }*/
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					var user_id = $('#user_id').val();
					if(user_id==''){
					
						$('.alert-danger').css('display','block');
						$('#danger').html('Must be login to write a review');
						return false;
					}
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"property/comments",
					   data: $("#comments").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output)
					   
					   {
						//$('.alert-success').css('display','block');
						//$('#success').html('Review added successfuly!');
						$(".comments").append(output);
						$('#comment').val('');
					   }
					   else
					   {
						   $('.alert-danger').css('display','block');
							$('#danger').html('Error while adding review!');
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end comments -----------------------------------//
	
	//-------------- Contact form -------------------------------//
	var contactusform = $('#contactusform');
var errorcontactusform = $('.alert-danger', contactusform);
var successcontactusform = $('.alert-success', contactusform);

    contactusform.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                    
                    
                    name:{                       
                        required: true,                        
                                     
                    },
					email:{                       
                        required: true,                        
                                     
                    },
					subject:{                       
                        required: true,                        
                                     
                    },
					emailmessage:{                       
                        required: true,                        
                                     
                    },
                           
                },

                messages: { 
				
				name : "Name is required",
				subject : "Subject is required",
				emailmessage : "Message is required",
                   email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"contactus/send_mail",
					   beforeSend: function() { $('.fa-circle-o-notch').css('display','block'); },
					   complete: function() { $('.fa-circle-o-notch').css('display','none');  },
					   data: $("#contactusform").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output==1)
					   
					   {
						$('#cont-succ').css('display','block');
						$('#success').html('Email sent successfully.');
						
						contactusform.each(function(){
										this.reset();
									});
						
					   }
					   else
					   {
						   $('#cont-dang').css('display','block');
						   $('#danger').html('Email not sent due to error.');
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end contct form  -----------------------------------//
	
	//-------------- subscrib to email form -------------------------------//
	var subscribetoemailid = $('#subscribetoemailid');
var errorsubscribetoemailid = $('.alert-danger', subscribetoemailid);
var successsubscribetoemailid = $('.alert-success', subscribetoemailid);

    subscribetoemailid.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                   
					email:{                       
                        required: true,                        
                    
                           
                },

                messages: { 
				
                   email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }
				  }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"home/subscribe_to_news",
					  
					   data: $("#subscribetoemailid").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output==1)
					   
					   {
						$('#news-succ').css('display','block');
						$('#subscribemail').val('');
					   }
					   else
					   {
						   $('#news-dang').css('display','block');
						   
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end subscrib to email  -----------------------------------//
	
	
	//-------------- Reset Password  -------------------------------//
	var resetpassword = $('#resetpassword');
var errorresetpassword = $('.alert-danger', resetpassword);
var successresetpassword = $('.alert-success', resetpassword);

    resetpassword.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                   
					email:{                       
                        required: true,      
                           
                },

                messages: { 
				
                   email:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }
				  }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"login/reset_password_email",
					  	beforeSend: function() { $('.fa-circle-o-notch').css('display','block'); },
					   complete: function() { $('.fa-circle-o-notch').css('display','none');  },
					   data: $("#resetpassword").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output==1)
					   
					   {
						$('#reset-pass-succ').css('display','block');
						$('#success').html('Password send to your email successfully.');
						resetpassword.each(function(){
							this.reset();
						});
					   }
					   else if(output==2){
						    $('#reset-pass-dang').css('display','block');
							$('#danger').html('Error while sending email');
					   }else
					   {
						   $('#reset-pass-dang').css('display','block');
						   $('#danger').html('Error while changing password.');
						   
					   }
					   
					   }  
					   });  // submit the form
                }


            });
	//------- end subscrib to email  -----------------------------------//
	
	
	//-------------- Contact form -------------------------------//
	var propertyemailcontact = $('#propertyemailcontact');
var errorpropertyemailcontact = $('.alert-danger', propertyemailcontact);
var successpropertyemailcontact = $('.alert-success', propertyemailcontact);

    propertyemailcontact.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                    
                    
                    username:{                       
                        required: true,                        
                                     
                    },
					useremail:{                       
                        required: true,                        
                                     
                    },
					subject:{                       
                        required: true,                        
                                     
                    },
					emailmessage:{                       
                        required: true,                        
                                     
                    },
                           
                },

                messages: { 
				
				username : "Name is required",
				subject : "Subject is required",
				emailmessage : "Message is required",
                   useremail:{
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                   //remote: function() { return jQuery.validator.format("{0} is already taken", $("#email").val()) }  
                    }
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"property/send_mail",
					   beforeSend: function() { $('.fa-circle-o-notch').css('display','block'); },
					   complete: function() { $('.fa-circle-o-notch').css('display','none');  },
					   data: $("#propertyemailcontact").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output==1)
					   
					   {
						$('#adam1').css('display','block');
						$('#success').html('Email sent successfully.');
						
						$('#subject').val('');
						$('#emailmessage').val('');
						
					   }
					   else
					   {
						   $('#adam2').css('display','block');
						   $('#danger').html('Email not sent due to error.');
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end contct form  -----------------------------------//
	
	
	//-------------- Inbox Contact form -------------------------------//
	var propertycontact = $('#propertycontact');
var errorpropertycontact = $('.alert-danger', propertycontact);
var successpropertycontact = $('.alert-success', propertycontact);

    propertycontact.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                    inboxsubject:{                       
                        required: true,                        
                                     
                    },
					inboxmessage:{                       
                        required: true,                        
                                     
                    },
                           
                },

                messages: {
				
				inboxsubject : "Subject is required",
				inboxmessage : "Message is required"
                  
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"property/send_mail_inbox",
					   data: $("#propertycontact").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output==1)
					   
					   {
						$('#prop-cont-succ').css('display','block');
						$('#success').html('Messages sent successfully.');
						
						
						$('#inboxsubject').val('');
						$('#inboxmessage').val('');
						
					   }
					   else
					   {
						   $('#prop-cont-dang').css('display','block');
						   $('#danger').html('Messages not sent due to error.');
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end contct form  -----------------------------------//
	
	//-------------- Inbox Reply Message -------------------------------//
	var replyinboxmessage = $('#replyinboxmessage');
	var errorreplyinboxmessage = $('.alert-danger', replyinboxmessage);
	var successreplyinboxmessage = $('.alert-success', replyinboxmessage);

    replyinboxmessage.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    
                    
					inboxmessage:{                       
                        required: true,                        
                                     
                    },
                           
                },

                messages: {
				
				
				inboxmessage : "Message is required"
                  
                   
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
					
                   $.ajax({
					   type: "POST",
					   url: baseurl+"user/send_mail_inbox",
					   data: $("#replyinboxmessage").serializeArray(),
					   success: function(output)
					   {  
					   
					   if (output){
						
						$(".comments").append(output);
						
						$('#inboxsubject').val('');
						$('#inboxmessage').val('');
						
					   }
					   else
					   {
						   $('.alert-danger').css('display','block');
						   $('#danger').html('Messages not sent due to error.');
					   }
					   
					   }  
					   });  // submit the form
                }

            });
	//------- end contct form  -----------------------------------//



	
	
	//====/------------------------------------------------------/====///