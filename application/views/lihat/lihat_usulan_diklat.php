<div class="tableMiddlePage">
	<h1>Usulan Diklat oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Diklat</th>
			<th>Jumlah SDM Pernah Mengikuti</th>
			<th>Jumlah SDM Belum Mengikuti</th>
			<th>Jumlah SDM Diusulkan Mengikuti</th>
			<th>Justifikasi</th>
			<th>Catatan</th>
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
			  			<?php echo $r->nama_diklat; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_sdm_pernah; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_sdm_belum; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_sdm_usul; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->justifikasi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->catatan; ?>
			  		</th> 
				</tr>
			<?php endforeach; ?>
		<?php } ?>
	</table>
	
	<?php if($boleh_ketahui == 1){ ?>
		<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>
	<?php } ?>
</div>