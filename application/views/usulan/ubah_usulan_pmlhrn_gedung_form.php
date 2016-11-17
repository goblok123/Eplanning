<div id="add_usulan_sdm" class="formMid">

    <h1>Ubah Usulan Pemeliharaan Pengadaan Gedung</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>
	<?php
		echo form_open('site/ubah_usulan_pmlhrn_gedung/'.$id.'');
	?>

	<h4>Nama Gedung dan Sarana Konstruksi Lainnya: : <?php echo "$nama_gedung"; ?></h4>


	<?php
		echo form_label('Bagian yang Diperbaiki/Dipelihara: ', 'bgn_diperbaiki');
		echo form_textarea('bgn_diperbaiki', set_value('bgn_diperbaiki', "$bgn_diperbaiki"), 'class="input1"');

		echo form_label('Pengadaan Tahun: ', 'pngdn_thn');
		echo form_input('pngdn_thn', set_value('pngdn_thn', "$pngdn_thn"), 'class="input1"');

		echo form_label('Kondisi : ', 'kondisi');
		$options = array(
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, "$kondisi", 'class="dropdownStyle"');
		
		echo form_label('Volume/Jumlah yang Diperbaiki : ', 'jmlh_dprbk');
		echo form_input('jmlh_dprbk', set_value('jmlh_dprbk', "$jmlh_dprbk"), 'class="input1"');

		echo form_label('Jenis Pemeliharaan : ', 'jns_pmlhrn');
		echo form_input('jns_pmlhrn', set_value('jns_pmlhrn', "$jns_pmlhrn"), 'class="input1"');

		echo form_label('Info Kerusakan: ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>