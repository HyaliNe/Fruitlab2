<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Customize to make your own shirt!</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p></p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->
<div class="container">
	
	<div class="span12">
		<div class="span6">
			<legend>Purchase Shirt</legend>
			<form action="<?php echo site_url('cart/addToCart'); ?>" method="post" class="form-horizontal well">
				<input type="hidden" value="<?php echo $design_id;?>" name="designID" />
				<div class="row">
					<div class="control-group">
						<label class="control-label" for="collarID">Collar type</label>
						<div class="controls">
							<select name="collarID">
								<?php foreach($collar->result() as $item) { ?>
									<option value='<?php echo $item->collar_id; ?>'> <?php echo $item->name; ?> </option>
									<?php } ?>
							</select>							
						</div>
					</div>
		
					<div class="control-group">
						<label class="control-label" for="materialID">Material</label>
						<div class="controls">
							<select name="materialID">
								<?php foreach($material->result() as $item) { ?>
									<option value='<?php echo $item->material_id; ?>'> <?php echo $item->name; ?> </option>
									<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="colourID">Colour</label>
						<div class="controls">
							<select name="colourID">
								<?php foreach($colour->result() as $item) { ?>
									<option value='<?php echo $item->colour_id; ?>'> <?php echo $item->name; ?> </option>
									<?php } ?>
							</select>	
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="quantity">Quantity</label>
						<div class="controls">
							<select name="quantity" id="quantity">
					<?php		for($i=1; $i<=100; $i++)
								{	?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php		}	?>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="control-group">
						<label class="control-label" for="price">Price</label>
						<div class="controls lead ">
							$16.00(should it be updated as you select options?)
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-warning btn-large">Add to cart</button>
						</div>	
					</div>
				</div>
			</form>
		</div>
		<div class="span4">
			<img src="<?php echo site_url('uploads/' . $image_path);?>" alt=""/>
		</div>
		
	</div>
	
</div>