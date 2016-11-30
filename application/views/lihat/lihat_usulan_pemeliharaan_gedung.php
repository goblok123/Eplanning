
<div class="tableMiddlePage">
	<h1>Daftar Usulan Pemeliharaan Gedung oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Gedung dan Saran Konstruksi Lainnya</th>
			<th>Bagian yang Diperbaiki/Dipelihara</th>
			<th>Pengadaan Tahun</th>
			<th>Kondisi</th>
			<th>Valume/jumlah yang Diperbaiki</th>
			<th>Jenis Pemeliharaan</th>
			<th>Info Kerusakaan</th>
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
			  			<?php echo $r->nama_gedung; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->bgn_diperbaiki; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->pngdn_thn; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_dprbk; ?>
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