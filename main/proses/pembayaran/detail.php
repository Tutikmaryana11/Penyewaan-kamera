	<?php 
	include_once 'template/menu/menu_admin.php';
	include_once 'view/konversi.php';
	$session = $_SESSION['user_id'];

	$detail_sewa = mysql_fetch_array(mysql_query("SELECT * FROM sewa s 
		join detail_sewa ds on ds.id_sewa = s.sewa_id
		join camera ab on ab.cm_id = ds.id_ab 
		left join bayar b on b.bayar_sewa_id = s.sewa_id
		
		where s.sewa_id = '$_GET[id_sewa]'
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
				<h3 class="page-header"><i class="fa fa-dollar">&nbsp;</i>Pembayaran</h3>

			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detail Tagihan Pembayaran
					</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post" action="index.php?view=pembayaran_add" enctype="multipart/form-data">

									<input type="hidden" name="sewa_id_user" value="<?php echo $session?>">
									<input type="hidden" name="bayar_sewa_id" value="<?php echo $_GET['id_sewa']?>">
									<input type="hidden" name="bayar_tanggal" value="<?php echo $date;?>">
									<input type="hidden" name="bayar_status" value="1">
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
									<?php if ($detail_sewa['bayar_status']==1) {?>
										
									<?php } else { ?>
										<div class="form-group">
											<label>Foto Bukti Pembayaran</label>
											<input class="form-control" type="file" name="foto" required="">
										</div>
										
										<div class="form-group">
											<label>Keterangan Pembayaran</label>
											<textarea style="height:100px" type="text" class="form-control" name="bayar_keterangan" placeholder="Keterangan" required=""></textarea>
										</div>
									<?php }?>
									
									<div class="form-group">
										
										<div class="form-group">
											<span style="color:#5bc0de"><b>*Minimal Qlt/hr adalah 1 Hari dan Qty adalah 1.</b></span>
			<table id="tableAlatBerat" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Alat</th>
						<th>Qlt/hr</th>
						<th>Qty</th>
						<th>Tanggal Kirim</th>
						<th>Harga</th>
						<th>Total</th>
						<!-- <th>Aksi</th> -->
					</tr>
				</thead>
				<?php
				$total = 0;
				$no =1;
				$number =1;
				$qry = mysql_query("SELECT * from sewa s join detail_sewa ds on ds.id_sewa = s.sewa_id join camera ab on ab.cm_id = ds.id_ab where sewa_id = '$_GET[id_sewa]'");

				while ($list = mysql_fetch_array($qry)) 
					// print_r($list);

					{ ?>
						<tbody>
							<input type="hidden" name="sewa_[<?php echo $number;?>][detail_id_ab]" value="<?php echo $list['ab_id']?>">
							<tr class="even barang_tr barang_tr_new">
								<td style="width: 2%" align="center"><?php echo $no++?></td>
								<td align="center">
									<input type="hidden" style="width: 22em" class="service ui-autocomplete-input" readonly value="<?php echo $list['ab_keterangan']."[".$list['ab_operator']."]"?>">
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
									<input style="width: 10em;color:black;" type="hidden" class="service" name="sewa_[<?php echo $number;?>][detail_total]" readonly="" id="total_html_1" value="<?php echo rupiah($list['jumlah_jam']*$list['qty']*$list['harga']);?>">
									<?php echo rupiah($list['jumlah_jam']*$list['qty']*$list['harga']);?>
								</td>
								
							</tr>
						</tbody>
						<?php 
						$number++;
						$total += $list['jumlah_jam']*$list['qty']*$list['harga'];
					} 
					// $ppn = $total *0.1;
					$nilaitotal = $total;
					?>
					<tfoot>
						<tr>
							<td colspan="6" align="right"><b>Total</b></td>
							<td ><span id="Total" style="width: 7em;"><?php echo rupiah($total);?></span></td>
							<!-- <td></td> -->
						</tr>
						
						<tr>
							<td colspan="6" align="right"><b>Total Tagihan</b></td>
							<td style="width: 7em;"><span id="total_tagihan"><?php echo rupiah($nilaitotal);?></span></td>
							<!-- <td></td> -->
						</tr>
						<?php if ($detail_sewa['bayar_status']==1) {?>
							<tr>
								
								<td colspan="6" align="right"><i><b>Terbilang:#<?php echo terbilang($nilaitotal,3)?> Rupiah#</b></i></td>
								<td style="width: 7em;"> <span id="SCETAK"><input type="button" class="btn btn-info" value="Cetak" onClick="cetak()"/></td>
									<!-- <td></td> -->
								</tr>
							<?php } else { ?>
								<tr>
									<input type="hidden" name="bayar_jumlah_harga" value="<?php echo $nilaitotal;?>">
									<td colspan="6" align="right">*Tekan submit untuk proses pembayaran.</td>
									<td><input type="submit" class="btn btn-info" name="pembayaran" onclick="return confirm('Apakah anda yakin transaksi sudah benar?')"></input></td>
									<!-- <td></td> -->
								</tr>
							<?php } ?>

						</tfoot>

					</table>

												</div>
												<!-- /.panel-body -->
											</div>

<!-- 
										<button type="submit" class="btn btn-success">Submit Button</button>
										<button type="reset" class="btn btn-danger">Reset Button</button> -->
									</form>
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
	


