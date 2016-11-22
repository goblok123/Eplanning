<div id="ubah_usulan_gaji_non_pns" class="formMid">

    <h1>Ubah Usulan Gaji Pegawai PNS</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_gaji_pns/'.$id.'');
	?>

	<h4>Uraian Belanja Gaji dan Tunjangan PNS : <?php echo "$nama_item_keu"; ?></h4>

	<?php
		echo form_label('Realisasi Belanja Gaji Tahun Lalu(N-1): ', 'gaji_tahun_lalu');
		echo form_input('gaji_tahun_lalu', set_value('gaji_tahun_lalu', "$gaji_tahun_lalu"), 'class="input1"');

		echo form_label('Rencana Anggaran Gaji PNS TA (N+1): ', 'rencana_gaji');
		echo form_input('rencana_gaji', set_value('rencana_gaji', "$rencana_gaji"), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>