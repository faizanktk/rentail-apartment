<?php //$this->load->view('common/admin_header');?>
<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Message</h1>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>

						<!--<a href="#" class="btn btn-primary">Create New User</a>-->
					</div><!-- /.dashboard-header -->
					
                    <!-- /.filter -->
                    

					<div class="row">
						<div class="listing-detail col-md-8 col-lg-9">
						<ul class="comments">
                        
                        <?php foreach($messages as $row){
						
						$users = $this->common_model->get_table_data('profile','*',array('user_id'=>$row['from_id']),'',$r=1);
								if($users['profile_image']){
									 $image = base_url()."uploads/".$users['profile_image'];
								}else{
									$image= "assets/img/tmp/agent-1.jpg";
								}
						?>
                            <li>
                                <div class="comment">			
                                    <div class="comment-author">
                                        <a href="#" style="background-image: url('<?php echo $image;?>');"></a>
                                    </div><!-- /.comment-author -->
                        
                                    <div class="comment-content">			
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Posted by <a href="#"><?php echo $users['first_name'].' '.$users['last_name']?></a>
                                            </div><!-- /.comment-meta-author -->
                        
                                            
                                            <div class="comment-meta-date">
                                                <span><?php echo date('h:i A m/d/Y',strtotime($row['created_date']));?></span>
                                            </div>
                                        </div><!-- /.comment -->
                        
                                        <div class="comment-body">
                                        
                                        <h3><?php echo $row['subject'];?></h3>
                                           
                        
                                            <?php echo $row['message'];?>
                                        </div><!-- /.comment-body -->
                                    </div><!-- /.comment-content -->
                                </div><!-- /.comment -->	
                            </li>
                        	<?php }?>
                        </ul>
                        
                        <h2>Reply </h2>
                        
                        <div class="comment-create">
                            <form method="post" action="" id="replyinboxmessage">
                            
                            	
                            
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="5" name="inboxmessage" id="inboxmessage"></textarea>
                                </div><!-- /.form-group -->
                        
            <input type="hidden" class="form-control" id="propertyurl" name="propertyurl" value="<?php echo base_url().'property/property_detail/'.$property_id?>">
            <input type="hidden" class="form-control" id="from_id" name="from_id" value="<?php echo $from_id;?>">
            <input type="hidden" class="form-control" id="to_id" name="to_id" value="<?php echo $to_id;?>"> 
            <input type="hidden" class="form-control" id="property_id" name="property_id" value="<?php echo $property_id;?>">
                        
                                <div class="form-group-btn">
                                   <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                                </div><!-- /.form-group-btn -->
                            </form>
                        </div><!-- /.comment-create -->
                            
                        </div><!-- /.col-* -->

					</div><!-- /.row -->	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->