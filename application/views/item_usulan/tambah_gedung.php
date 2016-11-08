<div id="tambah_gedung" class="formMid">
	<?php if (isset($added)){ ?>
		<h3><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Gedung</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_gedung');

		echo form_input('nama_gedung', set_value('nama_gedung', 'Nama Gedung'), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>