<?php //$this->load->view('common/admin_header');?>
<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Inbox</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						<!--<a href="#" class="btn btn-primary">Create New User</a>-->
					</div><!-- /.dashboard-header -->
					
                    <div class="filter filter-gray push-bottom">
                        <form method="get" action="<?php echo base_url();?>user/message_inbox">
                            <div class="row">
                    
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" value="<?php echo $this->input->get('subject');?>">
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
                    

					<div class="row">
						<table class="table table-users">
                        <thead>
                            <tr>
                                <th class="min-width"></th>
                                
                                <th >From</th>
                                <th >Subject</th>
                                <th>Property</th>
                                <th>Time</th>
                                <th>View</th>
                                <th colspan="2" align="center" style="text-align:center" class="min-width ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
							$i=1;
							foreach($messages as $row){
							
							
								$users = $this->common_model->get_table_data('profile','*',array('user_id'=>$row['from_id']),'',$r=1);
								if($users['profile_image']){
									 $image = base_url()."uploads/".$users['profile_image'];
								}else{
									$image= "assets/img/tmp/agent-1.jpg";
								}
								
								$propert_title = $this->common_model->get_table_data('property','title',array('id'=>$row['property_id']),'',$v=1);
								
								
								if($row['status_read']==0){
									$style = "style='background-color: gray;'";
								}else{
									$style = "style='background-color: white;'";
								}
							?>
                            
                            
								<tr id="row_<?php echo $row['id']; ?>" <?php echo $style;?>>
                                <td class="min-width"><?php echo $i; ?></td>
                                <td >
                                    <span class="user-image" style="background-image: url('<?php echo $image;?>');"></span>
                                    <?php echo $users['first_name'].' '.$users['last_name']?>
                                </td>
                                <td ><?php echo $row['subject'];?></td>
                                <td><a href="<?php echo $row['propertyurl']?>" target="_blank"><?php echo $propert_title['title'];?></a></td>
                                
                                <td><?php echo date('h:i a m/d/Y',strtotime($row['created_date']));?></td>
                                <td><a href="<?php echo base_url().'user/view_message/'. $row['id'].'/'.$row['property_id'].'/'.$row['from_id'].'/'.$row['to_id'];?>" class="btn btn-primary"><i class="fa fa-eye"></i> View</a></td>
                                
                                <td class="min-width">
                                    <!--<a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>-->
                                    <a href="javascript:delete_message(<?php echo $row['id']; ?>);" class="btn btn-danger"><i class="fa fa-times"></i> Remove</a>
                                </td>
        
							</tr>
			
							<?php $i++;}?>
			
		
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
	
	//----- User deletion ----------
	function delete_message(message_id){
 	 if (confirm("Are you sure to delete this message ?") == false){
                return;
  	}

	 $.ajax({
	   type: "POST",
	   url: "<?php echo base_url();?>user/delete_message",
	   async: false ,
	   data: {message_id:message_id},
	   success: function(output)
	   {  
	   
	   if (output==1)
	   
	   {
	$('#row_'+message_id).remove();
	   }
	   else
	   {
	   
	   alert ("Deletion Failed")
	   }
	   
	   }  
	   }); 

}
	
	
</script>