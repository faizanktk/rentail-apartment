 <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Reset Password</h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url();?>login">Login</a></li>
				<li class="active">Reset Password</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

	            <div class="content">
	                <div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<form method="post" id="resetpassword">
            
           <div id="reset-pass-succ" class="alert alert-success alert-dismissible" style="display:none">
          <a href="javascript:void(0)" class="close" onclick="hide('reset-pass-succ')" aria-label="close">&times;</a>
          <span id="success"></span>
        </div>
		<div id="reset-pass-dang" class="alert alert-danger alert-dismissible" style="display:none">
          <a href="javascript:void(0)" class="close" onclick="hide('reset-pass-dang')" aria-label="close">&times;</a>
          <span id="danger"></span>
        </div>
          
				<div class="form-group">
					<label for="">E-mail Address</label>
					<input type="email" required name="email" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group-btn">
                <i class="fa fa-circle-o-notch fa-spin pull-right" style="font-size:24px; color:#0AA998;line-height: 40px; display:none;"></i>
					<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
				</div><!-- /.form-group-btn -->

				<div class="form-group-bottom-link">
					<a href="<?php echo base_url();?>login"><i class="fa fa-long-arrow-left"></i> Return back to login</a>
				</div><!-- /.form-group-bottom-link -->
			</form>
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
    
     <script type="text/javascript">
  function hide(classname){
	$('#'+classname).css('display','none')
  }
  </script> 