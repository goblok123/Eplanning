<div id="ubah_usulan_perencanaan_pendapatan" class="formMid">

    <h1>Ubah Usulan Perencanaan Anggaran Pendapatan</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_perencanaan_pendapatan/'.$id.'');
	?>

	<h4>Komponen Pendapatan Rumah Sakit: <?php echo "$nama_item_keu"; ?></h4>

	<?php
		echo form_label('Realisasi Pendapatan Tahun Lalu(N-1): ', 'realisasi_tahun_lalu');
		echo form_input('realisasi_tahun_lalu', set_value('realisasi_tahun_lalu', "$realisasi_tahun_lalu"), 'class="input1"');

		echo form_label('Realisasi Pendapatan s/d Bulan ini TS ke-N: ', 'realisasi_pendapatan');
		echo form_input('realisasi_pendapatan', set_value('realisasi_pendapatan', "$realisasi_pendapatan"), 'class="input1"');

		echo form_label('Rencana Anggaran Pendapatan TA ke (N+1): ', 'rencana_pendapatan');
		echo form_input('rencana_pendapatan', set_value('rencana_pendapatan', "$rencana_pendapatan"), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>