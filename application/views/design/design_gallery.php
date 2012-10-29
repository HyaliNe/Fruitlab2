<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Search Design Result</h1>						
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
		<div class="span12 designs">
			<?php if(isset($search_exist) && $search_exist): ?>
			<?php foreach($search_result->result() as $design): ?>
				<figure class="design">
					<img src="<?php echo site_url('uploads/'.$design->image_path); ?>" class = "thumbnail" alt=""/>									
					<div class="design_overlay">
						<p><i class = "icon-bullhorn"></i> <a href = "<?php echo site_url('design/'.$design->design_id); ?>" ><?php echo $design->title; ?></a></p>
						<p><i class = "icon-user"></i> <?php echo $design->customer_id; ?></p>
						<p><i class = "icon-star"></i> <?php echo $design->rating; ?></p>
						<p><a href ="<?php echo site_url('customise/'.$design->design_id);?>"  class ="btn btn-warning btn-block" >Buy </a></p>
					</div>
				</figure>

			<?php endforeach; ?>
			<?php else: ?>
				<p>No Design Found</p>
			<?php endif; ?>
		</div>
	</div>		
	
</div>