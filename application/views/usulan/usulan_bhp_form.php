<?php
	$phpArray = array();
	foreach($dt  as $r)
	{
	    $phpArray[] = $r->nama_bhp;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_bhp = <?php echo json_encode($phpArray ); ?>;
		$("#nama_bhp").select2({
		  data: nama_bhp
		});
	});
</script>

<div id="add_usulan_bhp" class="formMid">

    <h1>Tambah Usulan BHP</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_bhp/'.$no_jenis.'');
	?>

	<h4>Jenis BHP : <?php echo "$jenis_bhp"; ?></h4>

	<?php
		echo form_label('Nama BHP : ', 'nama_bhp');
	?>

	<div>
		<select name="nama_bhp" id="nama_bhp" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Jumlah yang Diusulkan(untuk 1 tahun/12 bulan)(tahun n+1) : ', 'jmlh_yg_diusulkan');
		echo form_input('jmlh_yg_diusulkan', set_value('jmlh_yg_diusulkan', ''), 'class="input1"');
		
		echo form_label('Satuan');
		$options = array(
	        "buah"         => "buah",
	        "biji"         => "biji",
	        "kotak"           => "kotak",
	        "pel-pel"		=> "pel-pel",
		);
		echo form_dropdown('satuan', $options, 'buah', 'class="dropdownStyle"');

		echo form_label('Harga Satuan : ', 'hrg_satuan');
		echo form_input('hrg_satuan', set_value('hrg_satuan', ''), 'class="input1"');
		echo form_label('Jumlah Harga : ', 'jmlh_harga');
		echo form_input('jmlh_harga', set_value('jmlh_harga', ''), 'class="input1"');
		echo form_label('Merk/Type/Model/Ukuran yang Diinginkan: ', 'merk');
		echo form_input('merk', set_value('merk', ''), 'class="input1"');
		echo form_label('Jumlah yang Penggunaan Tahun n-1 : ', 'jmlh_pnggnaan_thn_sblm');
		echo form_input('jmlh_pnggnaan_thn_sblm', set_value('jmlh_pnggnaan_thn_sblm', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>


	<div class="tableMiddlePage">
		<h1>Daftar Usulan BHP</h1>

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
				  		<th>
				  			<a href="<?php echo base_url('/site/ubah_usulan_bhp_form/'.$r->id_dtl_bhp.''); ?>" class="btn btn-success">Perbaharui</a>
				  		</th>
				  		<th>
				  			<a href="<?php echo base_url('/site/hapus_usulan_bhp/'.$r->id_dtl_bhp.''); ?>" class="btn btn-danger">Hapus</a>
				  		</th>
					</tr>
				<?php endforeach; ?>
			<?php } ?>
		</table>
	</div>
