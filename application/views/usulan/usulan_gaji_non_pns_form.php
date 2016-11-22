<?php
	$phpArray = array();
	foreach($non_pns  as $r)
	{
	    $phpArray[] = $r->nama_item_keu;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_item_keu = <?php echo json_encode($phpArray ); ?>;
		$("#nama_item_keu").select2({
		  data: nama_item_keu
		});
	});
</script>

<div id="add_usulan_gaji_non_pns" class="formMid">

    <h1>Tambah Usulan Gajin Kontrak/Pegawai Tidak Tetap</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_gaji_non_pns');
		echo form_label('Kualifikasi Tenaga Kontrak/Pegawai Tidak Tetap: ', 'nama_item_keu');
	?>

	<div>
		<select name="nama_item_keu" id="nama_item_keu" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Jumlah Pegawai: ', 'jmlh_pgwi');
		echo form_input('jmlh_pgwi', set_value('jmlh_pgwi', ''), 'class="input1"');

		echo form_label('Jumlah Bulan: ', 'jmlh_bln');
		echo form_input('jmlh_bln', set_value('jmlh_bln', ''), 'class="input1"');
		
		echo form_label('Jumlah Gaji Per Bulan : ', 'jmlh_gaji_perbulan');
		echo form_input('jmlh_gaji_perbulan', set_value('jmlh_gaji_perbulan', ''), 'class="input1"');

		echo form_label('Jumlah Gaji Per Tahun(n+1) : ', 'jmlh_gaji_pertahun_n1');
		echo form_input('jmlh_gaji_pertahun_n1', set_value('jmlh_gaji_pertahun_n1', ''), 'class="input1"');

		echo form_label('Jumlah Gaji Per Tahun(n) : ', 'jmlh_gaji_pertahun_n');
		echo form_input('jmlh_gaji_pertahun_n', set_value('jmlh_gaji_pertahun_n', ''), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Gajin Kontrak/Pegawai Tidak Tetap</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Kualifikasi Tenaga Kontrak/Pegawai Tidak Tetap</th>
			<th>Jumlah Pegawai</th>
			<th>Jumlah Bulan</th>
			<th>Jumlah Gaji Per Bulan</th>
			<th>Jumlah Gaji Per Tahun(n+1)</th>
			<th>Jumlah Gaji Per Tahun(n)</th>
			<th>Informasi/Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($usulan_gj_non as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php
						foreach($non_pns as $t)
						{
						    if($t->id_item == $r->id_item){
						    	echo "$t->nama_item_keu";
						    	break;
						    }
						}
					?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_pgwi; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_bln; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_gaji_perbulan; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_gaji_pertahun_n1; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_gaji_pertahun_n; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->info; ?>
		  		</th>
		  		
		  		<th>
		  			<a href="<?php echo base_url('/site/ubah_usulan_gaji_non_pns_form/'.$r->id_dtl_usln_gaji_non_pns.'/-'); ?>" class="btn btn-success">Perbaharui</a>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/hapus_usulan_gaji_non_pns/'.$r->id_dtl_usln_gaji_non_pns.''); ?>" class="btn btn-danger">Hapus</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>