<div class="tableMiddlePage">
	<h1>Daftar Usulan Gajin Kontrak/Pegawai Tidak Tetap oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Kualifikasi Tenaga Kontrak/Pegawai Tidak Tetap</th>
			<th>Jumlah Pegawai</th>
			<th>Jumlah Bulan</th>
			<th>Jumlah Gaji Per Bulan</th>
			<th>Jumlah Gaji Per Tahun(n+1)</th>
			<th>Jumlah Gaji Per Tahun(n)</th>
			<th>Informasi/Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($all)){ ?>
			<?php foreach($all as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
			  			<?php echo $r->nama_item_keu; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_pgwi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_bln; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_gaji_perbulan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_gaji_pertahun_n1; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_gaji_pertahun_n; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php } ?>
	</table>

	<?php if($boleh_ketahui == 1){ ?>
		<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
	<?php }?>
</div>