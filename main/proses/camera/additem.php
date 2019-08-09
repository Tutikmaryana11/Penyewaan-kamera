	<?php include_once 'template/menu/menu_admin.php';

	function kategori(){
		$q = "SELECT * FROM `kategori` ORDER BY 'kategori_id' ASC";
		$sql = mysql_query($q);
		while($res = mysql_fetch_array($sql)){
			echo "<option value='".$res[0]."'>".$res[1]."</option>";
		}
	}

	?>
	<div id="page-wrapper">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Camera</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Camera
						<p><b>*Field Keterangan akan dimasukan ke dalam list keterangan penyewaan Camera.</b></p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form role="form" action="index.php?view=camera_add" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Nama Alat</label>
										<input class="form-control" name="ab_nama" placeholder="Nama camera" required="">
									</div>
									<div class="form-group">
										<label>Jumlah Unit</label>
										<input class="form-control" type="number" name="ab_jumlah" placeholder="Harga camera" required="">
									</div>
									<div class="form-group">
										<label>Harga</label>
										<input class="form-control" type="number" name="ab_harga" placeholder="Harga camera" required="">
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input class="form-control" type="text" name="ab_keterangan" placeholder="keterangan camera" required="">
									</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="ab_status">
											<option value="1">Tersedia</option>
											<option value="0">Tidak Tersedia</option>
										</select>
									</div>
									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control" id="kategori" name="ab_kategori_id">
											<option value="">Pilih Kategori</option>
											<?php kategori();?>

										</select>
									</div>
									<div class="form-group">
										<label>Foto Camera</label>
										<input class="form-control" type="file" name="foto" required="">
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