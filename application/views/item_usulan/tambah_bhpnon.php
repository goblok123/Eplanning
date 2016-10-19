<div id="tambah_bhpnon" class="formMid">
	<?php if (isset($added)){ ?>
		<h3><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah BPH Non Farmasi</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_bhpnon');
		echo form_input('bhpnon', set_value('bhpnon', 'Nama BPH non Farmasi'));
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>