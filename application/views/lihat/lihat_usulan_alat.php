
	<div class="tableMiddlePage">
		<h1>Daftar Usulan Alat oleh <?php echo $nama_unit->name_unit; ?></h1>

		<table class="table table-bordered" >
			<tr>
				<th>No.</th>
				<th>Jenis Alat</th>
				<th>Nama Alat</th>
				<th>Jumlah yang Sudah Ada</th>
				<th>Kondisi</th>
				<th>Jumlah yang Diusulkan</th>
				<th>Merk/Type/Model/Ukuran yang Diinginkan</th>
				<th>Justifikasi</th>
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
				  			<?php
								echo $r->nama_alat_kes_dan_non;
							?>
				  		</th>
				  		<th>
				  			<?php echo $r->jmlh_yg_sdh_ada; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->kondisi; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->jmlh_yg_diusulkan; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->merk; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->justifikasi; ?>
				  		</th>
					</tr>
				<?php endforeach; ?>
			<?php } ?>
		</table>

		<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>

	</div>
