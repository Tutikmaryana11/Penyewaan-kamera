<?php include_once 'template/menu/menu_admin.php';
if ($_SESSION['user_id'] ==1) { ?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-repeat">&nbsp;</i>Pengembalian</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Informasi Pengembalian 
						<b><p>*Klik nomor invoice untuk detail pengembalian</p></b>

					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>No Invoice</th>
									<th>Customer</th>
									<th>Alamat</th>
									<th>Status Pengembalian</th>
									<!-- <th>Action</th> -->
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$a ="SELECT distinct(ds.id_sewa), ds.status_peminjaman,s.* from sewa s 
									join detail_sewa ds on ds.id_sewa = s.sewa_id 
									join camera ab on ab.cm_id = ds.id_ab
									left join bayar b on b.bayar_sewa_id = s.sewa_id";
									$b = mysql_query($a);
									$no =1;

									while($c = mysql_fetch_array($b)){
// 								echo "<pre>";
// print_r($c);
// echo "</pre>";
										?>
										<td><?php echo $no; ?></td>
										<td><a href="index.php?view=pengembalian_detail&id_sewa=<?php echo $c['sewa_id']?>"><b>#<?php echo $c['sewa_invoice'];?></b></a></td>
										<td><?php echo $c['sewa_customer']; ?></td>
										<td><?php echo $c['sewa_alamat']; ?></td>
										<td><?php
										if ($c['status_peminjaman'] == 0) {?>
											<div class="form-group">

												<div class="alert alert-danger alert-dismissable" style="display: block;">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
													Belum di kembalikan.
												</div>
											</div>
										<?php  } else { ?>
											<div class="form-group">

												<div class="alert alert-success alert-dismissable" style="display: block;">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
													Sudah di kembalikan.
												</div>
											</div>
											<?php } ?></td>

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
	<?php } else { 
		echo "<script>document.location.href='index.php?view=pembayaran_user&status=success';</script>";
	}
	?>
		 <script>
    $(document).ready(function() {
        $('#example').DataTable({
                responsive: true
        });
    });
    </script>