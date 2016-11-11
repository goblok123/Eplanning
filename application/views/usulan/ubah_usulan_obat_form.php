<div id="rubah_usulan_obat" class="formMid">

    <h1>Ubah Usulan Obat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>



	<?php
		echo form_open('site/ubah_usulan_obat/'.$id.'');
		echo form_label('Nama obat :  ', "$nama_obat");
		echo form_label(" $nama_obat", "");
	?>

	<?php
		echo form_label('Jumlah yang Diusulkan(untuk 1 tahun/12 bulan)(tahun n+1) : ', 'jmlh_yg_diusulkan');
		echo form_input('jmlh_yg_diusulkan', set_value('jmlh_yg_diusulkan', "$jmlh_yg_diusulkan"), 'class="input1"');
		
		echo form_label('Satuan');
		$options = array(
	        "buah"         => "buah",
	        "biji"         => "biji",
	        "kotak"           => "kotak",
	        "pel-pel"		=> "pel-pel",
		);
		echo form_dropdown('satuan', $options, "$satuan", 'class="dropdownStyle"');

		echo form_label('Harga Satuan : ', 'hrg_satuan');
		echo form_input('hrg_satuan', set_value('hrg_satuan', "$hrg_satuan"), 'class="input1"');
		echo form_label('Jumlah Harga : ', 'jmlh_harga');
		echo form_input('jmlh_harga', set_value('jmlh_harga', "$jmlh_harga"), 'class="input1"');
		echo form_label('Merk/Type/Model/Ukuran yang Diinginkan: ', 'merk');
		echo form_input('merk', set_value('merk', "$merk"), 'class="input1"');
		echo form_label('Jumlah yang Penggunaan Tahun n-1 : ', 'jmlh_pnggnaan_thn_sblm');
		echo form_input('jmlh_pnggnaan_thn_sblm', set_value('jmlh_pnggnaan_thn_sblm', "$jmlh_pnggnaan_thn_sblm"), 'class="input1"');

		echo form_submit('submit', 'Ubah');
	?>

	
</div>