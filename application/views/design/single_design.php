<div class="container">
	
	<?php echo $design_id; ?></br>
	<?php echo $customer_id; ?></br>
	<?php echo $image_path; ?></br>
	<?php echo $rating; ?></br>
	<?php echo $price; ?></br>
	<?php echo $title; ?></br>
	<?php echo $type?></br>
	<?php echo $num_of_rating?></br>
	
	<form class="form-vertical" action="<?php echo site_url('review/rate'); ?>" method="post" />
	<div class="row">
		<div class="span3">
			<input type="hidden" id="design_id" name="design_id" value="<?php echo $design_id;?>" />
			<input type="hidden" id="num_of_rating" name="num_of_rating" value="<?php echo $num_of_rating;?>" />
			<input type="hidden" id="old_rating" name="old_rating" value="<?php echo $rating;?>" />
			<select name="rating" id="rating">
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			</select>
		</div>
	</div>
	
	<div class="row">
		<div class="span2">
			<input type="submit" value="rate" class="btn btn-info"/>	
		</div>
	</div>
	</form>
	
	
	<?php $sharelink = "design/" . $design_id;	?>
	<div class="fb-like" data-href="<?php echo site_url($sharelink);?>" data-send="true" data-width="450" data-show-faces="true"></div>	

	</div>