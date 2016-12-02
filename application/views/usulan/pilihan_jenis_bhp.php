<div>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/1/-'); ?>" class="btn btn-success">Tambah BHP Kesehatan (Farmasi)</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/2/-'); ?>" class="btn btn-success">Tambah BHP Khusus Lab dan Reagen(Lab)</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/3/-'); ?>" class="btn btn-success">Tambah BHP Khusus Radiologi (Rontgent)</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/4/-'); ?>" class="btn btn-success">Tambah BHP Khusus Loundry</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/5/-'); ?>" class="btn btn-success">Tambah BHP Khusus CSSD</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/6/-'); ?>" class="btn btn-success">Tambah BHP Khusus HD</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/7/-'); ?>" class="btn btn-success">Tambah Bahan Makanan (khusus Inst Gizi)</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/8/-'); ?>" class="btn btn-success">Tambah Makanan Jadi</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/9/-'); ?>" class="btn btn-success">Tambah BHP Listrik dan Elektronik</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/10/-'); ?>" class="btn btn-success">Tambah BHP Kebersihan (Kesling)</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/11/-'); ?>" class="btn btn-success">Tambah Linen Petugas</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/12/-'); ?>" class="btn btn-success">Tambah Linen Pasien</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/13/-'); ?>" class="btn btn-success">Tambah Barang Cetakan Khusus Rekam Medis</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/14/-'); ?>" class="btn btn-success">Tambah Barang Cetakan Khusus Administrasi Keuangan</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/15/-'); ?>" class="btn btn-success">Tambah ATK non IT</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/16/-'); ?>" class="btn btn-success">Tambah ATK IT</a>
	<a href="<?php echo base_url('/site/tambah_usulan_bhp_form/17/-'); ?>" class="btn btn-success">Tambah Bahan Bangunan (Khusus IPSRS)</a>
</div>

<div class="tableMiddlePage">
		<h1>Daftar Usulan BHP</h1>

	<?php if ($diketahui == 0){ ?>
		<h3 style="color: red">Usulan sudah diketahui oleh Penanggung Jawab/Kepala Unit,</h3>
    	<h3 style="color: red">Untuk dapat mengubah/menambah usulan silakan menghubungi Penanggung Jawab/Kepala agar usulan membatalkan ketahui usulan di menu Ketahui Usulan </h3>
    <?php } ?>

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

			<?php if (isset($usulan_bhp)){ ?>
				<?php foreach($usulan_bhp  as $r): ?>
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
				  		<?php if ($diketahui == 1){ ?>
					  		<th>
					  			<a href="<?php echo base_url('/site/ubah_usulan_bhp_form/'.$r->id_dtl_bhp.''); ?>" class="btn btn-success">Perbaharui</a>
					  		</th>
					  		<th>
					  			<a href="<?php echo base_url('/site/hapus_usulan_bhp/'.$r->id_dtl_bhp.''); ?>" class="btn btn-danger">Hapus</a>
					  		</th>
				  		<?php } ?>
					</tr>
				<?php endforeach; ?>
			<?php } ?>
		</table>
	</div>