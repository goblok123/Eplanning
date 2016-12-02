
<div class="tableMiddlePage">
	<h1>Daftar Usulan Pengadaan Gedung oleh <?php echo $nama_unit->name_unit; ?></h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Gedung dan Saran Konstruksi Lainnya</th>
			<th>Jumlah yang Sudah Ada</th>
			<th>Kondisi</th>
			<th>Jumlah yang Diusulkan</th>
			<th>Informasi/Justifikasi</th>
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
			  			<?php
							echo $r->nama_gedung;   
						?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_ada; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_diusulkan; ?>
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