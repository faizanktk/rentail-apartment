<div class="dashboard-content">	
				<div class="container-fluid">
					<div class="dashboard-header">
						<h1>Users</h1>

						<a href="#" class="btn btn-primary">Create New User</a>
					</div><!-- /.dashboard-header -->

					<div class="dashboard-subheader">
						<h2>123 Users Matching Your Criteria</h2>		

						<div class="dashboard-subheader-actions">
							<a href="#" class="btn btn-secondary"><i class="fa fa-filter"></i> Redefine Search Criteria</a><a href="#" class="btn btn-secondary"><i class="fa fa-times"></i> Remove All</a>
						</div><!-- /.dashboard-subheader-actions -->
					</div><!-- /.dashboard-header -->

					<div class="row">
						<table class="table table-users">
	<thead>
		<tr>
			<th class="min-width"></th>
			<th>Fullname</th>
			<th>Last Access</th>
			<th class="min-width">Action</th>
		</tr>
	</thead>
	<tbody>
    
    <?php foreach($st as $row){?>
		
			<tr>
				<td class="min-width"><input type="checkbox"></td>
				<td>
					
					<?php echo $row['name'];?>
				</td>
				<td>18:42 03/08/2016</td>
				<td class="min-width">
					<a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#" class="btn btn-danger"><i class="fa fa-times"></i> Remove</a>
				</td>
			</tr>
		
		<?php }?>	
		
	</tbody>
</table>

<?php echo $links;?>



<div class="pagination-wrapper">
	<ul class="pagination">
		<li class="page-item disabled">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>

		<li class="page-item">
			<a class="page-link" href="#">1</a>
		</li>

		<li class="page-item"><a class="page-link" href="#">2</a></li>

		<li class="page-item active"><a class="page-link" href="#">3 <span class="sr-only">(current)</span></a></li>

		<li class="page-item"><a class="page-link" href="#">4</a></li>

		<li class="page-item"><a class="page-link" href="#">5</a></li>

		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul><!-- /.pagination -->
</div><!-- /.pagination-wrapper -->
					</div><!-- /.row -->	
				</div><!-- /.container -->						
			</div><!-- /.dashboard-content -->			
		</div><!-- /.dashboard -->
	</div><!-- /.page-wrapper -->
