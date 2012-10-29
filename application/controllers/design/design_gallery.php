<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Design gallery</h1>						
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
	
	<?php if (validation_errors()): ?>

		<div class="alert alert-error">
		  <a class="close" data-dismiss="alert" href="#">×</a>
		  <h4 class="alert-heading">Error!</h4>
			<?php echo validation_errors(); ?>
		</div>

	<?php endif ?>
	<div class="row">	
		<?php if(isset($search_exist) && $search_exist):
		foreach($search_result->result() as $design)
		{	?>
			<div class="span3">
				<div class="row">
					<div class="span3">
					<form action="<?php echo site_url('design/'.$design->design_id);?>" method="post"/>
						<input type="image" src="<?php echo site_url('uploads/'. $design->image_path)?>">
					</form>
					</div>
				</div>
				<div class="row">
					<div class="span3" style="text-align:center; padding-left:100px;">
						<div class="row">
							<div class="span1">
							<?php echo $design->title;?>
							</div>				
						</div>
						<div class="row">
							<div class="span1">
							<?php echo $design->price;?>
							</div>				
						</div>
						<div class="row">
							<div class="span1">
							<?php echo $design->rating;?>/5.00
							</div>				
						</div>		
					</div>
				</div>
			</div>
	<?php
		}	endif?>
	</div>
	<hr>
	
	
</div>