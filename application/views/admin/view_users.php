<?php //$this->load->view('common/admin_header');?>
<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Users</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						<!--<a href="#" class="btn btn-primary">Create New User</a>-->
					</div><!-- /.dashboard-header -->
					
                    <div class="filter filter-gray push-bottom">
                        <form method="get" action="<?php echo base_url();?>admin/view_users">
                            <div class="row">
                    
                
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name / Username</label>
                            <input type="text" class="form-control" name="key" value="<?php echo $this->input->get('key');?>">
                        </div><!-- /.form-group -->
                    </div><!-- /.col-* -->
                
                    
                
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                 <option value="">Select</option>
                                        
                                 <option <?php if($this->input->get('status')=='active'){ ?> selected="selected" <?php }?> value="active">Active</option>
                                 <option <?php if($this->input->get('status')=='inactive'){ ?> selected="selected" <?php }?> value="inactive">Inactive</option>
                                        
                            </select>
                        </div><!-- /.form-group -->		
                    </div><!-- /.col-* -->
                
                    <div class="col-md-2">
                        <div class="form-group-btn form-group-btn-placeholder-gap">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div><!-- /.form-group -->		
                    </div><!-- /.col-* -->			
                </div><!-- /.row -->
                            <div class="row filter-options">
                    
                    <div class="col-sm-6">
                        <div class="filter-sord">
                            <strong>Order By</strong>
                
                            <div class="checkbox-inline">
                                <label><input type="radio" name="order" <?php if($this->input->get('order')=='asc'){?>checked="checked"<?php }?> value="asc" > Asc</label>
                            </div><!-- /.checkbox -->
                
                            <div class="checkbox-inline">
                                <label><input type="radio" name="order" <?php if($this->input->get('order')=='desc'){?>checked="checked"<?php }?>  value="desc"> Desc</label>
                            </div><!-- /.checkbox -->
                        </div><!-- /.filter-order -->				
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
                        </form>
	</div><!-- /.filter -->
                    
					<!--<div class="dashboard-subheader">
						<h2>123 Users Matching Your Criteria</h2>		

						<div class="dashboard-subheader-actions">
							<a href="#" class="btn btn-secondary"><i class="fa fa-filter"></i> Redefine Search Criteria</a><a href="#" class="btn btn-secondary"><i class="fa fa-times"></i> Remove All</a>
						</div><!-- /.dashboard-subheader-actions -->
					<!--</div>--><!-- /.dashboard-header -->

					<div class="row">
						<table class="table table-users">
	<thead>
		<tr>
			<th class="min-width"></th>
			<th>Name</th>
			<th>Username</th>
            <th>Address</th>
            <th>Status</th>
			<th colspan="2" align="center" style="text-align:center" class="min-width ">Action</th>
		</tr>
	</thead>
	<tbody>
		
        <?php 
			$i=$page+1;;
			//print_r($all_users);exit;
			
		foreach($all_users as $row){
			$address = $row['address'].', '.$row['city_name'].', '.$row['state_name'].', '.$row['zipcode'];
			if($row['profile_image']){
				 $image = base_url()."uploads/".$row['profile_image'];
			}else{
				$image= "assets/img/tmp/agent-1.jpg";
			}
			
		?>
			<tr id="row_<?php echo $row['user_id']; ?>">
				<td class="min-width"><?php echo $i; ?></td>
				<td>
					<span class="user-image" style="background-image: url('<?php echo $image;?>');"></span>
					<?php echo $row['first_name'].' '.$row['last_name']?>
				</td>
				<td><?php echo $row['username'];?></td>
                <td><?php  echo rtrim($address , ', '); ?></td>
                <td>
				<a  href="javascript:user_status(<?php echo $row['user_id']; ?>);">
					<?php 
						
						if($row['user_status']==0){ ?>
							<span id='status_id_<?php echo $row['user_id']; ?>' data-id="0" ><i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i></span>

						<?php }elseif($row['user_status']==1){?>
							<span id='status_id_<?php echo $row['user_id']; ?>' data-id="1" ><i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i></span>
						<?php }
				
				?></a></td>
				<td class="min-width">
					<!--<a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>-->
					<a href="javascript:delete_user(<?php echo $row['user_id']; ?>);" class="btn btn-danger"><i class="fa fa-times"></i> Remove</a>
				</td>
			</tr>
		<?php $i++; }?>
			
		
	</tbody>
</table>

	<?php echo $pagenations;?>

<!-- /.pagination-wrapper -->
					</div><!-- /.row -->	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->	
<script type="text/javascript">
	function user_status(user_id){
	
	status = $('#status_id_'+user_id).data("id");
	
	//alert(user_id+status);
	$.ajax({
			type: "POST",
			   url: baseurl+"admin/user_status",
			   data: {user_id:user_id,status:status}, 
			   success: function(data){
			   	if(data==1){
					if(status == 1) {
				   		$('#status_id_'+user_id).data("id", 0);
				  		 $('#status_id_'+user_id).html('<i style="background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-times" aria-hidden="true" ></i>');
				   }else{
				  	 $('#status_id_'+user_id).data("id", 1);
					 $('#status_id_'+user_id).html('<i style="background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; " class="fa fa-check" aria-hidden="true" ></i>');
				  }
			   }else{
			   	alert('Error');
			   }
			}   
		});
	
	}
	//----- User deletion ----------
	function delete_user(user_id){
 	 if (confirm("Are you sure to delete this User ?") == false){
                return;
  	}

	 $.ajax({
	   type: "POST",
	   url: "<?php echo base_url();?>admin/delete_user",
	   async: false ,
	   data: {user_id:user_id},
	   success: function(output)
	   {  
	   
	   if (output==1)
	   
	   {
	$('#row_'+user_id).remove();
	   }
	   else
	   {
	   
	   alert ("Deletion Failed")
	   }
	   
	   }  
	   }); 

}
	
	
</script>