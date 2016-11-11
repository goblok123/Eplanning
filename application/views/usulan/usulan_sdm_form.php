<?php
	$phpArray = array();
	foreach($sdm  as $r)
	{
	    $phpArray[] = $r->nama_sdm;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_sdm = <?php echo json_encode($phpArray ); ?>;
		$("#nama_sdm").select2({
		  data: nama_sdm
		});
	});
</script>

<div id="add_usulan_sdm" class="formMid">

    <h1>Tambah Usulan SDM</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/add_usulan_sdm');
		echo form_label('Jenis dan Kualifikasi SDM yang Diusulkan Ditambah : : ', 'nama_sdm');
	?>

	<div>
		<select name="nama_sdm" id="nama_sdm" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Pendidikan dan Keahlian: ', 'pendidikan_dan_keahlian');
		echo form_input('pendidikan_dan_keahlian', set_value('pendidikan_dan_keahlian', ''), 'class="input1"');
		
		// echo form_label('Satuan');
		// $options = array(
	 //        "buah"         => "buah",
	 //        "biji"         => "biji",
	 //        "kotak"           => "kotak",
	 //        "pel-pel"		=> "pel-pel",
		// );
		// echo form_dropdown('satuan', $options, 'buah', 'class="dropdownStyle"');

		echo form_label('Jumlah yang Sudah Ada: ', 'jmlh_ada');
		echo form_input('jmlh_ada', set_value('jmlh_ada', ''), 'class="input1"');
		echo form_label('Jumlah yang Harus Ada Menurut Standar : ', 'jmlh_mnrt_stndr');
		echo form_input('jmlh_mnrt_stndr', set_value('jmlh_mnrt_stndr', ''), 'class="input1"');
		echo form_label('Jumlah Kebutuhan SDM yang Diusulkan ', 'jmlh_usulan');
		echo form_input('jmlh_usulan', set_value('jmlh_usulan', ''), 'class="input1"');
		echo form_label('Justifikasi : ', 'justifikasi');
		echo form_input('justifikasi', set_value('justifikasi', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan SDM</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Jenis SDM</th>
			<th>Pendidikan dan Keahlian</th>
			<th>Jumlah yang Sudah Ada</th>
			<th>Jumlah yang Harus Ada Menurut Standar</th>
			<th>Jumlah Kebutuhan SDM yang Diusulkan</th>
			<th>Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($usulan_sdm  as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php
						foreach($sdm as $t)
						{
						    if($t->id_jenis_sdm == $r->id_jenis_sdm){
						    	echo "$t->nama_sdm";
						    	break;
						    }
						}
					?>
		  		</th>
		  		<th>
		  			<?php echo $r->pendidikan_dan_keahlian; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_ada; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_mnrt_stndr; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->jmlh_usulan; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->justifikasi; ?>
		  		</th>
		  		
		  		<th>
		  			<a href="<?php echo base_url('/site/ubah_usulan_sdm_form/'.$r->id_dtl_usulan_sdm.''); ?>" class="btn btn-success">Perbaharui</a>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/hapus_usulan_sdm/'.$r->id_dtl_usulan_sdm.''); ?>" class="btn btn-danger">Hapus</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>