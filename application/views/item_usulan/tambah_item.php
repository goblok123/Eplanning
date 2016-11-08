<div id="tambah_obat">
	<?php if (isset($obat_added)){ ?>
		<h3><?php echo $obat_added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Obat</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_obat');
		echo form_input('name_obat', set_value('name_obat', 'Nama Obat'), 'class="input1"');
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>

<!-- <div class="tableMiddlePage">
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama Obat</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allObat  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php echo $r->nama_obat; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div> -->

<!-- Jenis SDM !-->

<!-- <div id="tambah_jenis_sdm">
	<?php if (isset($sdm_added)){ ?>
		<h3><?php echo $sdm_added; ?> </h3>
	<?php } else { ?>
		<h1>Tambah Jenis SDM</h1>
	<?php } ?>

	<?php
		echo form_open('site/add_item_jenis_sdm');
		echo form_input('jenis_sdm', set_value('jenis_sdm', 'Jenis SDM'));
		echo form_submit('submit', 'Tambah');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>

<div class="tableMiddlePage">
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama Jenis SDM</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allJsdm  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php echo $r->nama_sdm; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
 -->

