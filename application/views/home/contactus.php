 <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Contact Us</h1>		

			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				
				<li class="active">Contact Us</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

	            <div class="content">
	                <div id="map-contact" class="contact-map">
</div><!-- /.contact-map -->

<div class="container">
	<div class="row">	
		<div class="col-md-8 col-lg-9">
			<div class="page-subheader page-subheader-small">
				<h3>Contact Form</h3>
			</div>
            
                <div id="cont-succ" class="alert alert-success alert-dismissible" style="display:none">
              <a href="javascript:void(0)" class="close" onclick="hide('cont-succ')" aria-label="close">&times;</a>
              <span id="success"></span>
            </div>
            
            <div id="cont-dang" class="alert alert-danger alert-dismissible" style="display:none">
              <a href="javascript:void(0)" class="close" onclick="hide('cont-dang')" aria-label="close">&times;</a>
              <span id="danger"></span>
            </div>
            
			<div class="row">
				<form method="post"  id="contactusform">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" required>
						</div><!-- /.form-group -->
					</div><!-- /.col-* -->

					<div class="col-sm-6">
						<div class="form-group">
							<label>E-mail</label>
							<input type="email" class="form-control" name="email" required>
						</div><!-- /.form-group -->
					</div><!-- /.col-* -->
                    
                    <div class="col-sm-12">
						<div class="form-group">
							<label>Subject</label>
							<input type="text" class="form-control" name="subject" required>
						</div><!-- /.form-group -->
					</div><!-- /.col-* -->

					<div class="col-sm-12">
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" rows="6" name="emailmessage" required placeholder="Please keep your message as simple as possible"></textarea>
						</div><!-- /.form-control -->
					</div><!-- /.col-* -->

					<div class="col-sm-12">
                    	<i class="fa fa-circle-o-notch fa-spin pull-right" style="font-size:24px; color:#0AA998;line-height: 40px; display:none;"></i>
						<button type="submit" class="btn btn-primary pull-right">Post Message </button>
					</div><!-- /.col-* -->
				</form>
			</div><!-- /.row -->
    	</div><!-- /.col-* -->

	    <div class="col-md-4 col-lg-3">
	    	<div class="sidebar">    			
				<div class="widget">
	<h2 class="widgettitle">Contact Information</h2>

	<table class="contact">
		<tbody>
			<tr>
				<th>Address:</th>
				<td>2300 Main Ave.<br>Lost Angeles, CA 23123<br>United States<br></td>
			</tr>

			<tr>
				<th>Phone:</th>
				<td>+0-123-456-789</td>
			</tr>

			<tr>
				<th>E-mail:</th>
				<td><a href="mailto:info@example.com">info@example.com</a></td>
			</tr>

			<tr>
				<th>Skype:</th>
				<td>your.company</td>
			</tr>
		</tbody>
	</table>	
</div><!-- /.widget -->
	    	</div><!-- /.sidebar -->
	    </div><!-- /.col-* -->
	</div><!-- /.row -->    	
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
<style>
.has-error{
	color:#FF0000;
}
</style>  
<script type="text/javascript">
  function hide(classname){
	$('#'+classname).css('display','none')
  }
  </script> 