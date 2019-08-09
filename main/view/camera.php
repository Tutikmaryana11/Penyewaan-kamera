<?php include_once 'template/menu/menu_admin.php';?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-automobile">&nbsp;</i>Camera <a href="index.php?view=camera_view_add"><span class="fa fa-plus-circle"></span></a></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Informasi Camera 
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Nama Alat</th>
								<th>Jumlah Unit</th>
								<th>Harga</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Kategori</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$a ="SELECT * from camera ab join kategori kt on kt.kategori_id = ab.cm_kategori_id order by cm_id desc";
								$b = mysql_query($a);
								$no =1;

								while($c = mysql_fetch_array($b)){
									?>
									<td><?php echo $no; ?></td>
									<td><img width="100" class="img-fluid" src="../main/file/<?php echo $c['cm_foto']?>" alt=""></td>
									<td><?php echo $c['cm_nama']; ?></td>
									<td><?php echo $c['cm_jumlah_ketersediaan']; ?></td>
									<td><?php echo $c['cm_harga']; ?></td>
									<td><?php echo $c['cm_keterangan']; ?></td>
									<td>
									<?php
									if ($c['cm_status']==0) {
										echo "Tidak Tersedia";
									} else {
										echo "Tersedia";
									}
									  ?>	
									
									</td>
									<td><?php echo $c['kategori_nama']; ?></td>
									<td>
										<a href="index.php?view=camera_edit&cm_id=<?php echo $c['cm_id'];?>" title="Edit"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;
										<a onclick="return confirm('Are you sure?')" href="index.php?view=camera_del&cm_id=<?php echo $c['cm_id'];?>" title="Delete"><i class="fa fa-times"></i></a>

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