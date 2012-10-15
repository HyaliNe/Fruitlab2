<div class="container">
	
	<?php echo $design_id; ?></br>
	<?php echo $customer_id; ?></br>
	<?php echo $image_path; ?></br>
	<?php echo $rating; ?></br>
	<?php echo $price; ?></br>
	<?php echo $title; ?></br>
	<?php echo $type?></br>

	<?php $sharelink = "design/" . $design_id;	?>
	<div class="fb-like" data-href="<?php echo site_url($sharelink);?>" data-send="true" data-width="450" data-show-faces="true"></div>	
</div>