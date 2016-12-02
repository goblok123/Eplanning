<div class="tableMiddlePage">
	<h1>Daftar Usulan Gajin Kontrak/Pegawai Tidak Tetap oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Uraian Belanja Gaji dan Tunjangan PNS</th>
			<th>Realisasi Belanja Gaji Tahun Lalu(N-1)</th>
			<th>Rencana Anggaran Gaji PNS TA(N+1)</th>
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
			  			<?php echo $r->gaji_tahun_lalu; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->rencana_gaji; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>

	<?php if($boleh_ketahui == 1){ ?>
		<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
	<?php }?>
</div>