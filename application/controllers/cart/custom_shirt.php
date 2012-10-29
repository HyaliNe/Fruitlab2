<div class="container">
	
	<form action="<?php echo site_url('cart/addToCart'); ?>" method="post">
		<input type='hidden' name ='designID' value ='<?php echo $design_id;?>'>
		<p>collar type</p>
		<select name="collarID">
			<?php foreach($collar->result() as $item) { ?>
				<option value='<?php echo $item->collar_id; ?>'> <?php echo $item->name; ?> </option>
				<?php } ?>
		</select>
	</br>
		<p>material</p>
		<select name="materialID">
			<?php foreach($material->result() as $item) { ?>
				<option value='<?php echo $item->material_id; ?>'> <?php echo $item->name; ?> </option>
				<?php } ?>
		</select>	
		</br>
	<p>colour</p>
		<select name="colourID">
			<?php foreach($colour->result() as $item) { ?>
				<option value='<?php echo $item->colour_id; ?>'> <?php echo $item->name; ?> </option>
				<?php } ?>
		</select>	
	</br>

	<input type='submit' name = 'submit'>
	</form>


</div>