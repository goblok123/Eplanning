<?php
	$phpArray = array();
	foreach($obat  as $r)
	{
	    $phpArray[] = $r->nama_obat;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_obat = <?php echo json_encode($phpArray ); ?>;
		$("#nama_obat").select2({
		  data: nama_obat
		});
	});
</script>

<div id="add_usulan_obat" class="formMid">

    <h1>Tambah Usulan Obat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/add_usulan_obat');
		echo form_label('Nama obat : ', 'nama_obat');
	?>

	<div>
		<select name="nama_obat" id="nama_obat" style="width:275px;">

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
	<h1>Daftar Usulan Obat</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Obat</th>
			<th>Satuan</th>
			<th>Merk/Type/Model/Ukuran yang Diinginkan</th>
			<th>Jumlah yang Diusulkan</th>
			<th>Jumlah Penggunaan Tahun Sebelumnya(N-1)</th>
			<th>Harga Satuan</th>
			<th>Jumlah Harga</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($usulan_obat)){ ?>
			<?php foreach($usulan_obat  as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
			  			<?php
							foreach($obat as $t)
							{
							    if($t->id_obat == $r->id_obat){
							    	echo "$t->nama_obat";
							    	break;
							    }
							}
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
			  			<a href="<?php echo base_url('/site/ubah_usulan_obat_form/'.$r->id_dtl_obat.''); ?>" class="btn btn-success">Perbaharui</a>
			  		</th>
			  		<th>
			  			<a href="<?php echo base_url('/site/hapus_usulan_obat/'.$r->id_dtl_obat.''); ?>" class="btn btn-danger">Hapus</a>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
</div>