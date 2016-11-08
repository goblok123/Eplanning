<div id="tambah_alat" class="formMid">
	<?php if (isset($added)){ ?>
		<h3><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Alat</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_alat');
	
		$options = array(
			"Alat Kesehatan"         => "Alat Kesehatan",
	        "Alat Non Kesehatan"         => "Alat Non Kesehatan",
		);
		echo form_dropdown('alat', $options, 'Alat Kesehatan', 'class="dropdownStyle"');

		echo form_input('nama_alat', set_value('nama_alat', 'Nama Alat'), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>