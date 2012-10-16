<div class="container">
	<h1> General area for design? catalog/ tag page maybe?</h1>
	
	either way we have a simple search base on title here</br>
	<form action = "<?php echo site_url('design/searchDesign'); ?>" method = "post"/>
		<input class="span5" name="search_clause" type="text">
		<button type="submit" class="btn">Search</button>
	</form>
	
	
	<?php if(isset($search_exist) && $search_exist) {?>
		<div>
			<?php foreach($search_result->result() as $item) {?>
				<?php echo $item->design_id; ?></br>
				<?php echo $item->customer_id; ?></br>
				<?php echo $item->image_path; ?></br>
				<?php echo $item->rating; ?></br>
				<?php echo $item->price; ?></br>
				<?php echo $item->title; ?></br>
				<?php echo $item->type?></br>
				<!-- this sharing is not working yet, need to test in actual environment-->
				<?php $sharelink = "design/" . $item->design_id;	?>
			<div class="fb-like" data-href="<?php echo site_url($sharelink);?>" data-send="true" data-width="450" data-show-faces="true"></div>	
			<?php } ?>
			
		</div>
	<?php }?>
</div>
