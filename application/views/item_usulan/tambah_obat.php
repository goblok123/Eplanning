<div id="tambah_obat">
	<?php if (isset($obat_added)){ ?>
		<h3><?php echo $obat_added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Obat</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_obat');
		echo form_input('name_obat', set_value('name_obat', 'Nama Obat'));
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>