	<?php 
	include_once 'template/menu/menu_user.php';
	include_once 'view/konversi.php';
	$session = $_SESSION['user_id'];

	$detail_sewa = mysql_fetch_array(mysql_query("SELECT * FROM sewa s 
		join detail_sewa ds on ds.id_sewa = s.sewa_id
		join camera ab on ab.cm_id = ds.id_ab where s.sewa_id = '$_GET[id_sewa]'
		"));
	// echo "<pre>";
	// print_r($detail_sewa);
	// echo "</pre>";


	$date = date('Y-m-d');
	function rupiah($jml) {
		$int = number_format($jml, 2, ',','.');
		return $int;
	}
	// echo "<pre>";
	// print_r($detail_sewa);
	// echo "</pre>";

	?>
	<script language='JavaScript'>
		function cetak() {
			SCETAK.innerHTML = '';
			window.print();
			SCETAK.innerHTML = '<br /><input onClick=\'cetak()\' type=\'submit\' name=\'Submit\' value=\'Cetak\' class=\'tombol\'>';
		}

	</script>
	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-12" align="left">
				<!-- <img src="../assets/dist/images/header.jpg" class="images" width="950px"> -->
				<h3 class="page-header"><i class="fa fa-info">&nbsp;</i>Detail Pengembalian</h3>

			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detail Pengembalian
					</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-lg-6">
								

								<input type="hidden" name="sewa_id_user" value="<?php echo $session?>">
								<input type="hidden" name="bayar_tanggal" value="<?php echo $date;?>">
								<div class="form-group">
									<label>No Invoice</label>
									<!-- <input type="text" class="form-control" name="no_invoice" placeholder="No Invoice" value="<?php echo $detail_sewa['sewa_invoice'];?>" readonly=""> -->
									<p><b><?php echo $detail_sewa['sewa_invoice'];?></b></p>
								</div>
								<div class="form-group">
									<label>Nama Customer</label>
									<!-- <input type="text" value="<?php echo $detail_sewa['sewa_customer'];?>" class="form-control" name="sewa_customer" placeholder="Nama Customer" readonly> -->
									<p><?php echo $detail_sewa['sewa_customer'];?></p>
								</div>
								<div class="form-group">
									<label>Alamat Customer</label>
									<!-- <textarea style="height:100px" type="text" class="form-control" name="sewa_alamat" placeholder="Alamat Customer" required="" readonly><?php echo $detail_sewa['sewa_alamat'];?></textarea> -->
									<p><?php echo $detail_sewa['sewa_alamat'];?></p>
								</div>

								<div class="form-group">

									<div class="form-group">
										<span style="color:#5bc0de"><b>*Minimal Qlt/hr adalah 1 Hari dan Qty adalah 1.</b></span>
										<table id="tableAlatBerat" class="table table-striped table-bordered table-hover" id="example">
											<thead>
												<tr>
													<th>No</th>
													<th>Alat</th>
													<th>Qlt/hr</th>
													<th>Qty</th>
													<th>Tanggal Kirim</th>
													<th>Harga</th>
													<th>Total</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<?php
											$total = 0;
											$no =1;
											$number =1;
											$qry = mysql_query("SELECT * from sewa s 
												join detail_sewa ds on ds.id_sewa = s.sewa_id 
												left join bayar b on b.bayar_sewa_id = s.sewa_id
												join camera ab on ab.cm_id = ds.id_ab 
												where sewa_id = '$_GET[id_sewa]'");

											while ($list = mysql_fetch_array($qry)) 
													// echo "<pre>";
													// print_r($list);
													// echo "</pre>";


												{ ?>
													<form role="form" method="post" action="index.php?view=pengembalian_add_user" enctype="multipart/form-data">
														<input type="hidden" name="bayar_sewa_id" value="<?php echo $_GET['id_sewa']?>">


														<tbody>
															<input type="hidden" name="sewa_[<?php echo $number;?>][detail_id_ab]" value="<?php echo $list['cm_id']?>">
															<tr class="even barang_tr barang_tr_new">
																<td style="width: 2%" align="center"><?php echo $no++?></td>
																<td align="center">
																	<input type="hidden" style="width: 22em" class="service ui-autocomplete-input" readonly value="<?php echo $list['cm_nama']?>">
																	<p><?php echo $list['cm_nama']?></p>
																</td>
																<td style="width: 10%" align="center">
																	<input style="width: 3em" readonly type="hidden" name="sewa_[<?php echo $number?>][detail_jml_jam]" value="<?php echo $list['jumlah_jam']?>">
																	<p><?php echo $list['jumlah_jam']?></p>
																</td>
																<td style="width: 10%" align="center">
																	<input style="width: 3em" value="<?php echo $list['qty']?>" onkeyup="Angka2(this, 1)"  readonly type="hidden" name="sewa_[<?php echo $number;?>][detail_qty]" id="detail_qty1">
																	<?php echo $list['qty']?>
																</td>
																<td style="width: 10%" align="center">
																	<input style="width: 10em"  readonly type="hidden" name="sewa_[<?php echo $number;?>][detail_tgl_kirim]" required="" id="detail_tgl_kirim1" value="<?php echo $list['tanggal_kirim']?>">
																	<?php echo $list['tanggal_kirim']?>
																</td>
																<td style="width: 10%" align="center">
																	<input style="width: 7em" type="hidden" class="service" name="sewa_[<?php echo $number;?>][detail_harga]" readonly="" id="detail_harga_1" value="<?php echo rupiah($list['harga']);?>">
																	<?php echo rupiah($list['harga']);?>
																</td>
																<td style="width: 10%;" align="center">
																	<input style="width: 10em;color:black;" type="hidden" class="service" name="sewa_[<?php echo $number;?>][detail_total]" readonly="" id="total_html_1" value="<?php echo rupiah($list['total']);?>">
																	<?php echo rupiah($list['jumlah_jam']*$list['qty']*$list['harga']);?>
																</td>
																<td>

																	<?php if ($list['bayar_status']==null) {?>
																		<span  class="btn btn-danger">Belum dibayar</span>
																	<?php } else { ?>

																	<?php if ($list['status_peminjaman']==0) { ?>
																	<button name="pembayaran" type="submit" class="btn btn-info" onclick="return confirm('Apakah anda yakin transaksi sudah benar?')">Kembalikan</button>	
																	<?php } else { ?>
																		<span  class="btn btn-success">Sudah dikembalikan</span>
																	<?php } ?>
																	<?php } ?>
																	

																	
																</td>
																
															</tr>
														</tbody>
													</form>

													<?php 
													$number++;
													$total += $list['jumlah_jam']*$list['qty']*$list['harga'];
												} 
												// $ppn = $total *0.1;
												$nilaitotal = $total;
												?>


											</table>

										</div>
										<!-- /.panel-body -->
									</div>

<!-- 
										<button type="submit" class="btn btn-success">Submit Button</button>
										<button type="reset" class="btn btn-danger">Reset Button</button> -->
									</div>


									<!-- /.col-lg-6 (nested) -->
								</div>
								<!-- /.row (nested) -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- <img src="../assets/dist/images/footer.jpg" class="images" width="950px"> -->

			</div>

			<?php include_once 'template/footer.php';?>

