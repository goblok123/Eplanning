<div class="tableMiddlePage">
	<h1>Daftar Semua Usulan yang Telah Masuk</h1>

	<table class="table table-bordered" >
		<tr>
			<th>No.</th>
			<th>Id Usulan</th>
			<th>Jenis Usulan</th>
			<th>Unit</th>
			<th>Pengimput</th>
			<th>Tanggal Dimasukkan</th>
			<th>Tanggal Terakhir Dirubah</th>
			<th>Tanggal Diketahui Oleh Penanggung Jawab</th>
		</tr>
		<?php $h = 0; ?>

		<?php foreach($semuaUsulan as $r): ?>
			<tr>
				<th style="width:20px;">
					<?php $h += 1; ?>
					<?php  echo "$h" ?>
				</th>
				<th>
		  			<?php echo $r->id; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->type; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->nama_unit; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->pengimput; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->tgl_masuk; ?>
		  		</th>
		  		<th>
		  			<?php echo $r->tgl_dirubah; ?>
		  		</th>
		  		<th>
		  			<?php 
		  				if($r->tgl_ketahui == "1970-01-01"){?>
		  					<p style="color: red"> Belum Diketahui Oleh Penanggung Jawab </p>
		  			<?php
		  				}else{
		  					echo $r->tgl_ketahui; 
		  				}
		  			?>
		  		</th>
		  		<th>
		  			<a href="<?php echo base_url('/site/lihat_usulan/'.$r->id.'/'.$r->type.'/'.$r->id_unit.''); ?>" class="btn btn-success">Lihat</a>
		  		</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>