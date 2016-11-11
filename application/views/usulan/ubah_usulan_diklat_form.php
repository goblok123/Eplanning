<div id="rubah_usulan_diklat" class="formMid">

	<!-- id_dtl int NOT NULL,
    nama_diklat varchar(500) NOT NULL,
    jmlh_sdm_pernah int not null,
    jmlh_sdm_belum int not null,
    jmlh_sdm_usul int not null,
    justifikasi text,
    catatan text, -->

    <h1>Ubah Usulan Diklat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_diklat/'.$id.'');
		echo form_label('Nama Diklat : ', 'nama_diklat');
		echo form_input('nama_diklat', set_value('nama_diklat', "$nama_diklat"), 'class="input1"');
		echo form_label('Jumlah SDM Pernah Mengikuti : ', 'jmlh_sdm_pernah');
		echo form_input('jmlh_sdm_pernah', set_value('jmlh_sdm_pernah', "$jmlh_sdm_pernah"), 'class="input1"');
		echo form_label('Jumlah SDM Belum Mengikuti : ', 'jmlh_sdm_belum');
		echo form_input('jmlh_sdm_belum', set_value('jmlh_sdm_belum', "$jmlh_sdm_belum"), 'class="input1"');
		echo form_label('Jumlah SDM Diusulkan Mengikuti : ', 'jmlh_sdm_usul');
		echo form_input('jmlh_sdm_usul', set_value('jmlh_sdm_usul', "$jmlh_sdm_usul"), 'class="input1"');
		echo form_label('Justifikasi : ', 'justifikasi');
		echo form_textarea('justifikasi', set_value('justifikasi', "$justifikasi"), 'class="input1"');
		echo form_label('Catatan : ', 'catatan');
		echo form_textarea('catatan', set_value('catatan', "$catatan"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>