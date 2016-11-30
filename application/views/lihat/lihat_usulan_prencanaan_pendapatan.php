<div class="tableMiddlePage">
	<h1>Daftar Usulan Perencanaan Anggaran Pendapatan</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Komponen Pendapatan Rumah Sakit</th>
			<th>Realisasi Pendapatan Tahun Lalu(N-1)</th>
			<th>Realisasi Pendapatan s/d Bulan ini TA ke-N</th>
			<th>Rencana Anggaran Pendapatan TA ke-(N+1)</th>
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
			  			<?php
							echo $r->nama_item_keu;
						?>
			  		</th>
			  		<th>
			  			<?php echo $r->realisasi_tahun_lalu; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->realisasi_pendapatan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->rencana_pendapatan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php } ?>
	</table>
	<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
</div>