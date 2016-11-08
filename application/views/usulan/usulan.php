<div>
	<a href="<?php $a = "-"; echo base_url('/site/tambah_usulan_diklat_form/'.$a.''); ?>" class="btn btn-success">Tambah Usulan Diklat</a>
	<a href="<?php echo base_url('/site/tambah_usulan_obat_form/-'); ?>" class="btn btn-success">Tambah Usulan Obat</a>
	<a href="<?php echo base_url('/site/tambah_usulan_sdm_form/-'); ?>" class="btn btn-success">Tambah Usulan SDM</a>
</div>
</div>

<html>
	<head>
		<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
		<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" /> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script> -->
		<?php $a = "asutralia"; $a?>

		<script type="text/javascript">
			$(document).ready(function() {
				
				var country = ['<?php echo $a; ?>', "Bangladesh", "Denmark", "Hong Kong", "Indonesia", "Netherlands", "New Zealand", "South Africa"];
				$("#country").select2({
				  data: country
				});
			});
		</script>
	</head>
	<body>
		<h1>DropDown with Search using jQuery</h1>
		<div>
			<select id="country" style="width:300px;">
			<!-- Dropdown List Option -->
			</select>
		</div>
	</body>
</html>