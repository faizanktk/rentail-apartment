<?php //$this->load->view('common/admin_header');?>
<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Users</h1>

						<a href="<?php echo base_url()?>admin/add_amenities" class="btn btn-primary">Create New Amenity</a>
                         <a href="<?php echo base_url();?>" class="btn btn-primary pull-right" target="_blank">Home</a>
					</div><!-- /.dashboard-header -->

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
                                <th>Amenity</th>
                                
                                <th class="min-width">Action</th>
                            </tr>
                        </thead>
                        <tbody>
		
						<?php 
                            $i=$page+1;
                            //print_r($all_users);exit;
                            
                        foreach($amenities as $row){
                            
                        ?>
                            <tr id="row_<?php echo $row['id']; ?>">
                                <td class="min-width"><?php echo $i; ?></td>
                                
                                <td><?php echo $row['name'];?></td>
                                
                                <td class="min-width">
                                    <!--<a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>-->
                                    <a href="javascript:delete_amenity(<?php echo $row['id']; ?>);" class="btn btn-danger"><i class="fa fa-times"></i> Remove</a>
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