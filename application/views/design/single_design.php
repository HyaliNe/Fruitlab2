<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>View Design</h1>						
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
	
	<div class = "row">
		<div class="span4">
				<img src="<?php echo site_url('uploads/'.$image_path); ?>" />
				
				<p>	
				<?php $sharelink = "design/" . $design_id;	?>
				<div class="fb-like" data-href="<?php echo site_url($sharelink);?>" data-send="true" data-width="450" data-show-faces="true"></div>	
				</p>
		</div>
		<div class="span6 well">

			<legend><?php echo $title;?></legend>
			
			<div class = "row">				
				<div class="span2">
					Price:
				</div>
				<div class="span3">
					$<?php echo $price;?>
				</div>		
			</div>
			<hr>
			<div class = "row">				
				<div class="span2">
					Rating:
				</div>
				<div class="span3">
					<?php echo round($rating,2);?>/5.00
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
			<form action = "<?php echo site_url('review/rate'); ?>" method = "post"/>
				<input type="hidden" id="design_id" name="design_id" value= "<?php echo $design_id; ?>" />
				<input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id'); ?>" />
				<input type="hidden" id="num_of_rating" name="num_of_rating" value= "<?php echo $num_of_rating; ?>" />
				<input type="hidden" id="old_average" name="old_average" value= "<?php echo $rating; ?>" />
			<div class="row">		
				<div class="span2">	
					Rate it
				</div>
				<div class="span2">
					<select name="new_rating" id="new_rating">
					  <option value="1.00">1</option>
					  <option value="2.00">2</option>
					  <option value="3.00">3</option>
					  <option value="4.00">4</option>
					  <option value="5.00">5</option>
					</select>
				</div>
				<div class="span1 offset1">
					<input type="submit" value="Rate" class="btn btn-success"/>
				</div>
				</form>
			</div>
			<hr>
	<?php	if($type == "Sales" || $customer_id == $this->session->userdata('customer_id'))
			{	
				//only if type is sales or when you are the owner of this design then can you use this design to make shirt
				?>
				<div class = "row">	
					<div class="span4 offset1">
						<!-- a form to lead to customize product -->
						<form class="form-vertical" action="<?php echo site_url('customise/'.$design_id);?>" method="post">
							<input type="hidden" name="design_id" id="design_id" value="<?php echo $design_id;?>" />
							<input type="hidden" name="price" id="price" value="<?php echo $price;?>" />
							<input type="hidden" name="title" id="title" value="<?php echo $title;?>" />
							<input type="submit" value="Buy" class="btn btn-block btn-large btn-success"/>	
						</form>
					</div>
				</div>				
	<?php	}	?>
		</div>
	</div>	
	<br>
	
<hr>

	<div class="row">
		<div class="span6">
			<p class = 'lead'>Total Comment : <?php echo $comment->num_rows();?> </p>
		</div>
	</div>

	<?php foreach($comment->result() as $singlecomment): ?>
	<div class="row">
		<div class="span6">

			<div class="comment clearfix">
				<img src="<?php echo site_url('uploads/'.$singlecomment->img_path);?>" alt="" class="thumbnail_small pull-left" />
				<div class="comment_content pull-left">
					<div class="comment_name clearfix">
						<p class = "pull-left"><a href = "<?php echo site_url('user/'.$singlecomment->customer_id); ?>"><?php echo $singlecomment->customer_id; ?></a></p> 
						<p class = "comment_timestamp pull-right"><?php echo $singlecomment->timestamp;?></p>
					</div>
					<div class="comment_message">
						<?php echo $singlecomment->message;?>
					</div>									
				</div>
			</div>
			
		</div>
	</div>
	<?php endforeach;?>
	
	<div class="row" style = "margin-top: 20px;">
		<form class="well form-vertical span6" action = "<?php echo site_url('review/comment'); ?>" method="post"/>
			<input type="hidden" name="design_id" id="design_id" value="<?php echo $design_id;?>" />
			<?php $customer_id = $this->session->userdata('customer_id');	?>
			<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id;?>" />
			<h3>Comment on the design!</h3>
			<div class="row">
				<div class="span6">
					<textarea rows="8" class = "span6" name="comment" id="comment" value="<?php echo set_value('comment'); ?>" maxlength="150" ></textarea>
				</div>
			</div>
			<div class="row">
				<div class="span6">
					<input type="submit" value="Comment" class="btn btn-info btn-block btn-large"/>
				</div>
			</div>
		</form>		
	</div>
	
	
</div>