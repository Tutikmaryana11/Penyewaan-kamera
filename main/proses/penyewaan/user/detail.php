	<?php include_once 'template/menu/menu_user.php';
	$detail_sewa = mysql_fetch_array(mysql_query("SELECT * FROM sewa s 
		join detail_sewa ds on ds.id_sewa = s.sewa_id
		join camera ab on ab.cm_id = ds.id_ab where s.sewa_id = '$_GET[id_sewa]'
		"));
	function rupiah($jml) {
		$int = number_format($jml, 2, ',','.');
		return $int;
	}
	function currencyToNumber($a){
		$b=str_ireplace(".", "", $a);
		return str_replace(",",".",$b);
	}

	// echo "<pre>";
	// print_r($detail_sewa);
	// echo "</pre>";

	?>
	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Penyewaan</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detail Penyewaan
					</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-lg-6">
								<form role="form" method="post" action="index.php?view=penyewaan_edit_process" onsubmit="cekForm()">

									<input type="hidden" name="sewa_id_user" value="<?php echo $detail_sewa['sewa_id_user']?>">
									<input type="hidden" name="sewa_id" value="<?php echo $detail_sewa['sewa_id']?>">
									<div class="form-group">
										<label>No Invoice</label>
										<!-- <input type="text" class="form-control" name="no_invoice" placeholder="No Invoice" value="<?php echo $detail_sewa['sewa_invoice'];?>" readonly> -->
										<p><?php echo $detail_sewa['sewa_invoice'];?></p>
									</div>
									<div class="form-group">
										<label>Nama Customer</label>
										<input type="text" value="<?php echo $detail_sewa['sewa_customer'];?>" class="form-control" name="sewa_customer" placeholder="Nama Customer" 
										
									</div>
									<div class="form-group">
										<label>Alamat Customer</label>
										 <textarea style="height:100px" type="text" class="form-control" name="sewa_alamat" placeholder="Alamat Customer" required="" ><?php echo $detail_sewa['sewa_alamat'];?></textarea>
										<!-- <p><?php echo $detail_sewa['sewa_alamat'];?></p> -->
									</div>
									<div class="form-group">
										<label>Detail Pemesanan</label>
										<?php if ($_GET['edit']=='false') {?>

										<?php } else { ?>
											<!-- <th>Aksi</th> -->
											<input type="button" class="btn btn-info" value="Tambah Baris" id="tambahBaris" />
											<hr>
										<?php } ?>
										
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
						<?php if ($_GET['edit']=='false') {?>
							
						<?php } else { ?>
							<th>Aksi</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>

					<?php
					$total = 0;
					$no =1;
					$number=1;
					$qry = mysql_query("SELECT * from sewa s join detail_sewa ds on ds.id_sewa = s.sewa_id join camera ab on ab.cm_id = ds.id_ab where sewa_id = '$_GET[id_sewa]'");

					# code...
				// }
					while ($list = mysql_fetch_array($qry)) {
						if ($_GET['edit']=='true') { 
							?>
							<tr class="<?php echo ($number % 2!=0) ? 'even' : 'odd'?> barang_tr barang_tr_new">
								<td style="width: 2%" align="center"><?php echo $no++?></td>

								<td align='center'><input readonly="" type='text' style='width: 18em' class='service' id='namaAlat_<?php echo $number?>' value="<?php echo $list['cm_nama'];?>"></td>

								<td style='width: 10%' align='center'><input readonly="" style='width: 3em'  type='text' id='detail_jml_jam<?php echo $number?>' value="<?php echo $list['jumlah_jam']?>"></td>

								<td style='width: 10%' align='center'><input readonly="" style='width: 3em'  type='text'    id='detail_qty<?php echo $number?>' value="<?php echo $list['qty']?>"></td>

								<td style='width: 10%' align='center'><input readonly="" style='width: 10em'  type='date' id='detail_tgl_kirim<?php echo $number?>' value="<?php echo $list['tanggal_kirim']?>"></td>

								<td style='width: 10%' align='center'><input readonly="" style='width: 7em' type='text' class='service' id='detail_harga_<?php echo $number?>' value="<?php echo currencyToNumber($list['harga']);?>">
							 
								</td>

								<td style='width: 10%;' align='center'><input readonly="" style='width: 10em;color:black;' type='text' class='service' readonly="" id='total_html_<?php echo $number?>' value="<?php echo rupiah($list['jumlah_jam']*$list['qty']*$list['harga']);?>"></td>

								<td style='width: 10%' align='center'>

								</td>

							</tr>
						<?php } else { ?>
							<!-- <tbody> -->
								<tr class="<?php echo ($number % 2!=0) ? 'even' : 'odd';?> barang_tr barang_tr_new">
									<td style="width: 2%" align="center"><?php echo $no++?></td>
									<td align="center">
										<input readonly="" type="text" style="width: 22em" class="service ui-autocomplete-input"  value="<?php echo $list['cm_nama']?>">
									</td>
									<td style="width: 10%" align="center">
										<input readonly="" style="width: 3em"  type="text" name="sewa_[<?php echo $number?>][detail_jml_jam]" value="<?php echo $list['jumlah_jam']?>">
									</td>
									<td style="width: 10%" align="center">
										<input readonly="" style="width: 3em" value="<?php echo $list['qty']?>" onkeyup="Angka2(this, 1)"  readonly="" type="text" name="sewa_[<?php echo $number?>][detail_qty]" id="detail_qty1">
									</td>
									<td style="width: 10%" align="center">
										<input readonly="" style="width: 10em"   type="date" name="sewa_[<?php echo $number?>][detail_tgl_kirim]" required="" id="detail_tgl_kirim1" value="<?php echo $list['tanggal_kirim']?>">
									</td>

									<td style="width: 10%" align="center">
										<input style="width: 7em" type="text" class="service" name="sewa_[<?php echo $number?>][detail_harga]" readonly="" id="detail_harga_1" value="<?php echo rupiah($list['harga']);?>">
									</td>
									<td style="width: 10%;" align="center">
										<input style="width: 10em;color:black;" type="text" class="service" name="sewa_[<?php echo $number?>][detail_total]" readonly="" id="total_html_1" value="<?php echo rupiah($list['jumlah_jam']*$list['qty']*$list['harga']);?>">
									</td>
								</tr>
								<!-- </tbody> -->
								<!-- <td style='width: 2%' align=center align='center'><?php echo $number?></td> -->
							<?php } ?>

							<?php 
							$number++;
							$total += $list['jumlah_jam']*$list['qty']*$list['harga'];
						} 

						// $ppn = $total *0.1;
						$nilaitotal = $total;
						?>
					</tbody>

					<tfoot>
						<tr>
							<td colspan="6" align="right"><b>Total</b></td>
							<td><span id="Total"><?php echo rupiah($total);?></span></td>
							<?php if ($_GET['edit']=='false') {?>

							<?php } else { ?>
								<td></td>
							<?php } ?>
						</tr>
			
						<tr>
							<td colspan="6" align="right"><b>Total Tagihan</b></td>
							<td><span id="total_tagihan"><?php echo rupiah($nilaitotal);?></span></td>
							<?php if ($_GET['edit']=='false') {?>

							<?php } else { ?>
								<td></td>
							<?php } ?>
						</tr>
					</tfoot>

				</table>

											</div>
											<!-- /.panel-body -->
										</div>

										<?php if ($_GET['edit']=='false') {?>

										<?php } else { ?>

											<button type="submit" class="btn btn-success">Submit Button</button>
											<button type="reset" class="btn btn-danger">Reset Button</button>
										<?php } ?>
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

		<?php include_once 'template/footer.php';?>

		<script type="text/javascript">
			$(document).ready(function() { 

				$("#tambahBaris").click(function(){
					var counter=$('.barang_tr').length+1;
					console.log(counter);
					var nomor = $(".barang_tr_new").length+1;
					string = "<tr class='"+((counter % 2!=0) ? 'even' : 'odd') +" barang_tr barang_tr_new'>"
					+"<td style='width: 2%' align=center align='center'>"+nomor+"</td>"

					+"<td  align='center'><input type='text' style='width: 18em' class='service' name='sewa_["+counter+"][detail_alat]' id='namaAlat_"+counter+"'></td>"


					+"<td style='width: 10%' align='center'><input style='width: 3em' onKeyup='Angka2(this, "+counter+")' type='text' name='sewa_["+counter+"][detail_jml_jam]' onBlur='hitungTotal("+counter+")' id='detail_jml_jam"+counter+"'></td>"

					+"<td style='width: 10%' align='center'><input style='width: 3em' onKeyup='Angka2(this, "+counter+")' type='text' name='sewa_["+counter+"][detail_qty]' onBlur='hitungTotal("+counter+")' id='detail_qty"+counter+"'></td>"

					+"<td style='width: 10%' align='center'><input style='width: 10em'  type='date' name='sewa_["+counter+"][detail_tgl_kirim]' required id='detail_tgl_kirim"+counter+"'></td>"

					+"<td style='width: 10%' align='center'><input style='width: 7em' type='text' class='service' name='sewa_["+counter+"][detail_harga]' readonly id='detail_harga_"+counter+"'></td>"

					+"<td style='width: 10%;' align='center'><input style='width: 10em;color:black;' type='text' class='service' name='sewa_["+counter+"][detail_total]' readonly id='total_html_"+counter+"'></td>"

					+"<td style='width: 10%' align='center'><button type='button' onClick='deleteElement("+counter+",this)' class='btn btn-danger btn-sm'>Hapus</button><input type='hidden' style='display:none;' name='sewa_["+counter+"][cm_id]' id='idAlat_"+counter+"'><input type='hidden' style='display:none;' name='sewa_["+counter+"][TotalCurrenctyToNumber]' id='TotalCurrenctyToNumber"+counter+"'>";

					+"</td>";

					+"</tr>";
					$("#tableAlatBerat > tbody").append(string);
        // initAutocomplete(counter);

        $( "#namaAlat_"+counter ).autocomplete({
        	source: "view/search.php",  
        	minLength:1,
        	scroll: true,

        	select: function(event,ui){
        		var minValue = 1;
        		event.preventDefault();
        		$('#namaAlat_'+counter).val(ui.item.value);
        		$('#idAlat_'+counter).val(ui.item.id);
        		$('#detail_harga_'+counter).val(ui.item.cm_harga);
        		$('#detail_qty'+counter).val(minValue);
        	} 

        });
    });

			})

			function deleteElement(count,el) {
				var parent = el.parentNode.parentNode;
				parent.parentNode.removeChild(parent);
				var penerimaan=$('.icd_tr');
				var countPenerimaanTr=penerimaan.length;
				for(var i=0;i<countPenerimaanTr;i++){
					$('.icd_tr:eq('+i+')').children('td:eq(0)').html(i+1);
					$('.icd_tr:eq('+i+')').removeClass('even');
					$('.icd_tr:eq('+i+')').removeClass('odd');
					$('.icd_tr:eq('+i+')').addClass(((i+1) % 2 != 0)?'even':'odd');

					$('.icd_tr:eq('+i+')').children('td:eq(1)').children('.auto').attr('id','namaAlat'+(i+1));
				}
				hitungTotal(count);

			}

			function hitungTotal(no){
				tot = 0;
				var totalTemp = 0;
				var frek = 0;
				var qty = 0;
				var iur = 0;
				$('.barang_tr').each(function(index,item){
           frek = $(this).children('td:nth-child(3)').children('input:nth-child(1)').val(); //ambil frekuensi
           qty = $(this).children('td:nth-child(4)').children('input:nth-child(1)').val(); //ambil frekuensi
           if(frek!=0 && frek!='' && frek>= 1){
           	iur = $(this).children('td:nth-child(6)').children('input').val();
           	console.log(frek);
           	console.log(iur);
           	totalTemp += (currencyToNumber(iur)*parseInt(frek) * parseInt(qty));

           	// TotalPPN = totalTemp*0.1;

           	total_tagihan = totalTemp;
           } else {
           	alert('Isi nilai Qlt/hr dengan benar, minimal 1.');
           	$('#detail_jml_jam'+no).focus();

           }
           if (qty < 1) {
           	alert('Isi nilai Qty dengan benar, minimal 1.');
           	$('#detail_qty'+no).focus();
           }
       });
				$('#Total').html('Rp. '+numberToCurrency(totalTemp)+',00');
				$('#TotalCurrenctyToNumber'+no).val(currencyToNumber(totalTemp));

				// $('#TotalPPN').html('Rp. '+numberToCurrency(TotalPPN)+',00');
				// $('TotalPPN').val(TotalPPN);

				$('#total_tagihan').html('Rp. '+numberToCurrency(total_tagihan)+',00');
				$('.total_tagihan').val(total_tagihan);
			}

			function Angka2(obj, counter) {
				a = obj.value;
				b = a.replace(/[^\d]/g,'');
				c = '';
				lengthchar = b.length;
				j = 0;
				for (i = lengthchar; i > 0; i--) {
					j = j + 1;
					if (((j % 3) == 1) && (j != 1)) {
						c = b.substr(i-1,1) + '' + c;
					} else {
						c = b.substr(i-1,1) + c;
					}
				}
				obj.value = c;
				if(c != "") {
					var harga = $("#detail_jml_jam" + counter).val();
					var frek = $("#detail_harga_" + counter).val();
					var qty = $("#detail_qty" + counter).val();

					console.log('testharga',harga)

					var total = parseInt(harga) * parseInt(currencyToNumber(frek))*parseInt(qty);
					// var TotalPPN = total * 0.1;
					console.log('total',total)
					$("#total_html_" + counter).val(numberToCurrency(total));
// $("#TotalPPN" + counter).val(numberToCurrency(TotalPPN));
$("#TotalTagihan" + counter).val(currencyToNumber(total));
}
}

function numberToCurrency(a){
	if(a!=''&&a!=null){
		a=a.toString();
		var b = a.replace(/[^\d\,]/g,'');
		var dump = b.split(',');
		var c = '';
		var lengthchar = dump[0].length;
		var j = 0;
		for (var i = lengthchar; i > 0; i--) {
			j = j + 1;
			if (((j % 3) == 1) && (j != 1)) {
				c = dump[0].substr(i-1,1) + '.' + c;
			} else {
				c = dump[0].substr(i-1,1) + c;
			}
		}

		if(dump.length>1){
			if(dump[1].length>0){
				c += ','+dump[1];
			}else{
				c += ',';
			}
		}
		return c;}
		else{
			return '';
		}
	}

	function currencyToNumber(a){
		if(a!=null||a!=''){
			var b=a.toString();
			var pecah_koma = b.split(',');
			pecah_koma[0]=pecah_koma[0].replace(/\.+/g, '');
			c=pecah_koma.join('.');
			return parseFloat(c);
		}else{
			return '';
		}
	}


</script>

