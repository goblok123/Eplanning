<div id="" class="formMid">

    <h1>Ubah Usulan Gedung</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/ubah_usulan_gedung/'.$id.''); //belum
	?>

	<h4>Nama Gedung dan Sarana Konstruksi Lainnya : <?php echo "$nama_gedung"; ?></h4>

	<?php
		echo form_label('Jumlah yang Sudah Ada: ', 'jmlh_ada');
		echo form_input('jmlh_ada', set_value('jmlh_ada', "$jmlh_ada"), 'class="input1"');

		echo form_label('Kondisi : ', 'kondisi');
		$options = array(
			"B"         => "B",
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, "$kondisi", 'class="dropdownStyle"');
		
		echo form_label('Jumlah yang Diusulkan : ', 'jmlh_diusulkan');
		echo form_input('jmlh_diusulkan', set_value('jmlh_diusulkan', "$jmlh_diusulkan"), 'class="input1"');
		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', "$info"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>
</div>

