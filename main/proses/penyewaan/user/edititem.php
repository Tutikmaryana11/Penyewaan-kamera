	<?php include_once 'template/menu/menu_admin.php';
	$data = mysql_fetch_array(mysql_query("SELECT * from kategori where kategori_id = '$_GET[kategori_id]'"));
	?>
	<div id="page-wrapper">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Kategori</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Edit Kategori
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post" action="index.php?view=kategori_edit_process&kategori_id=<?php echo $data['kategori_id']?>">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" value="<?php echo $data['kategori_nama'];?>" name="kategori_nama" placeholder="Nama Kategori">
										<p class="help-block">Masukan nama kategori pada field diatas.</p>
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