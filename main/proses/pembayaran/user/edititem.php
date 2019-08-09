	<?php include_once 'template/menu/menu_admin.php';
	$data = mysql_fetch_array(mysql_query("SELECT * from bayar where bayar_id = '$_GET[bayar_id]'"));
	// print_r($data);

	function select_data_sewa(){
		$session = $_SESSION['user_id'];
		$data = mysql_fetch_array(mysql_query("SELECT * from bayar where bayar_id = '$_GET[bayar_id]'"));
		$dataSelect = mysql_fetch_array(mysql_query("SELECT * from bayar where bayar_id = '$_GET[bayar_id]'"));


		$q = "SELECT s.sewa_id,ab.ab_nama FROM sewa s 
		join alat_berat ab on ab.ab_id = s.sewa_id_ab
		and s.sewa_id_user = $session 
		and s.sewa_id = $data[bayar_sewa_id]";
		// echo $q;
		// exit();
		
		$sql = mysql_query($q);
		while($res = mysql_fetch_array($sql)){
			if ($dataSelect['sewa_id']==$data['sewa_id']) {
				echo "<option selected value='".$res['sewa_id']."'>".$res['ab_nama']."</option>";
				# code...
			}
		}
	}
	?>
	<div id="page-wrapper">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Pembayaran</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Pembayaran
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post" action="index.php?view=pembayaran_edit_process&bayar_id=<?php echo $data['bayar_id']?>">
									
									<div class="form-group">
										<label>List sewa</label>
										<select class="form-control" name="bayar_sewa_id">
											<option value="">Pilih List sewa</option>
											<?php select_data_sewa();?>

										</select>
										<p class="help-block">List sewa hanya muncul pada transaksi yang pernah anda lakukan.</p>

									</div>
									<div class="form-group">
										<label>Jumlah bayar</label>
										<input class="form-control" name="bayar_jumlah_harga" placeholder="Masukan jumlah harga" required="" value="<?php echo $data['bayar_jumlah_harga']?>">
										<p class="help-block">Masukan jumlah bayar pada field diatas.</p>
									</div>
									<div class="form-group">
										<label>Tanggal bayar</label>
										<input class="form-control" type="date" name="bayar_tanggal" placeholder="Tanggal pembayaran" required="" value="<?php echo $data['bayar_tanggal']?>">
										<!-- <p class="help-block">Masukan jumlah bayar pada field diatas.</p> -->
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea class="form-control" name="bayar_keterangan" placeholder="Masukan keterangan"><?php echo $data['bayar_keterangan']?></textarea>
									</div>


									<button type="submit" class="btn btn-success">Submit Button</button>
									<button type="reset" class="btn btn-danger">Reset Button</button>
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
	</div>