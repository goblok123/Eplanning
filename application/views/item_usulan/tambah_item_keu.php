<div id="tambah_item_keu" class="formMid">
	<?php if (isset($added)){ ?>
		<h3><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Alat</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_keu');
	
		$options = array(
			"Komponen Pendapatan Rumah Sakit"         => "Komponen Pendapatan Rumah Sakit",
	        "Urain Belanja Gaji dan Tunjangan PNS"         => "Urain Belanja Gaji dan Tunjangan PNS",
	        "Kualifikasi Tenaga Kontrak"         => "Kualifikasi Tenaga Kontrak",
		);
		echo form_dropdown('jenis_item_keu', $options, 'Komponen Pendapatan Rumah Sakit', 'class="dropdownStyle"');

		echo form_input('nama_item_keu', set_value('nama_item_keu', 'Nama Item Keuangan'), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>