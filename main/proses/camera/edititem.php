	<?php include_once 'template/menu/menu_admin.php';

	$data = mysql_fetch_array(mysql_query("SELECT * from camera where cm_id = '$_GET[cm_id]'"));

	function kategori(){
		$q = "SELECT * FROM `kategori` ORDER BY 'kategori_id' ASC";
		$sql = mysql_query($q);
		$data = mysql_fetch_array(mysql_query("SELECT * from camera ab join kategori k on k.kategori_id = ab.cm_kategori_id where ab.cm_id = '$_GET[cm_id]'"));


		while($res = mysql_fetch_array($sql)){
				if ($data['cm_kategori_id']==$res['kategori_id']) {
					# code...
					echo "<option selected value='".$res[0]."'>".$res[1]."</option>";
				} else {
					echo "<option value='".$res[0]."'>".$res[1]."</option>";

				}
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
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post" action="index.php?view=camera_edit_process&cm_id=<?php echo $data['cm_id']?>">
									<input type="hidden" name="cm_id" value="<?php echo $data['cm_id']?>">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" name="ab_nama" value="<?php echo $data['cm_nama']?>" placeholder="Nama camera" required="">
									</div>
									
									<div class="form-group">
										<label>Jumlah Unit</label>
										<input class="form-control" type="number" value="<?php echo $data['cm_jumlah_ketersediaan']?>" name="ab_jumlah" placeholder="Harga camera" required="">
									</div>
									<div class="form-group">
										<label>Harga</label>
										<input class="form-control" value="<?php echo $data['cm_harga']?>" type="number" name="ab_harga" placeholder="Harga camera" required="">
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea class="form-control" type="text" name="ab_keterangan" placeholder="keterangan camera" required=""><?php echo $data['cm_keterangan']?></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="ab_status">
											<?php if ($data['cm_status']==1) {?>
												<option selected="" value="1">Tersedia</option>
												<option value="0">Tidak Tersedia</option>
											<?php } else { ?>
												<option value="1">Tersedia</option>
												<option selected="" value="0">Tidak Tersedia</option>
											<?php } ?>
											
										</select>
									</div>
									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control" id="kategori" name="ab_kategori_id">
											<option value="">Pilih Kategori</option>
											<?php kategori();?>

										</select>
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