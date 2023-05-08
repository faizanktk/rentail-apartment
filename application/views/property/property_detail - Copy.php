<style>
.has-error{
	color:#FF0000;
}
       #loc_map {
        height: 400px;
        width: 100%;
       }
</style>
<div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">	
        	<?php
			
				$address = $property_detail['address'].', '.$property_detail['city_name'].', '.$property_detail['state_name'].', '.$property_detail['zipcode'];
			
			?>
        		
			<h1><?php echo rtrim($address , ', ');?></h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url();?>property">Properties</a></li>
				<li class="active">Standard Detail</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

	            <div class="content">
	                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="listing-detail-attributes">
                    
                    <div class="listing-detail-attribute">
                        <div class="key">Location</div>
                        <div class="value"><?php echo $property_detail['state_name'].' / '.$property_detail['city_name'];?></div>
                    </div><!-- /.listing-detail-attribute -->                                             
                                            
                    <div class="listing-detail-attribute">
                        <div class="key">Rent / per month</div>
                        <div class="value">$ <?php echo $property_detail['price'];?> </div>
                    </div><!-- /.listing-detail-attribute -->
                </div><!-- /.listing-detail-attributes -->            
                        </div><!-- /.col-sm-12 -->
                
                
                
                
                        <div class="listing-detail col-md-8 col-lg-9">
                        	<!---------------------->
                
                <ul class="nav nav-tabs nav-tabs-items-2" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#property-description">Basic Information</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#property-amenities">Amenities</a>
				</li>
		
			</ul>
                <!--------------->
                            <div class="gallery tab-pane active" id="gallery_imgs" role="tabpanel">
                                <?php foreach($property_images as $images){
                                    $image = base_url()."uploads/".$images['image'];
                                ?>
                                <!--<div class="gallery-item" style="background-image: url('assets/img/tmp/tmp-5.jpg');">-->
                                <div class="gallery-item" style="background-image: url('<?php echo $image;?>');">
                                </div><!-- /.gallery-item -->            
                                <?php } ?>
                               
           					 </div><!-- /.gallery -->
                             <div id="loc_map" class="tab-pane" role="tabpanel">
                             	
                             </div><!--loc_map-->

<div class="row">            
    <div class="col-lg-5">
        <div class="overview">
            <h2>Property Attributes</h2>

            <ul>
                <li><strong>Price</strong><span>$ <?php echo $property_detail['price'];?> / per month</span></li>
                <li><strong>Location</strong><span><?php echo $property_detail['state_name'];?></span></li>
                <li><strong>Status</strong><span><?php echo ucfirst($property_detail['available_status']);?></span></li>
                <li><strong>Bedrooms</strong><span><?php echo $property_detail['bedrooms'];?></span></li>
                <li><strong>Bathrooms</strong><span><?php echo $property_detail['washrooms'];?></span></li>
                <li><strong>Area</strong><span><?php echo $property_detail['coverd_area'];?> sqft</span></li>                    
            </ul>
        </div><!-- /.overview -->
    </div><!-- /.col-* -->

    <div class="col-lg-7">
        <h2>Property Description</h2>

        <p>
            <?php echo $property_detail['description'];?>
        </p>

    </div><!-- /.col-* -->
</div><!-- /.row -->            

            <!--<div class="call-to-action-small">
	<h1>Looking for more comfortable experience?</h1>
	<h2>Check out our mobile application and browse the properties as no other.</h2>

	<div class="call-to-action-small-buttons">
		<a href="#" class="btn btn-secondary"><i class="fa fa-apple"></i> Download iOS</a>
		<a href="#" class="btn btn-secondary"><i class="fa fa-android"></i> Download Android</a>
	</div><!-- /.call-to-action-small-buttons -->
<!--</div>--><!-- /.call-to-action-small -->

            <h2>Amenities</h2>

            <ul class="amenities">
            <?php 
				
			
			foreach($amenities as $amenity){ 
					 if(in_array($amenity['id'],$property_amenities)){
					 	 $class ='yes';
					 }else{
					 	$class ='no';
					 }
			?>
               <!-- <li class="yes">Conditioning</li>
                <li class="no">Balcony</li>-->
                
                <li class="<?php echo $class;?>"> <?php echo $amenity['name'];?> </li>
             <?php }?> 
            </ul>    

           

            <h2><?php if($total_comments){ echo $total_comments;}else{ echo '0';} ?> comments in this topic</h2>

<ul class="comments">
	
<?php foreach($comments as $single_comment){
	
			if($single_comment['profile_image']){
				 $image = base_url()."uploads/".$single_comment['profile_image'];
			}else{
				$image= "assets/img/tmp/agent-1.jpg";
			}
			
			$date = date('h:i A m/d/Y',strtotime($single_comment['created_date']));

?>
	<li>
		<div class="comment">			
			<div class="comment-author">
				<a href="javascript:void(0)" style="background-image: url('<?php echo $image;?>');"></a>
                
			</div><!-- /.comment-author -->

			<div class="comment-content">			
				<div class="comment-meta">
					<div class="comment-meta-author">
						Posted by <a href="javascript:void(0)"><?php echo $single_comment['first_name'].' '.$single_comment['last_name'];?></a>
					</div><!-- /.comment-meta-author -->

					

					<div class="comment-meta-date">
						<span><?php echo $date;?></span>
					</div>
				</div><!-- /.comment -->

				<div class="comment-body">
					

					<?php echo  $single_comment['comment_detail'];?>
				</div><!-- /.comment-body -->
			</div><!-- /.comment-content -->
		</div><!-- /.comment -->		
	</li>
    
  <?php }?>  	
</ul>

<h2 id="comment-create">Write Feedback </h2>

<div class="comment-create" >
        <div class="alert alert-success alert-dismissible" style="display:none">
          <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
          <span id="success"></span>
        </div>
		<div class="alert alert-danger alert-dismissible" style="display:none">
          <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
          <span id="danger"></span>
        </div>
	<form method="post" name="comments" id="comments">
		<div class="form-group">
			<label>Message</label>
			<textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
		</div><!-- /.form-group -->

	

		<div class="form-group-btn">
              
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"  />
        <input type="hidden" name="property_id" value="<?php echo $property_detail['id'];?>"  />
			<button type="submit" class="btn btn-primary pull-right">Post Comment</button>
		</div><!-- /.form-group-btn -->
	</form>
    
     <script type="text/javascript">
  function hide(classname){
	$('.'+classname).css('display','none')
  }
  </script>  
</div><!-- /.comment-create -->

        </div><!-- /.col-* -->

        <div class="col-md-4 col-lg-3">
            <div class="widget">
    <ul class="nav nav-stacked nav-style-primary">
        <li class="nav-item">
        
       <!-- <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php //echo base_url(uri_string());?>" class="nav-link" target="_blank"> -->
       
       <?php $str = base_url();
			$str = preg_replace('#^https?://#', '', $str);
			
			$url = rtrim($str,'/');
			 ?>
        
            <a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2F<?php echo $url;?>%2Fproperty%2Fproperty_detail%2F<?php echo $property_detail['id']; ?>&picture=<?php echo $image;?>" title="Facebook Share" class="nav-link">
                <i class="fa fa-share-alt"></i> Share Property
            </a><?php //echo base_url(uri_string());?>
        </li><!-- /.nav-item -->
	<?php if($this->session->userdata('loginid')){?>
        <li class="nav-item" id="favrit">
            <a href="javascript:user_favourit(<?php echo $property_detail['id']; ?>,<?php echo $this->session->userdata('loginid'); ?>,<?php echo $favourit;?>);" class="nav-link" >
                <i class="fa fa-heart" <?php echo $style;?>></i> Add to Favorites
            </a>
        </li><!-- /.nav-item -->
	<?php }else{?>
		<li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" title="Login to your account" >
                <i class="fa fa-heart" <?php echo $style;?>></i> Add to Favorites
            </a>
        </li><!-- /.nav-item -->
    
    <?php }?>
        <li class="nav-item">
            <a href="#comment-create" class="nav-link">
                <i class="fa fa-comment"></i> Write Review
            </a>
        </li><!-- /.nav-item -->
		
       <?php if($this->session->userdata('loginid')){?>
        <li class="nav-item">
            <a href="<?php echo base_url().'property/report/'.$property_detail['id'];?>" class="nav-link">
               <i class="fa fa-warning"></i> Report Abuse
            </a>
        </li><!-- /.nav-item -->   
        
         <?php }?>
                         
    </ul><!-- /.nav-style-primary -->
</div><!-- /.widget -->

<?php if(!($this->session->userdata('loginid'))){?>
   <div class="widget widget-background-white">
    <h3 class="widgettitle">Inquire Form</h3>

    <form method="post" action="" id="propertyemailcontact">
   		 <div class="alert alert-success alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
                      <span id="success">Message send successfuly!</span>
                    </div>
                    <div class="alert alert-danger alert-dismissible" style="display:none">
                      <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
                      <span id="danger">Error while sending message!</span>
                    </div>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="username" id="username" class="form-control" value="">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="useremail" class="form-control" value="">
        </div><!-- /.form-group -->

        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject" id="subject">
        </div><!-- /.form-group -->                

        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" rows="4" name="emailmessage" id="emailmessage"></textarea>
        </div><!-- /.form-group -->                               
	
            <input type="hidden" class="form-control" id="propertyurl" name="propertyurl">        
            <input type="hidden" class="form-control" id="propertyemail" name="propertyemail" value="<?php echo $property_detail['useremail'];?>">

        <div class="form-group-btn">
            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
        </div><!-- /.form-group-btn -->
    </form>
</div><!-- /.widget -->
<?php }else{ ?>
		
        <div class="widget widget-background-white">
    	<h3 class="widgettitle">Contact Form</h3>
        <form method="post" action="" id="propertycontact">
             <div class="alert alert-success alert-dismissible" style="display:none">
              <a href="#" class="close" onclick="hide('alert-success')" aria-label="close">&times;</a>
              <span id="success">Message send successfuly!</span>
            </div>
            <div class="alert alert-danger alert-dismissible" style="display:none">
              <a href="#" class="close" onclick="hide('alert-danger')" aria-label="close">&times;</a>
              <span id="danger">Error while sending message!</span>
            </div>
            
            <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="inboxsubject" id="inboxsubject">
        </div><!-- /.form-group -->  
            
            <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" rows="4" name="inboxmessage" id="inboxmessage"></textarea>
        	</div><!-- /.form-group --> 
            
            <input type="hidden" class="form-control" id="propertyurl" name="propertyurl">
            <input type="hidden" class="form-control" id="from_id" name="from_id" value="<?php echo $user_id;?>">
            <input type="hidden" class="form-control" id="to_id" name="to_id" value="<?php echo $property_detail['user_id'];?>"> 
            <input type="hidden" class="form-control" id="property_id" name="property_id" value="<?php echo $property_detail['id'];?>"> 
            
            <div class="form-group-btn">
            	<button type="submit" class="btn btn-primary btn-block">Send Message</button>
       		</div><!-- /.form-group-btn --> 
        
        </form>
        </div><!-- /.widget -->

<?php }?>
             
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
  
  
  <script type="text/javascript">
  var url      = window.location.href; 
   $('#propertyurl').val(url);
  console.log(url);
  
	function user_favourit(id,user_id,favourit){
	
	
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"property/user_favourit",
			   data: {id:id,user_id:user_id,favourit:favourit}, 
			   success: function(output){
			   	if(output==1){
					$('.fa-heart').css('color','red');
					$("#favrit a").attr("href", 'javascript:user_favourit('+id+','+user_id+',1)');
				}else if(output==0){
			   		$('.fa-heart').css('color','white');
					$("#favrit a").attr("href", 'javascript:user_favourit('+id+','+user_id+',0)');
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	} 
	
	function hide(classname){
	$('.'+classname).css('display','none')
  }
</script>	