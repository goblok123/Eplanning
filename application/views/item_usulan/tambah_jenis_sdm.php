<div id="tambah_jenis_sdm">
	<?php if (isset($sdm_added)){ ?>
		<h3><?php echo $sdm_added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Jenis SDM</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_jenis_sdm');
		echo form_input('jenis_sdm', set_value('jenis_sdm', 'Jenis SDM'), 'class="input1"');
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>