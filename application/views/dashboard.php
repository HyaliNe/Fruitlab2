<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Welcome to your dashboard dude!</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p>Check out your activity feed and best selling design!</p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	
	<div class="row">
		<div class="span12">
			<h3>Best Selling Designs</h3>
		</div>
	</div>
	
	<ul class="nav nav-tabs" id="tab_section">
	  <li class="active"><a href="#global">Global</a></li>
	  <li><a href="#local">Friends</a></li>
	</ul>
	
	<div class="tab-content">
	  <div class="tab-pane fade active in" id="global">
	  
			<div class="row">
				<div class="span12">			
					<div class="designs clearfix">

						<?php if (isset($globalDesignList)):?>
						<?php foreach($globalDesignList->result() as $design): ?>
						
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
						<?php endif; ?>
						
					</div>											
				</div>
			</div>
				
	  </div>

	  <div class="tab-pane fade" id="local">
			<div class="row">
				<div class="span12">			
					<div class="designs clearfix">
						&nbsp;
						<?php if (isset($friendDesignList) && $friendDesignList != false):?>
						<?php foreach($friendDesignList->result() as $design): ?>
						
						<figure class="design">
							<img src="<?php echo site_url('uploads/'.$design->image_path); ?>" class = "thumbnail" alt=""/>									
							<div class="design_overlay">
								<p><a href = "<?php echo site_url('design/'.$design->design_id); ?>" ><?php echo $design->title; ?></a></p>
								<p><a href ="<?php echo site_url('customise/'.$design->design_id);?>"  class ="btn btn-warning" >Buy</a></p>
							</div>
						</figure>
						
						<?php endforeach; ?>
						<?php endif; ?>
						
					</div>		
				</div>
			</div>
			
	  </div>
	  <div class="tab-pane fade" id="messages">Message</div>
	  <div class="tab-pane fade" id="settings">Settings</div>
	</div>		

	<div class="row">
		<div class="span12">
			<h3>Activity Feed</h3>
		</div>
	</div>
	
	<?php  if ($listExist) { ?>
		<div class="activity_feed">
			<div class="row">
				<div class="span6">
		
		<?php foreach($activity as $row) ?>
		<div class="single_feed">
			<div class="row">
				<div class = "span12">
					<p class = "span5 pull-left"><?php echo $row?></p>
				</div>					
			</div>		
		</div>
		</div> <!-- end of .span6 -->
			
	</div>
</div> <!-- end of .activity_feed -->	
	<?php } else { ?>
			<p class = "span12">None of your friends has done anything. </p>
			<?php } ?>

	
		
		
</div>

<script>
head(function() {
		$('#tab_section a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
});


</script>
