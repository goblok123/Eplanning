<div id="tambah_bhp" class="formMid">
	<?php if (isset($added)){ ?>
		<h3><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah BHP</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_bhp');
	?>

	<select name="kode_bhp" id="kode_bhp" class="dropdownStyle">
	  <?php
	    foreach($all_jenis_bhp  as $r) { ?>
	      <option value="<?= $r->id_kode ?>"><?= $r->nama_jenis_bhp ?></option>
	  <?php
	    } ?>
	</select> 

	<?php
		echo form_input('nama_bhp', set_value('nama_bhp', 'Nama BHP'));
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>