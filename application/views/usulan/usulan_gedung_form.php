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

    <h1>Tambah Usulan Pengadaan Gedung</h1>

    <?php if ($diketahui == 0){ ?>
		<h3 style="color: red">Usulan sudah diketahui oleh Penanggung Jawab/Kepala Unit,</h3>
    	<h3 style="color: red">Untuk dapat mengubah/menambah usulan silakan menghubungi Penanggung Jawab/Kepala agar usulan membatalkan ketahui usulan di menu Ketahui Usulan </h3>
    <?php } else{ ?>
    	<?php if (isset($added)){ ?>
		<h3 style="color: red"><?php echo $added; ?> </h3>
		<?php } else { ?>
			<h3>-</h3>
		<?php } ?>

		<?php echo validation_errors('<p class="error">'); ?>

		<?php
			echo form_open('site/tambah_usulan_gedung');
			echo form_label('Nama Gedung dan Sarana Konstruksi Lainnya: ', 'nama_gedung');
		?>

		<div>
			<select name="nama_gedung" id="nama_gedung" style="width:275px;">

			</select>
		</div>


		<?php
			echo form_label('Jumlah yang Sudah Ada: ', 'jmlh_ada');
			echo form_input('jmlh_ada', set_value('jmlh_ada', ''), 'class="input1"');

			echo form_label('Kondisi : ', 'kondisi');
			$options = array(
				"B"         => "B",
		        "RR"         => "RR",
		        "RB"           => "RB",
			);
			echo form_dropdown('kondisi', $options, 'kondisi', 'class="dropdownStyle"');
			
			echo form_label('Jumlah yang Diusulkan : ', 'jmlh_diusulkan');
			echo form_input('jmlh_diusulkan', set_value('jmlh_diusulkan', ''), 'class="input1"');
			echo form_label('Infomasi/Justifikasi : ', 'info');
			echo form_textarea('info', set_value('info', ''), 'class="input1"');

			echo form_submit('submit', 'Tambah');
		?>
    <?php } ?>
</div>


<div class="tableMiddlePage">
	<h1>Daftar Usulan Pengadaan Gedung</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Nama Gedung dan Saran Konstruksi Lainnya</th>
			<th>Jumlah yang Sudah Ada</th>
			<th>Kondisi</th>
			<th>Jumlah yang Diusulkan</th>
			<th>Informasi/Justifikasi</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($usulan_gedung)){ ?>
			<?php foreach($usulan_gedung  as $r): ?>
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
			  			<?php echo $r->jmlh_ada; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->kondisi; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->jmlh_diusulkan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->info; ?>
			  		</th>
			  		<?php if ($diketahui == 1){ ?>
				  		<th>
				  			<a href="<?php echo base_url('/site/ubah_usulan_gedung_form/'.$r->id_dtl_usulan_gedung.'/-'); ?>" class="btn btn-success">Perbaharui</a>
				  		</th>
				  		<th>
				  			<a href="<?php echo base_url('/site/hapus_usulan_gedung/'.$r->id_dtl_usulan_gedung.''); ?>" class="btn btn-danger">Hapus</a>
				  		</th>
			  		<?php } ?>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
</div>