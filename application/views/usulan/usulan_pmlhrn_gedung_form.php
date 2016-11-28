<?php
	$phpArray = array();
	foreach($gedung  as $r)
	{
	    $phpArray[] = $r->nama_gedung;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_gedung = <?php echo json_encode($phpArray ); ?>;
		$("#nama_gedung").select2({
		  data: nama_gedung
		});
	});
</script>

<div id="add_usulan_sdm" class="formMid">

    <h1>Tambah Usulan Pemeliharaan Pengadaan Gedung</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_pmlhrn_gedung');
		echo form_label('Nama Gedung dan Sarana Konstruksi Lainnya: ', 'nama_gedung');
	?>

	<div>
		<select name="nama_gedung" id="nama_gedung" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Bagian yang Diperbaiki/Dipelihara: ', 'bgn_diperbaiki');
		echo form_textarea('bgn_diperbaiki', set_value('bgn_diperbaiki', ''), 'class="input1"');

		echo form_label('Pengadaan Tahun: ', 'pngdn_thn');
		echo form_input('pngdn_thn', set_value('pngdn_thn', ''), 'class="input1"');

		echo form_label('Kondisi : ', 'kondisi');
		$options = array(
	        "RR"         => "RR",
	        "RB"           => "RB",
		);
		echo form_dropdown('kondisi', $options, 'kondisi', 'class="dropdownStyle"');
		
		echo form_label('Volume/Jumlah yang Diperbaiki : ', 'jmlh_dprbk');
		echo form_input('jmlh_dprbk', set_value('jmlh_dprbk', ''), 'class="input1"');

		echo form_label('Jenis Pemeliharaan : ', 'jns_pmlhrn');
		echo form_input('jns_pmlhrn', set_value('jns_pmlhrn', ''), 'class="input1"');

		echo form_label('Info Kerusakan: ', 'info');
		echo form_textarea('info', set_value('info', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Pemeliharaan Gedung</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Gedung dan Saran Konstruksi Lainnya</th>
			<th>Bagian yang Diperbaiki/Dipelihara</th>
			<th>Pengadaan Tahun</th>
			<th>Kondisi</th>
			<th>Valume/jumlah yang Diperbaiki</th>
			<th>Jenis Pemeliharaan</th>
			<th>Info Kerusakaan</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($usulan_pmlhraan_gdng)){ ?>
			<?php foreach($usulan_pmlhraan_gdng  as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
			  			<?php
							foreach($gedung as $t)
							{
							    if($t->id_gedung == $r->id_gedung){
							    	echo "$t->nama_gedung";
							    	break;
							    }
							}
						?>
			  		</th>
			  		<th>
			  			<?php echo $r->bgn_diperbaiki; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->pngdn_thn; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_dprbk; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jns_pmlhrn; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
			  		
			  		<th>
			  			<a href="<?php echo base_url('/site/ubah_usulan_pmlhrn_gedung_form/'.$r->id_dtl_usln_pmlhrn_gedung.'/-'); ?>" class="btn btn-success">Perbaharui</a>
			  		</th>
			  		<th>
			  			<a href="<?php echo base_url('/site/hapus_usulan_pmlhrn_gedung/'.$r->id_dtl_usln_pmlhrn_gedung.''); ?>" class="btn btn-danger">Hapus</a>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
</div>