<div id="ubah_usulan_gaji_non_pns" class="formMid">

    <h1>Ubah Usulan Gajin Kontrak/Pegawai Tidak Tetap</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_gaji_non_pns/'.$id.'');
	?>

	<h4>Kualifikasi Tenaga Kontrak/Pegawai Tidak Tetap : <?php echo "$nama_item_keu"; ?></h4>

	<?php
		echo form_label('Jumlah Pegawai: ', 'jmlh_pgwi');
		echo form_input('jmlh_pgwi', set_value('jmlh_pgwi', "$jmlh_pgwi"), 'class="input1"');

		echo form_label('Jumlah Bulan: ', 'jmlh_bln');
		echo form_input('jmlh_bln', set_value('jmlh_bln', "$jmlh_bln"), 'class="input1"');
		
		echo form_label('Jumlah Gaji Per Bulan : ', 'jmlh_gaji_perbulan');
		echo form_input('jmlh_gaji_perbulan', set_value('jmlh_gaji_perbulan', "$jmlh_gaji_perbulan"), 'class="input1"');

		echo form_label('Jumlah Gaji Per Tahun(n+1) : ', 'jmlh_gaji_pertahun_n1');
		echo form_input('jmlh_gaji_pertahun_n1', set_value('jmlh_gaji_pertahun_n1', "$jmlh_gaji_pertahun_n1"), 'class="input1"');

		echo form_label('Jumlah Gaji Per Tahun(n) : ', 'jmlh_gaji_pertahun_n');
		echo form_input('jmlh_gaji_pertahun_n', set_value('jmlh_gaji_pertahun_n', "$jmlh_gaji_pertahun_n"), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>