<div id="add_unit_form">
	<?php if (isset($unit_created)){ ?>
		<h3><?php echo $unit_created; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Unit</h1>
	<?php } ?>

	<?php
		echo form_open('site/addUnit');
		echo form_input('name_unit', 'Nama Unit');
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
	
</div>