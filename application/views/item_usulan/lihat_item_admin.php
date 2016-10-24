<div>
	<a href="<?php echo base_url('/site/tambah_obat_form_kosong'); ?>" class="btn btn-success">Tambah Obat</a>
	<a href="<?php echo base_url('/site/tambah_jenis_sdm_form_kosong'); ?>" class="btn btn-success">Tambah Jenis SDM</a>
	<a href="<?php echo base_url('/site/tambah_bhp_form_kosong'); ?>" class="btn btn-success">Tambah BHP</a>
	<a href="<?php echo base_url('/site/tambah_alat_form_kosong'); ?>" class="btn btn-success">Tambah Alat</a>
	<a href="<?php echo base_url('/site/tambah_gedung_form_kosong'); ?>" class="btn btn-success">Tambah Gedung</a>
	<a href="<?php echo base_url('/site/tambah_item_keu_form_kosong'); ?>" class="btn btn-success">Tambah Item Keuangan</a>
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

<div class="tableMiddlePage">
	<h1>Daftar BHP</h1>

	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Jenis BHP</th>
			<th>Nama BHP</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allBhp  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
					<?php 
						$this->load->model('master_model');
						$d = $this->master_model->find_jenis_bhp($r->id_kode);
						echo $d->nama_jenis_bhp;
					?>
		  		</th>
		  		<th>
		  			<?php echo $r->nama_bhp; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<div class="tableMiddlePage">
	<h1>Daftar Alat</h1>

	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Jenis Alat</th>
			<th>Nama Alat</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allAlat  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
					<?php echo $r->jenis_alat; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->nama_alat_kes_dan_non; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<div class="tableMiddlePage">
	<h1>Daftar Gedung</h1>

	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama Gedung</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allGedung  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
		  		<th>
		  			<?php echo $r->nama_gedung; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<div class="tableMiddlePage">
	<h1>Daftar Item Keuangan</h1>

	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Jenis Item Keungan</th>
			<th>Nama Item Keuangan</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($allItemKeu as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
					<?php echo $r->jenis_item_keu; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->nama_item_keu; ?>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
