<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
</head>

<body>
<?php if($this->session->flashdata('message_name')){
	
		echo $this->session->flashdata('message_name').'<br />';
	}?>
	<form method="post" action="<?php echo base_url();?>user/update" >
    	First Name : <input type="text" value="<?php echo $users['first_name']?>" name="first_name" required  /><br /><br />
        Last Name : <input type="text" value="<?php echo $users['last_name']?>" name="last_name" required  /><br /><br />
        Email : <input type="text" value="<?php echo $users['email']?>" name="email" required  readonly="readonly" /><br /><br />
        Martial Status : <input type="text" value="<?php echo $users['martial_status']?>" name="martial_status" required  /><br /><br />
        Family Members : <input type="text" value="<?php echo $users['family_member']?>" name="family_member" required  /><br /><br />
        Address : <input type="text" value="<?php echo $users['address']?>" name="address" required  /><br /><br />
       
       State :  <select name="state_id" onchange="getcities(this.value)" required>
        	<option value="" >Select City</option>
            <?php foreach($states as $state){?>
            	<option <?php if($state['id']==$users['state_id']){?> selected="selected"<?php }?> value="<?php echo $state['id']; ?>" ><?php echo $state['name']?></option>
            <?php }?>
        </select><br /><br />
       
        City : <div id="city_id">
        	<select name="city_id" required>
        	<option value="" >Select City</option>
            <?php foreach($cities as $city){?>
            	<option <?php if($city['id']==$users['city_id']){?> selected="selected"<?php }?> value="<?php echo $city['id']; ?>" ><?php echo $city['name']?></option>
            <?php }?>
        </select>
        
        </div>
        		
        <br /><br />
        
        zipcode : <input type="text" value="<?php echo $users['zipcode']?>" name="zipcode" required  /><br /><br />
        
        Mobile No : <input type="text" value="<?php echo $users['mobile_no']?>" name="mobile_no" required  /><br /><br />
        landline_no : <input type="text" value="<?php echo $users['landline_no']?>" name="landline_no" required  /><br /><br />
        
        social_security_no : <input type="text" value="<?php echo $users['social_security_no']?>" name="social_security_no" required  /><br /><br />
        user_id : <input type="text" value="<?php echo $users['user_id']?>" name="user_id" required  /><br /><br />
        
        <input type="submit" value="Submit"  />
         
    </form>
 </body>
 <script src="<?php echo base_url()?>assets/jquery.min.js" ></script>
  <script type="text/javascript">
 
 
			
        </script>
 
</html>


<div class="content">
	                <div class="container">	
	<form method="post">
		<div class="row">
			<div class="col-md-12 col-lg-8 col-lg-offset-2">
				<div class="row">	
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">E-mail</label>
							<input type="mail" class="form-control">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Retype Password</label>
							<input type="password" class="form-control">
						</div><!-- /.form-group -->
					</div><!-- /.col-* -->

					<div class="col-sm-6">	
						<div class="form-group">
							<label for="">First Name</label>
							<input type="text" class="form-control">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Last Name</label>
							<input type="text" class="form-control">
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Address</label>
							<textarea class="form-control" rows="5"></textarea>
						</div><!-- /.form-group -->						
					</div><!-- /.col-* -->
				</div><!-- /.row -->			

				<div class="center">
					<div class="checkbox">
						<label>
							<input type="checkbox"> By signing up, you agree with the <a href="terms-conditions.html">terms and conditions</a>.
						</label>
					</div><!-- /.form-group -->

					<div class="form-group-btn">
						<button type="submit" class="btn btn-primary">Create Account</button>
					</div><!-- /.form-group-btn -->					
				</div><!-- /.center -->

				<div class="form-group-bottom-link">
					<a href="login.html">I already have an account <i class="fa fa-long-arrow-right"></i></a>
				</div><!-- /.form-group-bottom-link -->				
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>			
</div><!-- /.container -->
	            </div>