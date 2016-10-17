<div>
	<a href="<?php echo base_url('/site/tambah_obat_form'); ?>" class="btn btn-success"> Tambah Obat </a>
	<a href="<?php echo base_url('/site/tambah_obat_form'); ?>" class="btn btn-success"> Tambah Jenis SDM </a>
</div>

<div class="tableMiddlePage">
	<h1>Daftar Obat</h1>

	<table class="table table-bordered" >
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
</div>

<div class="tableMiddlePage">
	<h1>Daftar Jenis SDM</h1>

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
