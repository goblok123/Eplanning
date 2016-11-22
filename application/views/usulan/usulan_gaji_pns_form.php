<?php
	$phpArray = array();
	foreach($pns  as $r)
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

    <h1>Tambah Usulan Gaji PNS</h1>

	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
	<?php } else { ?>
		<h3>-</h3>
	<?php } ?>

	<?php echo validation_errors('<p class="error">'); ?>

	<?php
		echo form_open('site/tambah_usulan_gaji_pns');
		echo form_label('Uraian Belanja Gaji dan Tunjangan PNS: ', 'nama_item_keu');
	?>

	<div>
		<select name="nama_item_keu" id="nama_item_keu" style="width:275px;">

		</select>
	</div>


	<?php
		echo form_label('Realisasi Belanja Gaji Tahun Lalu(N-1): ', 'gaji_tahun_lalu');
		echo form_input('gaji_tahun_lalu', set_value('gaji_tahun_lalu', ''), 'class="input1"');

		echo form_label('Rencana Anggaran Gaji PNS TA (N+1): ', 'rencana_gaji');
		echo form_input('rencana_gaji', set_value('rencana_gaji', ''), 'class="input1"');

		echo form_label('Infomasi/Justifikasi : ', 'info');
		echo form_textarea('info', set_value('info', ''), 'class="input1"');

		echo form_submit('submit', 'Tambah');
	?>

	
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Gajin Kontrak/Pegawai Tidak Tetap</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Uraian Belanja Gaji dan Tunjangan PNS</th>
			<th>Realisasi Belanja Gaji Tahun Lalu(N-1)</th>
			<th>Rencana Anggaran Gaji PNS TA(N+1)</th>
			<th>Informasi/Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($usulan_gj_pns as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php
						foreach($pns as $t)
						{
						    if($t->id_item == $r->id_item){
						    	echo "$t->nama_item_keu";
						    	break;
						    }
						}
					?>
		  		</th>
		  		<th>
		  			<?php echo $r->gaji_tahun_lalu; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->rencana_gaji; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->info; ?>
		  		</th>
		  		
		  		<th>
		  			<a href="<?php echo base_url('/site/ubah_usulan_gaji_pns_form/'.$r->id_dtl_usln_gaji_pns.'/-'); ?>" class="btn btn-success">Perbaharui</a>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/hapus_usulan_gaji_pns/'.$r->id_dtl_usln_gaji_pns.''); ?>" class="btn btn-danger">Hapus</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>