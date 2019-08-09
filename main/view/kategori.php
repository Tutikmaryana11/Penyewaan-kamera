<?php include_once 'template/menu/menu_admin.php';?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-list-ol">&nbsp;</i>Kategori <a href="index.php?view=kategori_view_add"><span class="fa fa-plus-circle"></span></a></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Informasi Kategori 
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>ID kategori</th>
								<th>Nama kategori</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$a ="SELECT * from kategori order by kategori_id desc";
								$b = mysql_query($a);
								$no =1;

								while($c = mysql_fetch_array($b)){
									?>
									<td><?php echo $no; ?></td>
									<td><a href="#"><b><?php echo $c['kategori_id'];?></b></a></td>
									<td><?php echo $c['kategori_nama']; ?></td>
									<td>
										<a href="index.php?view=kategori_edit&kategori_id=<?php echo $c['kategori_id'];?>" title="Edit"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;
										<a onclick="return confirm('Are you sure?')" href="index.php?view=kategori_del&kategori_id=<?php echo $c['kategori_id'];?>" title="Delete"><i class="fa fa-times"></i></a>

									</td>
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