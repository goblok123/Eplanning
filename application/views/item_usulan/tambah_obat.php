<div id="tambah_obat">
	<?php if (isset($obat_added)){ ?>
		<h3><?php echo $obat_added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Obat</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_obat');
		echo form_input('nama_obat', set_value('nama_obat', 'Nama Obat'), 'class="input1"');
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>