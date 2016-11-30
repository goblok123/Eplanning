	<div class="tableMiddlePage">
		<h1>Daftar Usulan BHP oleh <?php echo $nama_unit->name_unit; ?></h1>

		<table class="table table-bordered" >
			<tr>
				<th>No.</th>
				<th>Jenis BHP</th>
				<th>Nama BHP</th>
				<th>Satuan</th>
				<th>Merk/Type/Model/Ukuran yang Diinginkan</th>
				<th>Jumlah yang Diusulkan</th>
				<th>Jumlah Penggunaan Tahun Sebelumnya(N-1)</th>
				<th>Harga Satuan</th>
				<th>Jumlah Harga</th>
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
							<?php echo $r->nama_jenis_bhp; ?>
						</th>
						<th>
				  			<?php
				  				echo $r->nama_bhp;
							?>
				  		</th>
				  		<th>
				  			<?php echo $r->satuan; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->merk; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->jmlh_yg_diusulkan; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->jmlh_pnggnaan_thn_sblm; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->hrg_satuan; ?>
				  		</th>
				  		<th>
				  			<?php echo $r->jmlh_harga; ?>
				  		</th>
					</tr>
				<?php endforeach; ?>
			<?php } ?>
		</table>

		<a href="<?php echo base_url('/site2/ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-success">Ketahui</a>

	</div>
