<div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Login Page</h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li class="active">Login</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				<?php
					if(isset($_SERVER['HTTP_REFERER'])){
						$url = $_SERVER['HTTP_REFERER'];
					}else{
						$url = base_url();
					}
				
				?>

	            <div class="content">
	                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4">
                            <form method="post" action="<?php echo base_url();?>login/userlogin" name="login">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username"  required >
                                </div><!-- /.form-group -->
                
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div><!-- /.form-group -->
                                <input type="hidden" name="redirurl" value="<?php echo $url; ?>" />
                                <div class="form-group-btn">
                                    <button type="submit" class="btn btn-primary pull-right">Sign In</button>
                                </div><!-- /.form-group-btn -->
                
                                <div class="form-group-bottom-link" >
                                    <a href="<?php echo base_url();?>login/signup">Sign Up <i class="fa fa-long-arrow-right"></i></a>
                                </div><!-- /.form-group-bottom-link -->
                                
                                <div class="form-group-bottom-link" style="border-top: 0px none; margin: 0px;">
                                    <a href="<?php echo base_url();?>login/reset_password">I forgot my password <i class="fa fa-long-arrow-right"></i></a>
                                </div><!-- /.form-group-bottom-link -->
                            </form>
                        </div><!-- /.col-* -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div>