<?php
	$phpArray = array();
	foreach($semua_alat  as $r)
	{
	    $phpArray[] = $r->nama_alat_kes_dan_non;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_alat = <?php echo json_encode($phpArray ); ?>;
		$("#nama_alat").select2({
		  data: nama_alat
		});
	});
</script>

<div id="add_usulan_obat" class="formMid">

    <h1>Tambah Usulan Alat</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_alat/'.$no_jenis.'');
	?>

	<h4>Jenis BHP : <?php echo "$jenis_alat"; ?></h4>

	<?php
		echo form_label('Nama Alat :', 'nama_alat');
	?>

	<div>
		<select name="nama_alat" id="nama_alat" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Jumlah yang Sudah Ada:', 'jmlh_yg_sdh_ada');
		echo form_input('jmlh_yg_sdh_ada', set_value('jmlh_yg_sdh_ada', ''), 'class="input1"');
		
		echo form_label('Kondisi:');
		$options = array(
	        "B"         => "B",
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, 'kondisi', 'class="dropdownStyle"');

		echo form_label('Jumlah yang Diusulkan : ', 'jmlh_yg_diusulkan');
		echo form_input('jmlh_yg_diusulkan', set_value('jmlh_yg_diusulkan', ''), 'class="input1"');
		echo form_label('Merk/Type/Model yang Diinginkan : ', 'merk');
		echo form_input('merk', set_value('merk', ''), 'class="input1"');
		echo form_label('Justifikasi ', 'justifikasi');
		echo form_input('justifikasi', set_value('justifikasi', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>
</div>


	<div class="tableMiddlePage">
		<h1>Daftar Usulan Alat</h1>

		<table class="table table-bordered" >
			<tr>
				<th>No.</th>
				<th>Jenis Alat</th>
				<th>Nama Alat</th>
				<th>Jumlah yang Sudah Ada</th>
				<th>Kondisi</th>
				<th>Jumlah yang Diusulkan</th>
				<th>Merk/Type/Model/Ukuran yang Diinginkan</th>
				<th>Justifikasi</th>
			</tr>
			<?php $h = 0; ?>

			<?php foreach($usulan_alat  as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
						<?php echo $jenis_alat; ?>
					</th>
					<th>
			  			<?php
							foreach($semua_alat as $t)
							{
							    if($t->id_alat == $r->id_alat){
							    	echo "$t->nama_alat_kes_dan_non";
							    	break;
							    }
							}
						?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_yg_sdh_ada; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_yg_diusulkan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->merk; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->justifikasi; ?>
			  		</th>
			  		<th>
			  			<a href="<?php echo base_url('/site/ubah_usulan_alat_form/'.$r->id_dtl_usulan_alat.''); ?>" class="btn btn-success">Perbaharui</a>
			  		</th>
			  		<th>
			  			<a href="<?php echo base_url('/site/hapus_usulan_alat/'.$r->id_dtl_usulan_alat.''); ?>" class="btn btn-danger">Hapus</a>
			  		</th>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
