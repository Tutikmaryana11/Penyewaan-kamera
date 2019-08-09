<?php include_once 'template/menu/menu_admin.php';
if ($_SESSION['user_id'] ==1) { ?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><i class="fa fa-th-list">&nbsp;</i>Penyewaan <a href="index.php?view=penyewaan_view_add"><span class="fa fa-plus-circle"></span></a></h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Informasi Penyewaan 
						<b><p>*Klik nomor invoice untuk detail penyewaan</p></b>
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
									<th>Status Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$a ="SELECT distinct(ds.id_sewa),ds.status_peminjaman, s.*,b.* from sewa s 
									join detail_sewa ds on ds.id_sewa = s.sewa_id
									left join bayar b on s.sewa_id=b.bayar_sewa_id";
									$b = mysql_query($a);
									$no =1;

									while($c = mysql_fetch_array($b)){
										// echo "<pre>";
										// print_r($c);
										// echo "</pre>";

										?>
										<td><?php echo $no; ?></td>
										<td>
											<?php if ($c['bayar_status'] == null) { ?>
												<a href="index.php?view=penyewaan_detail&id_sewa=<?php echo $c['sewa_id']?>&edit=true"><b>#<?php echo $c['sewa_invoice'];?></b></a>
											<?php } else { ?>
												<a href="index.php?view=penyewaan_detail&id_sewa=<?php echo $c['sewa_id']?>&edit=false"><b>#<?php echo $c['sewa_invoice'];?></b></a>
											<?php } ?>
										</td>
										<td><?php echo $c['sewa_customer']; ?></td>
										<td><?php echo $c['sewa_alamat']; ?></td>
										<td><?php
										if ($c['status_peminjaman'] == 0) {?>
											<div class="form-group">

												<div class="alert alert-danger alert-dismissable" style="display: block;">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
													Dalam masa penyewaan
												</div>
											</div>
										<?php  } else { ?>
											<div class="form-group">

												<div class="alert alert-success alert-dismissable" style="display: block;">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
													Sudah dikembalikan
												</div>
											</div>
											<?php } ?></td>

											<td><?php
											if ($c['bayar_status'] == null ) {?>
												<div class="form-group">

													<div class="alert alert-danger alert-dismissable" style="display: block;">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
														Belum dibayar
													</div>
												</div>
											<?php  } else { ?>
												<div class="form-group">

													<div class="alert alert-success alert-dismissable" style="display: block;">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
														Sudah dibayar
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
	echo "<script>document.location.href='index.php?view=penyewaan_user&status=success';</script>";
}
?>
	 <script>
    $(document).ready(function() {
        $('#example').DataTable({
                responsive: true
        });
    });
    </script>