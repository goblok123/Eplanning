<div id="register_form">
	<h1>Tambah Pengguna!</h1>
	<?php
		echo form_open('login/create_member');
		echo form_input('name', set_value('name', 'Nama'));
		echo form_input('username', set_value('username', 'Username'));

		$options = array(
	        "pengimput"         => "Pengimput",
	        "penanggungJawab"         => "Penangung Jawab",
	        "perwakilan"        => "Perwakilan",
	        "administrator"           => "Administrator",
		);
		echo form_dropdown('hakAkses', $options, 'pengimput', 'class="dropdownStyle"');
	?>

	<select name="unit" id="unit" class="dropdownStyle">
	  <?php
	    foreach($allUnit  as $r) { ?>
	      <option value="<?= $r->name_unit ?>"><?= $r->name_unit ?></option>
	  <?php
	    } ?>
	</select> 

	<?php
		echo form_password('password', '', 'placeholder="Password" class="password"');
		echo form_password('password_confirm', '', 'placeholder="Confirm Password" class="password_confirm"');
		echo form_submit('submit', 'Create Account');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
</div>

<!-- <div>
	<table>
			<tr>
			<th>Content</th>

			</tr>

			<?php
				$stack =array();
			?>

			<?php foreach($allUnit  as $r): ?>
				<?php
					$temp[] = array(
						"$r->name_unit"         => "$r->name_unit",
					);
					//array_push($stack, $temp);
				?>

			  <tr><?php echo $r->name_unit; ?>

			 </tr>
			<?php endforeach; ?>

<?php
			echo form_dropdown('hakAkses', $temp, '', 'class="dropdownStyle"');
			?>
	</table>
</div> -->