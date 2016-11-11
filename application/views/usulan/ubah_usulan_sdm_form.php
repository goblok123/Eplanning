<div id="rubah_usulan_sdm" class="formMid">

    <h1>Ubah Usulan SDM</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_sdm/'.$id.'');
		echo form_label('Jenis dan Kualifikasi SDM yang Diusulkan Ditambah :', "$nama_sdm");
		echo form_label(" $nama_sdm", '');
	?>

	<br>
	<?php
		echo form_label('Pendidikan dan Keahlian: ', 'pendidikan_dan_keahlian');
		echo form_input('pendidikan_dan_keahlian', set_value('pendidikan_dan_keahlian', "$pendidikan_dan_keahlian"), 'class="input1"');
		echo form_label('Jumlah yang Sudah Ada: ', 'jmlh_ada');
		echo form_input('jmlh_ada', set_value('jmlh_ada', "$jmlh_ada"), 'class="input1"');
		echo form_label('Jumlah yang Harus Ada Menurut Standar : ', 'jmlh_mnrt_stndr');
		echo form_input('jmlh_mnrt_stndr', set_value('jmlh_mnrt_stndr', "$jmlh_mnrt_stndr"), 'class="input1"');
		echo form_label('Jumlah Kebutuhan SDM yang Diusulkan ', 'jmlh_usulan');
		echo form_input('jmlh_usulan', set_value('jmlh_usulan', "$jmlh_usulan"), 'class="input1"');
		echo form_label('Justifikasi : ', 'justifikasi');
		echo form_input('justifikasi', set_value('justifikasi', "$justifikasi"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>