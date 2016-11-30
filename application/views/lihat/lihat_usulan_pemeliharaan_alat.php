<div class="tableMiddlePage">
	<h1>Daftar Usulan Pemeliharaan oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Jenis Alat</th>
			<th>Nama Alat</th>
			<th>Merk/Type/Model/Ukuran</th>
			<th>Pengadaan Tahun</th>
			<th>Kondisi</th>
			<th>Jumlah yang Diperbaiki/ Dipelihara</th>
			<th>Jenis Pemeliharaan</th>
			<th>Info Kerusakan</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($all)){ ?>
			<?php foreach($all  as $r): ?>
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
			  		<th>
			  			<?php echo $r->merk; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->pngdn_thn; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_diperbaiki; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jns_pmlhrn; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
	<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
</div>