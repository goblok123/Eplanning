<div class="tableMiddlePage">
	<h1>Menu Ketahui Usulan Unit Kerja(<?php echo $unit_user ?>)</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Id Usulan</th>
			<th>Jenis Usulan</th>
			<th>Unit</th>
			<th>Pengimput Terakhir</th>
			<th>Tanggal Dimasukkan</th>
			<th>Tanggal Terakhir Dirubah</th>
			<th>Tanggal Diketahui Oleh Penanggung Jawab</th>
		</tr>
		<?php $h = 0; ?>

		<?php if (isset($usulan_unit)){ ?>
			<?php foreach($usulan_unit as $r): ?>
				<tr>
					<th style="width:20px;">
						<?php $h += 1; ?>
						<?php  echo "$h" ?>
					</th>
					<th>
			  			<?php echo $r->id_usulan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->type_usulan; ?>
			  		</th>
			  		<th>
			  			<?php echo $unit_user; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->name; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->tgl_dimasukkan; ?>
			  		</th>
			  		<th>
			  			<?php echo $r->tgl_terakhir_dirubah; ?>
			  		</th>
			  		<th>
			  			<?php 
			  				if($r->tgl_diketahui == "1970-01-01"){?>
			  					<p style="color: red"> Belum Diketahui Oleh Penanggung Jawab </p>
			  			<?php
			  				}else{
			  					echo $r->tgl_diketahui; 
			  				}
			  			?>
			  		</th>
			  		<th>
			  			<?php 
			  				if($r->tgl_diketahui == "1970-01-01"){?>
			  					<a href="<?php echo base_url('/site2/buka_detail_usulan/'.$r->id_usulan.'/'.$r->type_usulan.'/'.$r->id_unit.''); ?>" class="btn btn-success">Lihat/Ketahui</a>
			  			<?php
			  				}else{ ?>
			  					<a href="<?php echo base_url('/site2/batalkan_ketahui_usulan/'.$r->id_usulan.''); ?>" class="btn btn-danger">Batalkan Ketahui</a>
			  			<?php	}
			  			?>

			  			
			  		</th>
				</tr>
			<?php endforeach; ?>
		<?php }?>
	</table>
</div>