<?php
	$phpArray = array();
	foreach($semua_alat  as $r)
	{
	    $phpArray[] = $r->nama_alat_kes_dan_non;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_alat = <?php echo json_encode($phpArray ); ?>;
		$("#nama_alat").select2({
		  data: nama_alat
		});
	});
</script>

<div id="add_usulan_obat" class="formMid">

    <h1>Tambah Usulan Pemeliharaan Alat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_pemeliharaan_alat/'.$no_jenis.'');
	?>

	<h4>Jenis BHP : <?php echo "$jenis_alat"; ?></h4>

	<?php
		echo form_label('Nama Alat :', 'nama_alat');
	?>

	<div>
		<select name="nama_alat" id="nama_alat" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Merk/Type/Model: ', 'merk');
		echo form_input('merk', set_value('merk', ''), 'class="input1"');

		echo form_label('Pengadaan Tahun:', 'pngdn_thn');
		echo form_input('pngdn_thn', set_value('pngdn_thn', ''), 'class="input1"');
		
		echo form_label('Kondisi:');
		$options = array(
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, 'kondisi', 'class="dropdownStyle"');

		echo form_label('Jumlah yang Diperbaiki/Dipelihara : ', 'jmlh_diperbaiki');
		echo form_input('jmlh_diperbaiki', set_value('jmlh_diperbaiki', ''), 'class="input1"');
		
		echo form_label('Jenis Pemeliharaan ', 'jns_pmlhrn');
		echo form_input('jns_pmlhrn', set_value('jns_pmlhrn', ''), 'class="input1"');

		echo form_label('Info Kerusakan : ', 'info');
		echo form_textarea('info', set_value('info', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Pemeliharaan</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Jenis Alat</th>
			<th>Nama Alat</th>
			<th>Merk/Type/Model/Ukuran</th>
			<th>Pengadaan Tahun</th>
			<th>Kondisi</th>
			<th>Jumlah yang Diperbaiki/ Dipelihara</th>
			<th>Jenis Pemeliharaan</th>
			<th>Info Kerusakan</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($usulan_pemeliharaan  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
					<?php echo $jenis_alat; ?>
				</th>
				<th>
		  			<?php
						foreach($semua_alat as $t)
						{
						    if($t->id_alat == $r->id_alat){
						    	echo "$t->nama_alat_kes_dan_non";
						    	break;
						    }
						}
					?>
		  		</th>
		  		<th>
		  			<?php echo $r->merk; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->pngdn_thn; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->kondisi; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_diperbaiki; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jns_pmlhrn; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->info; ?>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/ubah_usulan_pemeliharaan_alat_form/'.$r->id_dtl_pmlhrn_alat.''); ?>" class="btn btn-success">Perbaharui</a>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/hapus_usulan_pemeliharaan_alat/'.$r->id_dtl_pmlhrn_alat.''); ?>" class="btn btn-danger">Hapus</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>