<?php
	$phpArray = array();
	foreach($komponen  as $r)
	{
	    $phpArray[] = $r->nama_item_keu;
	}
?>

<script type="text/javascript">
	$(document).ready(function() {
		var nama_item_keu = <?php echo json_encode($phpArray ); ?>;
		$("#nama_item_keu").select2({
		  data: nama_item_keu
		});
	});
</script>

<div id="add_usulan_gaji_pns" class="formMid">

    <h1>Tambah Usulan Perencanaan Anggaran Pendapatan</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_perencanaan_pendapatan');
		echo form_label('Komponen Pendapatan Rumah Sakit: ', 'nama_item_keu');
	?>

	<div>
		<select name="nama_item_keu" id="nama_item_keu" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Realisasi Pendapatan Tahun Lalu(N-1): ', 'realisasi_tahun_lalu');
		echo form_input('realisasi_tahun_lalu', set_value('realisasi_tahun_lalu', ''), 'class="input1"');

		echo form_label('Realisasi Pendapatan s/d Bulan ini TS ke-N: ', 'realisasi_pendapatan');
		echo form_input('realisasi_pendapatan', set_value('realisasi_pendapatan', ''), 'class="input1"');

		echo form_label('Rencana Anggaran Pendapatan TA ke (N+1): ', 'rencana_pendapatan');
		echo form_input('rencana_pendapatan', set_value('rencana_pendapatan', ''), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Perencanaan Anggaran Pendapatan</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Komponen Pendapatan Rumah Sakit</th>
			<th>Realisasi Pendapatan Tahun Lalu(N-1)</th>
			<th>Realisasi Pendapatan s/d Bulan ini TA ke-N</th>
			<th>Rencana Anggaran Pendapatan TA ke-(N+1)</th>
			<th>Informasi/Justifikasi</th>
		</tr>
		<?php $h = 0; ?>
		<?php if (isset($usulan_perencanaan_pendapatan)){ ?>
			<?php foreach($usulan_perencanaan_pendapatan as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
			  			<?php
							foreach($komponen as $t)
							{
							    if($t->id_item == $r->id_item){
							    	echo "$t->nama_item_keu";
							    	break;
							    }
							}
						?>
			  		</th>
			  		<th>
			  			<?php echo $r->realisasi_tahun_lalu; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->realisasi_pendapatan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->rencana_pendapatan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
			  		
			  		<th>
			  			<a href="<?php echo base_url('/site/ubah_usulan_perencanaan_pendapatan_form/'.$r->id_dtl_usulan_prncnn_pndptn.'/-'); ?>" class="btn btn-success">Perbaharui</a>
			  		</th>
			  		<th>
			  			<a href="<?php echo base_url('/site/hapus_usulan_gaji_pns/'.$r->id_dtl_usulan_prncnn_pndptn.''); ?>" class="btn btn-danger">Hapus</a>
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php } ?>
	</table>
</div>