<div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Create Account</h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				
				<li class="active">Sign Up</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				
<style type="text/css" >
.help-block-error {
    color: red;
}

</style>
	            <div class="content">
	                <div class="container">	
	<form method="post" action="<?php echo base_url()?>login/register"  id="register">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
<!--<div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>

<div class="alert alert-info">
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates a warning that might need attention.
</div>-->

                    <?php if($this->session->flashdata('message_name')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?php echo $this->session->flashdata('message_name');?>
                    </div>
                    <?php }?>
                    
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" id="username" class="form-control" required >
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">E-mail</label>
							<input type="email" name="email" class="form-control" required>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label for="">Retype Password</label>
							<input type="password" name="confirmpassword" class="form-control" required>
						</div><!-- /.form-group -->
							
						<input type="hidden" name="redirurl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
				<div class="center">
					<div class="checkbox">
						<label>
							<input checked="checked" type="checkbox"> By signing up, you agree with the <a href="<?php echo base_url();?>home/termsandconditions">terms and conditions</a>.
						</label>
					</div><!-- /.form-group -->

					<div class="form-group-btn">
						<button type="submit" class="btn btn-primary">Create Account</button>
					</div><!-- /.form-group-btn -->					
				</div><!-- /.center -->

				<div class="form-group-bottom-link">
					<a href="<?php echo base_url();?>login">I already have an account <i class="fa fa-long-arrow-right"></i></a>
				</div><!-- /.form-group-bottom-link -->				
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>			
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div>
    