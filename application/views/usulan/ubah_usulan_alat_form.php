<div id="" class="formMid">

    <h1>Ubah Usulan Alat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_alat/'.$id.'/'.$kode_jenis_alat.''); //belum
	?>

	<h4>Jenis Alat : <?php echo "$jenis_alat"; ?></h4>

	<?php
		echo form_label('Nama Alat : ', 'nama_alat');
		echo form_label("$nama_alat");
	?>

	<?php
		echo form_label('Jumlah yang Sudah Ada:', 'jmlh_yg_sdh_ada');
		echo form_input('jmlh_yg_sdh_ada', set_value('jmlh_yg_sdh_ada', "$jmlh_yg_sdh_ada"), 'class="input1"');
		
		echo form_label('Kondisi:');
		$options = array(
	        "B"         => "B",
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, "$kondisi", 'class="dropdownStyle"');

		echo form_label('Jumlah yang Diusulkan : ', 'jmlh_yg_diusulkan');
		echo form_input('jmlh_yg_diusulkan', set_value('jmlh_yg_diusulkan', "$jmlh_yg_diusulkan"), 'class="input1"');
		echo form_label('Merk/Type/Model yang Diinginkan : ', 'merk');
		echo form_input('merk', set_value('merk', "$merk"), 'class="input1"');
		echo form_label('Justifikasi ', 'justifikasi');
		echo form_input('justifikasi', set_value('justifikasi', "$justifikasi"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>
</div>

