<div>
	<a href="<?php echo base_url('/site/tambah_usulan_pemeliharaan_alat_form/1/-'); ?>" class="btn btn-success">Tambah Usulan Alat Kesehatan Medis/Penunjang</a>
	<a href="<?php echo base_url('/site/tambah_usulan_pemeliharaan_alat_form/2/-'); ?>" class="btn btn-success">Tambah Usulan Alat Non Kesehatan</a>
</div>

<div class="tableMiddlePage">
	<h1>Daftar Usulan Pemeliharaan</h1>

	<?php if ($diketahui == 0){ ?>
		<h3 style="color: red">Usulan sudah diketahui oleh Penanggung Jawab/Kepala Unit,</h3>
    	<h3 style="color: red">Untuk dapat mengubah/menambah usulan silakan menghubungi Penanggung Jawab/Kepala agar usulan membatalkan ketahui usulan di menu Ketahui Usulan </h3>
    <?php } ?>

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

		<?php if (isset($usulan_pemeliharaan)){ ?>
			<?php foreach($usulan_pemeliharaan  as $r): ?>
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
			  		<?php if ($diketahui == 1){ ?>
				  		<th>
				  			<a href="<?php echo base_url('/site/ubah_usulan_pemeliharaan_alat_form/'.$r->id_dtl_pmlhrn_alat.''); ?>" class="btn btn-success">Perbaharui</a>
				  		</th>
				  		<th>
				  			<a href="<?php echo base_url('/site/hapus_usulan_pemeliharaan_alat/'.$r->id_dtl_pmlhrn_alat.''); ?>" class="btn btn-danger">Hapus</a>
				  		</th>
			  		<?php }?>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
</div>