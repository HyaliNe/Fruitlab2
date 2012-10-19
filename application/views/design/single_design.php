<div class="container">
	
	<div class = "row">
		<div class="span4">
				<img src="<?php echo site_url($image_path); ?>" />
		</div>
		<div class="span6">
			<div class = "row">	<br>
				<div class="span2">
					Title:
				</div>
				<div class="span3">
					<?php echo $title;?>
				</div>				
			</div>
			<hr>
			<div class = "row">				
				<div class="span2">
					Price:
				</div>
				<div class="span3">
					<?php echo $price;?>
				</div>		
			</div>
			<hr>
			<div class = "row">				
				<div class="span2">
					Rating:
				</div>
				<div class="span3">
					<?php echo $rating;?>
				</div>		
			</div>
			<hr>
			<div class = "row">
				<div class="span2">
					No. of people rated:
				</div>
				<div class="span3">
					<?php echo $num_of_rating;?>
				</div>					
			</div>
			<hr>
			<div class="row">
				<div class="span6">
					<?php $sharelink = "design/" . $design_id;	?>
					<div class="fb-like" data-href="<?php echo site_url($sharelink);?>" data-send="true" data-width="450" data-show-faces="true"></div>	
				</div>
			</div>
			<hr>
			<div class = "row">	
				<div class="span4 offset1">
					<!-- a form to lead to customize product -->
					<form class="form-vertical" action="<?php echo site_url('make_product');?>" method="post">
						<input type="hidden" name="design_id" id="design_id" value="<?php echo $design_id;?>" />
						<input type="hidden" name="price" id="price" value="<?php echo $price;?>" />
						<input type="hidden" name="title" id="title" value="<?php echo $title;?>" />
						<input type="submit" value="Buy" class="btn btn-info btn-large"/>	
					</form>
				</div>
			</div>			
		</div>
	</div>	
	<br>
	<div class="row">
		<div class="span4">
			Comment(<?php echo $num_of_comment;?>)
		</div>
	</div>
	<hr>
	<?php foreach($comment as $singlecomment):?>
		<div class="row">
			<div class="span12">
				<div class="thumbnail pull-left">
					<img src="http://placehold.it/80x60" alt="">
				</div>
				<div class="span6">
					<div class="span5 pull-left lead">
						<?php echo $singlecomment->message;?>
					</div>				
					<div class="span3 offset4">
						<?php echo "50 seconds ago";?>
					</div>
					
				</div>
			</div>
		</div>
		<hr>
	<?php endforeach;?>
	
</div>