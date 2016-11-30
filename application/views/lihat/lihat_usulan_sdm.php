<div class="tableMiddlePage">
	<h1>Daftar Usulan SDM oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Jenis SDM</th>
			<th>Pendidikan dan Keahlian</th>
			<th>Jumlah yang Sudah Ada</th>
			<th>Jumlah yang Harus Ada Menurut Standar</th>
			<th>Jumlah Kebutuhan SDM yang Diusulkan</th>
			<th>Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($all  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php echo $r->nama_sdm; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->pendidikan_dan_keahlian; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_ada; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_mnrt_stndr; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_usulan; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->justifikasi; ?>
		  		</th>
		  		
			</tr>
		<?php endforeach; ?>
	</table>
	<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
</div>