<?php include_once 'template/menu/menu_admin.php';?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-users">&nbsp;</i>Pelanggan</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Informasi Pelanggan 
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Username</th>
								<th>Info</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$a ="SELECT * from user where user_level=0";
								$b = mysql_query($a);
								$no =1;

								while($c = mysql_fetch_array($b)){
									?>
									<td><?php echo $no; ?></td>
									<td><a href="#"><b>#<?php echo $c['user_id'];?></b></a></td>
									<td><?php echo $c['user_username']; ?></td>
									<td><?php echo $c['user_info']; ?></td>
									<td><span class="fa fa-delete">
										<a onclick="return confirm('Are you sure?')" href="index.php?view=pelanggan_del&user_id=<?php echo $c['user_id'];?>" title="Delete"><i class="fa fa-times"></i></a>
									</span></td>
				
								</tr>
								<?php
								$no++;
							}
							?>
						</tbody>
					</table>

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
<!-- /#page-wrapper -->