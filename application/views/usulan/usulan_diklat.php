<div id="tambah_usulan_diklat" class="formMid">

    <h1>Tambah Usulan Diklat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/add_usulan_diklat');
		echo form_label('Nama Diklat : ', 'nama_diklat');
		echo form_input('nama_diklat', set_value('nama_diklat', ''), 'class="input1"');
		echo form_label('Jumlah SDM Pernah Mengikuti : ', 'jmlh_sdm_pernah');
		echo form_input('jmlh_sdm_pernah', set_value('jmlh_sdm_pernah', ''), 'class="input1"');
		echo form_label('Jumlah SDM Belum Mengikuti : ', 'jmlh_sdm_belum');
		echo form_input('jmlh_sdm_belum', set_value('jmlh_sdm_belum', ''), 'class="input1"');
		echo form_label('Jumlah SDM Diusulkan Mengikuti : ', 'jmlh_sdm_usul');
		echo form_input('jmlh_sdm_usul', set_value('jmlh_sdm_usul', ''), 'class="input1"');
		echo form_label('Justifikasi : ', 'justifikasi');
		echo form_textarea('justifikasi', set_value('justifikasi', ''), 'class="input1"');
		echo form_label('Catatan : ', 'catatan');
		echo form_textarea('catatan', set_value('catatan', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>

<div class="tableMiddlePage">
	<h1>Usulan Diklat yang Telah Masuk</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Diklat</th>
			<th>Jumlah SDM Pernah Mengikuti</th>
			<th>Jumlah SDM Belum Mengikuti</th>
			<th>Jumlah SDM Diusulkan Mengikuti</th>
			<th>Justifikasi</th>
			<th>Catatan</th>
			<th>Edit</th>
			<th>Hapus</th>
		</tr>
		<?php $h = 0; ?>

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
		  		<th>
		  			<a href="<?php echo base_url('/site/ubah_usulan_diklat_form/'.$r->id_dtl.'/-'); ?>" class="btn btn-success">Perbaharui</a>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/hapus_usulan_diklat/'.$r->id_dtl.'/-'); ?>" class="btn btn-danger">Hapus</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>