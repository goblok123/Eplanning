<div id="add_usulan_obat" class="formMid">

    <h1>Ubah Usulan Pemeliharaan Alat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_pemeliharaan_alat/'.$id.'/'.$kode_jenis_alat.''); //belum
	?>

	<h4>Jenis BHP : <?php echo "$jenis_alat"; ?></h4>

	<h4>Nama Alat: <?php echo "$nama_alat"; ?></h4>

	<!-- <?php
		echo form_label('Nama Alat : ', 'nama_alat');
		echo form_label("$nama_alat");
	?> -->

	<br>

	<?php
		echo form_label('Merk/Type/Model: ', 'merk');
		echo form_input('merk', set_value('merk', "$merk"), 'class="input1"');

		echo form_label('Pengadaan Tahun:', 'pngdn_thn');
		echo form_input('pngdn_thn', set_value('pngdn_thn', "$pngdn_thn"), 'class="input1"');
		
		echo form_label('Kondisi:');
		$options = array(
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, "$kondisi", 'class="dropdownStyle"');

		echo form_label('Jumlah yang Diperbaiki/Dipelihara : ', 'jmlh_diperbaiki');
		echo form_input('jmlh_diperbaiki', set_value('jmlh_diperbaiki', "$jmlh_diperbaiki"), 'class="input1"');
		
		echo form_label('Jenis Pemeliharaan ', 'jns_pmlhrn');
		echo form_input('jns_pmlhrn', set_value('jns_pmlhrn', "$jns_pmlhrn"), 'class="input1"');

		echo form_label('Info Kerusakan : ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>
</div>