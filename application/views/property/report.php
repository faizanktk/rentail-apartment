<div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Report Property</h1>		

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url()?>property">Properties</a></li>
				<li class="active">Report Property</li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9">
				            <div class="content">	
                        <?php if($this->session->flashdata('success')){?>     
                      <div style="margin-top:18px;" class="alert alert-success fade in alert-dismissable">
                        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">&times;</a>
                        <strong>Success!</strong> Your report is successful submit.
                    </div>
                    <?php }?>
                    
                     <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger fade in alert-dismissable">
                        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">&times;</a>
                        <strong>Danger!</strong> There is an error on sumittion report.
                    </div>
                     <?php }?>
                                                       
	<form method="post" action="<?php echo base_url();?>property/report_submit">
    <div class="form-group">
        <div class="checkbox">
            <label for="spam">
                <input type="radio" name="reason" id="spam" required="required" value="It is spam" onclick="ShowHideDiv()">
                It is spam               
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="nudity">
                <input type="radio" name="reason" id="nudity" required="required" value="It is nudity or pornography" onclick="ShowHideDiv()">
                It is nudity or pornography                
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="humiliation">
                <input type="radio" name="reason" id="humiliation" required="required" value="It humiliates somebody" onclick="ShowHideDiv()">
                It humiliates somebody               
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="inappropriate">
                <input type="radio" name="reason" id="inappropriate" required="required" value="It is inappropriate" onclick="ShowHideDiv()">
                It is inappropriate               
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="attack">
                <input type="radio" name="reason" id="attack" required="required" value="It insults or attacks someone based on their religion, ethnicity or sexual orientation" onclick="ShowHideDiv()">
                It insults or attacks someone based on their religion, ethnicity or sexual orientation               
            </label>
        </div><!-- /.radio -->            

        <div class="checkbox">
            <label for="violence">
                <input type="radio" name="reason" id="violence" required="required" value="It advocates violence or harm to a person or animal" onclick="ShowHideDiv()">
                It advocates violence or harm to a person or animal               
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="harming">
                <input type="radio" name="reason" id="harming" required="required" value="It displays someone harming themself or planning to harm themself" onclick="ShowHideDiv()">
                It displays someone harming themself or planning to harm themself                
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="drugs">
                <input type="radio" name="reason" id="drugs" required="required" value="It describes buying or selling drugs, guns or regulated products" onclick="ShowHideDiv()">
                It describes buying or selling drugs, guns or regulated products                
            </label>
        </div><!-- /.radio -->


        <div class="checkbox">
            <label for="unauthorized">
                <input type="radio" name="reason" id="unauthorized" required="required" value="It is an unauthorized use of my intellectual property" onclick="ShowHideDiv()">
                It is an unauthorized use of my intellectual property                
            </label>
        </div><!-- /.radio -->

        <div class="checkbox">
            <label for="something_else">
                <input type="radio" name="reason" id="something_else" required="required" value="Something else" onclick="ShowHideDiv()">
                Something else                
            </label>
        </div><!-- /.radio -->
    </div><!-- /.form-group -->

    <div class="form-group" id="other_info" style="display: none" >
        <textarea class="form-control" name="message" placeholder="Other reason or additional information" rows="4"></textarea>
    </div><!-- /.form-group -->


    <div class="button-wrapper">
    <input type="hidden" value="<?php echo $user_id;?>" name="user_id"  />
    <input type="hidden" value="<?php echo $property_id;?>" name="property_id"  />
        <button type="submit" class="btn btn-primary" name="report_form">Submit to review</button>
    </div><!-- /.button-wrapper -->
</form>
				            </div><!-- /.content -->
			            </div><!-- /.col-* -->

			            
		            </div><!-- /.row -->
	            </div><!-- /.container -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
    
     <script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("something_else");
        var dvMessage = document.getElementById("other_info");
        dvMessage.style.display = chkYes.checked ? "block" : "none";
    }
	</script>